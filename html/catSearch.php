<?php
ob_start();
session_start();
isset($_SESSION['MEM_NO']) ? $_SESSION['MEM_NO'] = $_SESSION['MEM_NO'] : $_SESSION['MEM_NO'] = null;
isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/catSearch.css">
    <script src="../js/signIn.js"></script>
    <script src="../js/cat/arrowSwitch.js"></script>
    <title>尋喵</title>
    <script src="../js/hb.js"></script>
</head>
<body>
<div class="signUpLightboxBlack">
</div>
<div class="signUpLightbox" id="loginBox">
    <i class="fa fa-times cancel"></i>
    <div class="bgImg" id="bgImg"></div>
    <div id="formShape1" class="formShape formShape1">
        <div class="chioce">
            <button id="halfMember1">中途之家會員</button>
            <button id="member1" class="selected">一般會員</button>
        </div>
        <form action="../php/signIn2Member.php" class="signUpForm" id="signInForm" method='post'>
            <br>
            <br>
            <br>
            <br>
            <label for="userId">會員帳號
                <br>
                <small>請輸入您的電子郵件</small>
            </label>
            <input type="email" id="userIdIn" name='memId' required>
            <br>
            <label for="userPsw">會員密碼
                <br>
                <small>請輸入6~10碼英數字</small>
            </label>
            <input type="password" id="userPswIn" name='memPsw' required>
            <br>
            <div class="chioce">
                <input type="submit" class="formBtn formSubmitBtn" value="登入">
            </div>
            <p class="signInUpPos">尚未成為會員嗎?
                <span id="signIn2Up">點此註冊</span>
            </p>
        </form>
    </div>
    <div id="formShape2" class="formShape formShape2">
        <div class="chioce">
            <button id="halfMember2">中途之家會員</button>
            <button id="member2" class="selected">一般會員</button>
        </div>
        <form action="../php/signUp2mem.php" id="signUpForm">
            <label for="userName">會員名稱
                <br>
                <small>不得多於8個中/英文字元</small>
            </label>
            <input type="text" id="userName" placeholder="請輸入您的名稱" required>
            <br>
            <label for="userId">會員帳號
                <br>
                <small>請輸入您的電子郵件</small>
            </label>
            <input type="email" id="userId" placeholder="請輸入您的電子郵件" required>
            <br>
            <label for="userPsw">會員密碼
                <br>
                <small>請輸入6~10碼英數字</small>
            </label>
            <input type="password" id="userPsw" placeholder="請輸入您的密碼" required>
            <br>
            <label for="userTel">聯絡電話
                <br>
            </label>
            <input type="tel" id="userTel" placeholder="請輸入您的手機號碼" required>
            <br>
            <label for="userBirth">會員生日
                <br>
            </label>
            <input type="text" id="userBirth" placeholder="ex:19900101" required>
            <br>
            <label for="userAddress">通訊地址
                <br>
            </label>
            <input type="text" id="userAddress" placeholder="請輸入您的地址" required>
            <br>
            <div class="chioce">
                <label for="userPhoto" class="formBtn" id="userPhotoLabel">
                    點我上傳您的大頭貼
                </label>
                <input type="file" id="userPhoto" placeholder="您可以上傳您的檔案" value="file">
                <input type="submit" id="loginBoxSubmit" class="formBtn formSubmitBtn" value="確認註冊">
                <input type="reset" class="formBtn formSubmitBtn" value="清除重填">
            </div>
            <p class="signInUpPos">已經是會員了嗎?
                <span id="signUp2In">點此登入</span>
            </p>
        </form>
    </div>
</div>

