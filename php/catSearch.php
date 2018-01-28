<?php
ob_start();
session_start();
isset($_SESSION['MEM_NO']) ? $_SESSION['MEM_NO'] = $_SESSION['MEM_NO'] : $_SESSION['MEM_NO'] = null;


try {
	require_once("../php/connectBD103G2.php");
	$echoText = "";
	// 排序
	if (isset($_REQUEST['sort'])) {
		$sort = $_REQUEST['sort'];
	} else {
		$sort = 1;
	}
	if ($sort == 2) {
		$desc = '';
	} else if ($sort == 1) {
		$desc = 'desc';
	}
	// 關鍵字搜尋
	if ( isset($_REQUEST["searchText"]) || isset($_GET['color']) || isset($_GET['location']) || isset($_GET['gender']) ) {
			//關鍵字
		if( isset( $_REQUEST["searchText"] ) ){
			$searchText = "and cat_name like '%";
			$searchText .= $_REQUEST["searchText"];
			$searchText .= "%'";
		}else {
			$searchText = '';
		}
			//進階搜尋
		if(!empty($_GET['color'])){
			$colorJS = $_GET['color'];
			$colorArr = explode(",", "$colorJS");
			$colorAdv = "and (cat_color like '%";
			$colorAdv .= implode("%' or cat_color like '%", $colorArr);
			$colorAdv .= "%')";
		}else $colorAdv = null;
		if (!empty($_GET['location'])) {
			$locationJS = $_GET['location'];
			$locationArr = explode(",", "$locationJS");
			$locationAdv = "and (cat_location like '%";
			$locationAdv .= implode("%' or cat_location like '%", $locationArr);
			$locationAdv .= "%')";
		}else $locationAdv = null;
		if (!is_null($_GET['gender'])) {
			$genderJS = $_GET['gender'];
			$locationArr = explode(",", "$genderJS");
			$genderAdv = "and (cat_sex like '%";
			$genderAdv .= implode("%' or cat_sex like '%", $locationArr);
			$genderAdv .= "%')";
		}else $genderAdv = null;
		$sql = "select count(1) from cat where `ADOPT_STATUS` = 0 $searchText $colorAdv $locationAdv $genderAdv";    // 計算資料筆數
		$total = $pdo->query($sql);
		$rownum = $total->fetchcolumn();                            // 總共欄位數
		$perPage = 9;                                               // 每頁顯示筆數
		$totalpage = ceil($rownum / $perPage);                        // 計算總頁數
		$pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
		// 若無當前頁數則進入第一頁 若有則進入該頁
		$start = ($pageNo - 1) * $perPage;                            // 計算起始頁數
		if ($rownum == 0) {
			echo "這裡沒有你要找的喵喵, 請重新輸入您的關鍵字";
		} else {
			$sql = "select * from cat where `ADOPT_STATUS` = 0 $searchText $colorAdv $locationAdv $genderAdv order by CAT_NO $desc limit $start, $perPage";
			$cat = $pdo->prepare($sql);
			$cat->bindColumn("CAT_NO", $NO);
			$cat->bindColumn("CAT_NAME", $NAME);
			$cat->bindColumn("CAT_SEX", $SEX);
			$cat->bindColumn("CAT_NARRATIVE", $NARRATIVE);
			$cat->bindColumn("CAT_DATE", $DATE);
			$cat->bindColumn("CAT_COVER", $COVER);
			$cat->bindColumn("CAT_LOCATION", $LOCATION);
			$cat->execute();
		}
	} else {
		$sql = "select count(1) from cat where `ADOPT_STATUS` = 0";    // 計算資料筆數
		$total = $pdo->query($sql);
		$rownum = $total->fetchcolumn();                            // 總共欄位數
		$perPage = 9;                                               // 每頁顯示筆數
		$totalpage = ceil($rownum / $perPage);                        // 計算總頁數
		$pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
		// 若無當前頁數則進入第一頁 若有則進入該頁
		$start = ($pageNo - 1) * $perPage;                            // 計算起始頁數
		if ($rownum == 0) {
			echo "這裡已經沒有需要認養的喵喵了~~";
		} else {
			$sql = "select * from cat where `ADOPT_STATUS` = 0 order by CAT_NO $desc limit $start, $perPage";
			// 設定每頁呈現內容
			$cat = $pdo->prepare($sql);
			$cat->bindColumn("CAT_NO", $NO);
			$cat->bindColumn("CAT_NAME", $NAME);
			$cat->bindColumn("CAT_SEX", $SEX);
			$cat->bindColumn("CAT_NARRATIVE", $NARRATIVE);
			$cat->bindColumn("CAT_DATE", $DATE);
			$cat->bindColumn("CAT_COVER", $COVER);
			$cat->bindColumn("CAT_LOCATION", $LOCATION);
			$cat->execute();
		}
	}
	if (isset($cat)) {
		while ($row = $cat->fetchObject()) {
			if ($_SESSION['MEM_NO'] !== null) {
				$MEMNO = $_SESSION['MEM_NO'];
				$sql2 = "select count(1) from favorite where mem_no = $MEMNO and cat_no = $NO";
				$like = $pdo->query($sql2);
				if ($like->fetchcolumn() == 1) {
					$heart = "fa fa-heart favorite";
					$likeNot = "1";
				} else {
					$heart = "fa fa-heart-o favorite";
					$likeNot = "0";
				}
			}else{
				$heart = "fa fa-heart-o favorite";
				$likeNot = "0";
			}
			$echoText .= "
                <picture class='catItem'>
                    <i class='$heart' aria-hidden='true' data-val='$NO' data-boolean='$likeNot'></i>
                    <div class='catContent'>
                        <a href='catContent.php?catNo=$NO' title='瀏覽$NAME'>
                            <div class='img'>
                                <img src='$COVER' alt='$NAME'>
                            </div>
                        </a>
                        <button type='button' class='quickView' data-val='$NO'>
                            Quick View
                        </button>
                    </div>
                    <figure>
                        <h3>$NAME</h3>
                        <br>$LOCATION
                        <br>約 $DATE 出生
                        <br>";
			if ($SEX == 1) {
				$echoText .= "女生<i class='fa fa-venus' aria-hidden='true'></i>";
			} else if ($SEX == 0) {
				$echoText .= "男生<i class='fa fa-mars' aria-hidden='true'></i>";
			}
			$echoText .= "
                        <br>$NARRATIVE
                    </figure>
                </picture>";
		}
		$searchCon = isset($_REQUEST['sort']) ? 'sort=' . $_REQUEST['sort'] . '&' : '';
		$searchCon .= isset($_REQUEST['searchText']) ? 'searchText=' . $_REQUEST['searchText'] : '';

		$echoText .= "
                <div class='page'>";
		for ($i = 1; $i <= $totalpage; $i++) {
			$echoText .= "<a href='?pageNo=$i&$searchCon' class='pageNo defaultBtn'>" . $i . "</a>";
		}
		$echoText .= "</div>";
		echo $echoText;
	}
} catch (PDOException $e) {
	echo "行號: ", $e->getLine(), "<br>";
	echo "訊息: ", $e->getMessage(), "<br>";
}
?>