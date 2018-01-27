
<?php
try {
    require_once "../php/connectBD103G2.php";

    if(isset($_REQUEST["searchLoc"]) || isset($_REQUEST["searchName"])){
        $echoText = "";
        $searchLoc = isset($_REQUEST["searchLoc"]) ? $_REQUEST["searchLoc"] : ''; //三元運算判斷是否有傳進來
        $searchName = isset($_REQUEST["searchName"]) ? $_REQUEST["searchName"] : ''; //三元運算判斷是否有傳進來
        //地區陣列
        $locArr = array('北部' => array("台北市","新北市","基隆市","桃園市","新竹市","新竹縣","宜蘭縣"), 
                        '中部' => array("苗栗縣","台中市","彰化縣","南投縣","雲林縣","嘉義縣","嘉義市"),
                        '南部' => array("台南市","高雄市","屏東縣"),
                        '東部' => array("花蓮縣","台東縣"),
                        '離島' => array("金門縣","連江縣","澎湖縣"));

        
        $sql1     = "select count(*) from halfway_member
                    where ";                                        // 計算資料筆數
    	if(!empty($searchLoc)){
            $arrLen = count($locArr[$searchLoc]);
            $sql1 .= "(";
            for($i = 0; $i < $arrLen ; $i++) {
                if($i == $arrLen-1){
                    $temp = $locArr[$searchLoc][$i];
                    $sql1.="HALF_ADDRESS like '%$temp%') and ";
                }else{
                    $temp = $locArr[$searchLoc][$i];
                    $sql1.="HALF_ADDRESS like '%$temp%' or ";
                }
            }
        }
        $sql1 .= "HALF_NAME like '%$searchName%'";   
        $total = $pdo->query($sql1);
        $rownum = $total->fetchcolumn();                            // 總共欄位數
        $perPage = 6;                                               // 每頁顯示筆數
        $totalpage = ceil($rownum / $perPage);                      // 計算總頁數
        $pageNo = isset($_REQUEST['pageNo']) == true ? $_REQUEST['pageNo'] : $pageNo = 1; // 若無當前頁數則進入第一頁 若有則進入該頁
        $start = ($pageNo - 1) * $perPage;   
        
        // 設定每頁呈現內容
        $sql     = "select * from halfway_member
                    where HALF_BAN = 0 and";
    	if(!empty($searchLoc)){
            $arrLen = count($locArr[$searchLoc]);
            $sql .= "(";
            for($i = 0; $i < $arrLen ; $i++) {
                if($i == $arrLen-1){
                    $temp = $locArr[$searchLoc][$i];
                    $sql.="HALF_ADDRESS like '%$temp%') and ";
                }else{
                    $temp = $locArr[$searchLoc][$i];
                    $sql.="HALF_ADDRESS like '%$temp%' or ";
                }
            }
        }
        $sql .= "HALF_NAME like '%$searchName%'";
        $halfway = $pdo->prepare($sql);
        $halfway->bindColumn("HALF_NO", $NO);
        $halfway->bindColumn("HALF_NAME", $NAME);
        $halfway->bindColumn("HALF_ADDRESS", $ADDRESS);
        $halfway->bindColumn("HALF_TEL", $TEL);
        $halfway->bindColumn("HALF_OPEN", $OPEN);
        $halfway->bindColumn("HALF_COVER", $COVER);
        $halfway->execute();
        while ($row = $halfway->fetchObject()) {
            $echoText .="<div class='item'>
                <div class='pic'>
                    <img src='$COVER' alt='halfway'>
                </div>
                <div class='text tx1'>
                    <h3>$NAME</h3>
                    <p>ADD：$ADDRESS</p>
                    <p>TEL：$TEL</p>
                    <p>TIME：$OPEN</p>
                    <form action='halfway_house_detail.php'>
                        <input type='hidden' name='halfno' value='$NO'>
                        <button type='submit' class='more'>see more</button>
                    </form>
                </div>
                <div class='bg color$NO'></div>
            </div>";
        }
        $echoText .="<div class='page'>";
            for ($i = 1; $i <= $totalpage; $i++) {
                $echoText .="<a href='javascript:void(0)' class='pageBtn pageNo defaultBtn'>" . $i . "</a>";
            }
        $echoText .="</div>";
        echo $echoText;

    }else{
        $echoText = "";
        $searchLoc = isset($_REQUEST["searchLoc"]) ? $_REQUEST["searchLoc"] : '';
        $searchName = isset($_REQUEST["searchName"]) ? $_REQUEST["searchName"] : '';
        $sql = "select count(*) from halfway_member";    // 計算資料筆數
        $total = $pdo->query($sql);
        $rownum = $total->fetchcolumn();                            // 總共欄位數
        $perPage = 3;                                               // 每頁顯示筆數
        $totalpage = ceil($rownum / $perPage);                      // 計算總頁數
        $pageNo = isset($_REQUEST['pageNo']) == true ? $_REQUEST['pageNo'] : $pageNo = 1;
        $pageNo = (int)$pageNo;
        // 若無當前頁數則進入第一頁 若有則進入該頁
        $start = ($pageNo - 1) * $perPage;   
        
        // 設定每頁呈現內容
        $sql = "select * from halfway_member where HALF_BAN = 0 limit $start, $perPage";
        $halfway = $pdo->prepare($sql);
        $halfway->bindColumn("HALF_NO", $NO);
        $halfway->bindColumn("HALF_NAME", $NAME);
        $halfway->bindColumn("HALF_ADDRESS", $ADDRESS);
        $halfway->bindColumn("HALF_TEL", $TEL);
        $halfway->bindColumn("HALF_OPEN", $OPEN);
        $halfway->bindColumn("HALF_COVER", $COVER);
        $halfway->execute();
        while ($row = $halfway->fetchObject()) {
                $echoText .="<div class='item'>
                    <div class='pic'>
                        <img src='$COVER' alt='halfway'>
                    </div>
                    <div class='text tx1'>
                        <h3>$NAME</h3>
                        <p>ADD：$ADDRESS</p>
                        <p>TEL：$TEL</p>
                        <p>TIME：$OPEN</p>
                        <form action='halfway_house_detail.php'>
                            <input type='hidden' name='halfno' value='$NO'>
                            <button type='submit' class='more'>see more</button>
                        </form>
                    </div>
                    <div class='bg color$NO'></div>
                </div>";
        }
        $echoText .="<div class='page'>";
            for ($i = 1; $i <= $totalpage; $i++) {
                $echoText .="<a href='javascript:void(0)' class='pageBtn pageNo defaultBtn'>" . $i . "</a>";
            }
        $echoText .="</div>";
        echo $echoText;
    }
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>