<header>
    <div class="logo">
        <a href="../homepage.php">
            <h1>
                <img src="../images/logo_white.png" alt="尋喵啟事" title="回首頁">
            </h1>
        </a>
    </div>
    <nav>
        <ul>
            <li>
                <a href="../html/catSearch.php">尋喵</a>
            </li>
            <li>
                <a href="../html/halfway_house_search.php">中途之家</a>
            </li>
            <li>
                <a href="../html/Cat_ShoppingStore.php" title="前往商城">商城</a>
            </li>
            <li>
                <a href="../html/forum.php">討論區</a>
            </li>
            <li>
            <?php
						if($_SESSION['MEM_NO'] == null && $_SESSION['HALF_NO'] == null){
							echo "<a href='#' class='login'>會員專區</a>";
						}else{
							if($_SESSION['HALF_NO'] == null){
								echo "<a href='member.php'>會員專區</a>";
							}
							else{
								echo "<a href='halfMem.php'>中途會員專區</a>";
							}
						}
					?>
            </li>
        </ul>
    </nav>
    <div class="icons">
            <a href="Cat_ShoppingStore_cart.php">
                <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
            </a>
            <?php
                    if(isset($_SESSION["MEM_NO"]) || isset($_SESSION["HALF_NO"])){
                        echo "<a href='../php/memberLogOut.php' id='loginBtn'>
                            <i class='fa fa-sign-out fa-2x' aria-hidden='true'></i>
                            </a>";
                    }else{
                        echo "<a href='#' class='login' id='loginBtn'>
                            <i class='fa fa-user-circle-o fa-2x' aria-hidden='true'></i>
                            </a>";
                    }
            ?>
            <?php
                if(isset($_SESSION["MEM_NO"])){
                    echo "<a href='#' id='likeBoxBtn'>
                            <i class='fa fa-heart-o fa-2x' aria-hidden='true'></i>
                        </a>";
                }
            ?>
    </div>
    <div class="hb">
        <div class="hamburger" id="hamburger-6">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>
    <div class="hb">
            <div class="hamburger" id="hamburger-6">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
</header>
<div class="right">
    <div class="container container1">
        <h2>尋喵
            <br>
            <small class="selectTitle">搜尋你的喵喵</small>
        </h2>
        <form method="POST" action="#" class='selectForm'>
            <div>
                <div class="formInsert">
                    <input type="text" id="searchText" class="searchBar condition1" placeholder="你知道心儀喵喵的名字嗎？">
                    <button type="submit" class="searchBtn defaultBtn">
                        <i class="fa fa-search " aria-hidden="true"></i>
                    </button>
                </div>
                <br>
            </div>
            <label class="advanceSearch" id="tableControl" for="advanced">進階搜尋
                <i class="fa fa-angle-down" id="arrowDown" aria-hidden="true"></i>
            </label>
            <input type="checkbox" id="advanced">
            <div class="advanceSearchItem">
                <div>
                    <label class="selectTitle">毛色：</label>
                    <div class="formInsert">
                        <button type="button" class="condition condition1" data-name='color' data-val='黑白'>黑白</button>
                        <button type="button" class="condition" data-name='color' data-val='虎斑'>虎斑</button>
                        <button type="button" class="condition" data-name='color' data-val='橘白'>橘白</button>
                        <button type="button" class="condition" data-name='color' data-val='橘'>橘色</button>
                        <button type="button" class="condition" data-name='color' data-val='黑'>黑色</button>
                    </div>
                </div>
                <div>
                    <label class="selectTitle toMiddle">地區：</label>
                    <div class="formInsert">
                        <button type="button" class="condition condition1" data-name='location' data-val='台北市'>臺北市
                        </button>
                        <button type="button" class="condition" data-name='location' data-val='新北市'>新北市</button>
                        <button type="button" class="condition" data-name='location' data-val='基隆市'>基隆市</button>
                        <br class="forRWD">
                        <button type="button" class="condition" data-name='location' data-val='桃園市'>桃園市</button>
                        <button type="button" class="condition" data-name='location' data-val='新竹市'>新竹市</button>
                        <br>
                        <button type="button" class="condition condition1" data-name='location' data-val='新竹縣'>新竹縣
                        </button>
                        <button type="button" class="condition" data-name='location' data-val='宜蘭縣'>宜蘭縣</button>
                        <button type="button" class="condition" data-name='location' data-val='苗栗縣'>苗栗縣</button>
                        <br class="forRWD">
                        <button type="button" class="condition" data-name='location' data-val='台中市'>台中市</button>
                        <button type="button" class="condition" data-name='location' data-val='彰化縣'>彰化縣</button>
                        <br>
                        <button type="button" class="condition condition1" data-name='location' data-val='南投縣'>南投縣
                        </button>
                        <button type="button" class="condition" data-name='location' data-val='雲林縣'>雲林縣</button>
                        <button type="button" class="condition" data-name='location' data-val='嘉義縣'>嘉義縣</button>
                        <br class="forRWD">
                        <button type="button" class="condition" data-name='location' data-val='嘉義市'>嘉義市</button>
                        <button type="button" class="condition" data-name='location' data-val='台南市'>台南市</button>
                        <br>
                        <button type="button" class="condition condition1" data-name='location' data-val='高雄市'>高雄市
                        </button>
                        <button type="button" class="condition" data-name='location' data-val='屏東縣'>屏東縣</button>
                        <button type="button" class="condition" data-name='location' data-val='花蓮縣'>花蓮縣</button>
                        <br class="forRWD">
                        <button type="button" class="condition" data-name='location' data-val='台東縣'>台東縣</button>
                        <button type="button" class="condition" data-name='location' data-val='離島'>離島</button>
                    </div>
                </div>
                <div>
                    <label class="selectTitle">性別：</label>
                    <div class="formInsert">
                        <button type="button" class="condition condition1" data-name='gender' data-val='0'>男孩</button>
                        <button type="button" class="condition" data-name='gender' data-val='1'>女孩</button>
                    </div>
                </div>
            </div>
            <div id='S_checkbox' style='display:none;'></div>
        </form>
        <select name="sortCat" id="sortCat">
			<?php
			isset($_GET['sort']) ? $sort = $_GET['sort'] : $sort = 1;
			if ($sort == 2) {
				echo "<option value='1'>刊登日期從新到舊</option>
						<option value='2' selected>刊登日期從舊到新</option>";
			} else {
				echo "<option value='1' selected>刊登日期從新到舊</option>
						<option value='2'>刊登日期從舊到新</option>";
			}
			?>


        </select>
        <div id="black"></div>
        <div id="quickViewArea"></div>
        <div class="catPic" id="content">
			<?php
			$searchCon = isset($_GET['sort']) ? 'sort=' . $_GET['sort'] . '&' : '';
			$searchCon .= isset($_GET['searchText']) ? 'searchText=' . $_GET['searchText'] : '';

			require_once("../php/connectBD103G2.php");
			if ($sort == 2) {
				$desc = '';
			} else if ($sort == 1) {
				$desc = 'desc';
			}

            if(isset($_REQUEST["searchBar"])){

                $north = "and CAT_LOCATION in ('台北市','新北市','基隆市','桃園市','新竹市','新竹縣','宜蘭縣')";
                $east = "and CAT_LOCATION in ('花蓮縣','台東縣')";
                $center = "and CAT_LOCATION in ('苗栗縣','台中市','彰化縣','南投縣','雲林縣','嘉義縣','嘉義市')";
                $out = "and CAT_LOCATION in ('金門縣','連江縣','澎湖縣')";
                $south = "and CAT_LOCATION in ('台南市','高雄市','屏東縣')";
                $catLocation = "";

                if(!empty($_REQUEST["catLocation"])){

                    switch ($_REQUEST["catLocation"]) {
                        
                        case 'north':
                        $catLocation = $north;
                            break;

                        case 'east':
                        $catLocation = $east;
                            break;

                        case 'center':
                        $catLocation = $center;
                            break;

                        case 'out':
                        $catLocation = $out;
                            break;

                        case 'south':
                        $catLocation = $south;
                            break;
                    }
                }
                $catColor = $_REQUEST["catColor"];
                $catColor = empty($catColor) ? "" : "and CAT_COLOR = '$catColor'";

                $catSex = $_REQUEST["catSex"];
                $catSex = $_REQUEST["catSex"] == '' ? "" : "and CAT_SEX = '$catSex'";

                $catName = $_REQUEST["catName"];
                $catName = empty($_REQUEST["catName"]) ? "" : "and CAT_NAME like('%$catName%')";

                $sql = "select count(1) from cat where `ADOPT_STATUS` = 0 $catLocation $catColor $catSex $catName";    // 計算資料筆數
                $total = $pdo->query($sql);
                $rownum = $total->fetchcolumn();                            // 總共欄位數
                $perPage = 9;                                               // 每頁顯示筆數
                $totalpage = ceil($rownum / $perPage);                        // 計算總頁數
                $pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
                // 若無當前頁數則進入第一頁 若有則進入該頁
                $start = ($pageNo - 1) * $perPage;                            // 計算起始頁數
                $sql = "select * from cat 
                        where `ADOPT_STATUS` = 0 $catLocation $catColor $catSex $catName
                        order by CAT_NO $desc 
                        limit $start, $perPage";
                $cat = $pdo -> query($sql);
                // $cat = $pdo -> prepare($sql);
                // $cat -> bindParam(":catLocation",$catLocation);
                // $cat -> bindParam(":catColor",$catColor);
                // $cat -> bindParam(":catSex",$catSex);
                // $cat -> bindParam(":catName",$catName);
                // $cat -> execute();
                // 設定每頁呈現內容
                $catRow = $cat->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $sql = "select count(1) from cat where `ADOPT_STATUS` = 0";    // 計算資料筆數
                $total = $pdo->query($sql);
                $rownum = $total->fetchcolumn();                            // 總共欄位數
                $perPage = 9;                                               // 每頁顯示筆數
                $totalpage = ceil($rownum / $perPage);                        // 計算總頁數
                $pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
                // 若無當前頁數則進入第一頁 若有則進入該頁
                $start = ($pageNo - 1) * $perPage;                            // 計算起始頁數
                $sql = "select * from cat where `ADOPT_STATUS` = 0 order by CAT_NO $desc limit $start, $perPage";
                // 設定每頁呈現內容
                $cat = $pdo->query($sql);
                $catRow = $cat->fetchAll(PDO::FETCH_ASSOC);
                
            }


			if ($rownum == 0) {
                echo "這裡已經沒有需要認養的喵喵了~~";
			}else{
			    try {
			        foreach ($catRow as $i => $cat_Row) {
			?>
                <picture class="catItem">
					<?php
					if ($_SESSION['MEM_NO'] !== null) {
						$MEMNO = $_SESSION['MEM_NO'];
						$CATNO = $cat_Row['CAT_NO'];
						$sql2 = "select count(1) from favorite where mem_no = $MEMNO and cat_no = $CATNO";
						$like = $pdo->query($sql2);
						if ($like->fetchcolumn() == 1) {
							$heart = "fa fa-heart favorite";
							$likeNot = "1";
						} else {
							$heart = "fa fa-heart-o favorite";
							$likeNot = "0";
						}
                    }
                    else{
                        $heart = "fa fa-heart-o favorite login";
                        $likeNot = "0";
                    }
					?>
                    <i class="<?php echo $heart ;?>" aria-hidden="true" data-boolean="<?php echo $likeNot ;?>" data-val="<?php echo $cat_Row['CAT_NO'] ;?>"></i>
                    <div class="catContent">
                        <a href="catContent.php?catNo=<?php
						echo $cat_Row['CAT_NO'];?>" title="瀏覽<?php
						echo $cat_Row['CAT_NAME'];?>">
                            <div class="img">
                                <img src="<?php
								echo $cat_Row['CAT_COVER'];?>" alt="<?php
								echo $cat_Row['CAT_NAME'];?>">
                            </div>
                        </a>
                        <button type="button" class="quickView" data-val="<?php
						echo $cat_Row['CAT_NO'];?>">
                            點擊看大圖
                        </button>
                    </div>
                    <figure>
                        <h3><?php
							echo $cat_Row['CAT_NAME'];?></h3>
                        <br><?php
						echo $cat_Row['CAT_LOCATION'];?>
                        <br>約<?php
						echo $cat_Row['CAT_DATE'];?>出生
                        <br><?php
						if ($cat_Row['CAT_SEX'] == 1) {
							echo '女生<i class="fa fa-venus" aria-hidden="true"></i>';
						} else if ($cat_Row['CAT_SEX'] == 0) {
							echo '男生<i class="fa fa-mars" aria-hidden="true"></i>';
						}
						?>
                        <br><?php
						echo $cat_Row['CAT_NARRATIVE'];?>
                    </figure>
                </picture>
				<?php
            }
			?>
            <div class="page">
				<?php
				for ($i = 1; $i <= $totalpage; $i++) {
					echo "<a href='?pageNo=$i&$searchCon' class='pageNo defaultBtn'>" . $i . "</a>";
				}
				?>
            </div>
        </div>
    </div>
</div>
<?php
    
} catch (PDOException $e) {
	echo "行號: ", $e->getLine(), "<br>";
	echo "訊息: ", $e->getMessage(), "<br>";
}
}
echo "</div>";
echo "</div>";
echo "</div>";
?>

<script src="../js/cat/catSearchAjax.js"></script>
<script src="../js/cat/advanceSearch_JQuery.js"></script>
<footer>
    <div class="container">
        <div class="follow">
            <div class="btns">
                <span>follow us on</span>
                <a href="#" class="btn facebook">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="#" class="btn youtube">
                    <i class="fa fa-youtube"></i>
                </a>
                <a href="#" class="btn twitter">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="#" class="btn google">
                    <i class="fa fa-google"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
</body>

</html>