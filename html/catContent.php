<?php
ob_start();
session_start();
isset($_SESSION['MEM_NO']) ? $_SESSION['MEM_NO'] = $_SESSION['MEM_NO'] : $_SESSION['MEM_NO'] = null;
isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	require_once("../php/connectBD103G2.php");
	$no = $_GET['catNo'];
	$sql = "select * from cat where cat_no = $no";
	$stmt = $pdo->query($sql);
	$nameRow = $stmt->fetch();
	?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/catContent.css">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="../js/signIn.js"></script>
    <!-- 引用加入追蹤 -->
    <script src="../js/cat/like.js"></script>
    <!-- 引用助養資訊表格 -->
    <script src="../js/cat/createTable.js"></script>
    <script src="../js/cat/adopt.js"></script>
    <title><?php echo $nameRow['CAT_NAME']; ?></title>
</head>

<body>
<div class="signUpLightboxBlack"></div>
<div class="signUpLightbox" id="loginBox">
    <i class="fa fa-times cancel"></i>
    <div class="bgImg" id="bgImg"></div>
    <div id="formShape1" class="formShape formShape1">
        <div class="chioce">
            <button id="halfMember1">中途之家會員</button>
            <button id="member1" class="selected">一般會員</button>
        </div>
        <form action="../php/signIn2Member.php" class="signUpForm" id="signInForm" method="post" autocomplete="off">
            <br>
            <br>
            <br>
            <br>
            <label for="userId">會員帳號
                <br>
                <small>請輸入您的電子郵件</small>
            </label>
            <input type="email" id="userIdIn" name="memId" required>
            <br>
            <label for="userPsw">會員密碼
                <br>
                <small>請輸入6~10碼英數字</small>
            </label>
            <input type="password" id="userPswIn" name="memPsw" required>
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
        <form action="../php/signUp2mem.php" method="post" id="signUpForm" enctype="multipart/form-data" autocomplete="off">
            <label for="userName">會員名稱
                <br>
                <small>不得多於8個中/英文字元</small>
            </label>
            <input type="text" name="userName" id="userName" placeholder="請輸入您的名稱" required>
            <br>
            <label for="userId">會員帳號
                <br>
                <small>請輸入您的電子郵件</small>
            </label>
            <input type="email" name="userId" id="userId" placeholder="請輸入您的電子郵件" required>
            <br>
            <label for="userPsw">會員密碼
                <br>
                <small>請輸入6~10碼英數字</small>
            </label>
            <input type="password" name="userPsw" id="userPsw" placeholder="請輸入您的密碼" required>
            <br>
            <label for="userTel">聯絡電話
                <br>
            </label>
            <input type="tel" name="userTel" id="userTel" placeholder="請輸入您的手機號碼" required>
            <br>
            <label for="userBirth">會員生日
                <br>
            </label>
            <input type="text" name="userBirth" id="userBirth" placeholder="ex:19900101" required>
            <br>
            <label for="userAddress">通訊地址
                <br>
            </label>
            <input type="text" name="userAddress" id="userAddress" placeholder="請輸入您的地址" required>
            <br>
            <div class="chioce">
                <label for="userPhoto" class="formBtn" id="userPhotoLabel" required>
                    點我上傳您的大頭貼
                </label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                <input type="file" name='image' id="userPhoto" placeholder="您可以上傳您的檔案" value="file">
                <input type="submit" id="loginBoxSubmit" class="formBtn formSubmitBtn" value="確認註冊">
            </div>
            <p class="signInUpPos">已經是會員了嗎?
                <span id="signUp2In">點此登入</span>
            </p>
        </form>
    </div>
</div>
<header>
    <div class="logo">
        <a href="../index.php">
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
                    if($_SESSION['HALF_NO'] == null){
                        echo "<a href='member.html'>會員專區</a>";
                    }
                    else{
                        echo "<a href='halfMem.html'>中途會員專區</a>";
                    }
                ?>
            </li>
        </ul>
    </nav>
    <div class="icons">
        <a href="#">
            <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
        </a><?php
                if(isset($_SESSION["MEM_NO"])){
                    echo "<a href='../php/memberLogOut.php' id='loginBtn'>
                        <i class='fa fa-sign-out fa-2x' aria-hidden='true'></i>
                        </a>";
                }elseif (isset($_SESSION["HALF_NO"])) {
                    echo "<a href='../php/memberLogOut.php' class='login123' id='loginBtn'>
                        <i class='fa fa-sign-out fa-2x' aria-hidden='true'></i>
                        </a>";
                }
                else{
                    echo "<a href='#' class='login login123' id='loginBtn'>
                        <i class='fa fa-user-circle-o fa-2x' aria-hidden='true'></i>
                        </a>";
                }
        ?>
        <a href="#">
            <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
            <span id="like">6</span>
        </a>
    </div>
    <div class="hb">
        <div class="hamburger" id="hamburger-6">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>
</header>
<?php
try{
$sql = "select * from cat c join halfway_member h on c.half_no = h.half_no where c.CAT_NO = $no";
$cats = $pdo->query($sql);
$catRow = $cats->fetchObject();
?>
<div class="right">
    <div class="container container1">
        <div class="breadcrumbs">
            <a href="../index.php" class="defaultBtn" title="前往首頁">尋喵啟事</a> >
            <a href="catSearch.php" class="defaultBtn" title="前往尋喵">尋喵</a> >
            <a href="catContent.php?catNo=<?php echo $catRow->CAT_NO?>" class="defaultBtn" title="瀏覽<?php echo $catRow->CAT_NAME?>"><?php echo $catRow->CAT_NAME; ?></a>
        </div>
        <picture class="catItem">
            <div class="img">
				<?php
				if ($_SESSION['MEM_NO'] !== null) {
					$MEMNO = $_SESSION['MEM_NO'];
					$CATNO = $catRow->CAT_NO;
					$sql2 = "select count(1) from favorite where mem_no = $MEMNO and cat_no = $CATNO";
					$like = $pdo->query($sql2);
					if ($like->fetchcolumn() == 1) {
						$heart = "fa fa-heart favorite";
						$likeNot = "1";
					} else {
						$heart = "fa fa-heart-o favorite";
						$likeNot = "0";
					}
				} else {
					$heart = "fa fa-heart-o favorite";
					$likeNot = "0";
				}
				?>
                <i class="<?php
				echo $heart; ?>" aria-hidden="true" data-boolean="<?php
				echo $likeNot; ?>" data-val="<?php
				echo $catRow->CAT_NO; ?>"></i>
                <img src="<?php echo $catRow->CAT_COVER; ?>" alt="<?php echo $catRow->CAT_NAME; ?>">
            </div>
            <figure>
                <h1><?php echo $catRow->CAT_NAME; ?></h1>
                <br><?php echo $catRow->HALF_NAME; ?>
                <br>約<?php echo $catRow->CAT_DATE; ?>月份出生
                <br>性別:<?php
				if ($catRow->CAT_SEX == 1) {
					echo '女生<i class="fa fa-venus" aria-hidden="true"></i>';
				} else if ($catRow->CAT_SEX == 0) {
					echo '男生<i class="fa fa-mars" aria-hidden="true"></i>';
				}
				?>
                <br>個性:<?php
				echo $catRow->CAT_NARRATIVE; ?>
                <br>毛色:<?php
				echo $catRow->CAT_COLOR; ?>
                <br>地區:<?php
				echo $catRow->CAT_LOCATION; ?>
                <br>疫苗:<?php
				if ($catRow->CAT_VACCINE == 1) {
					echo '已施打';
				} else if ($catRow->CAT_VACCINE == 0) {
					echo '未施打';
				}
				?>
                <br>結紮:<?php
				if ($catRow->CAT_LIGATION == 1) {
					echo '已結紮';
				} else if ($catRow->CAT_LIGATION == 0) {
					echo '未結紮';
				}
				} catch (PDOException $e) {
					echo "行號: ", $e->getLine(), "<br>";
					echo "訊息: ", $e->getMessage(), "<br>";
				}
				?>
                <div class="btn">
                    <?php
                    if(( $_SESSION['MEM_NO']) !== null ){
                        echo "<button class='defaultBtn' data-val=";
                        echo $catRow->CAT_NO.' ';
                        echo "id='adoptThis'>我要領養</button>";
                    }else{
                        echo"<button class='defaultBtn login'>我要領養</button>";
                    }
                    ?>
                    <button class="defaultBtn" id="donate">我要助養</button>
                </div>
            </figure>
        </picture>
        <div>
            <form action="../php/donate2db.php" id="donateArea" class="donateForm" method="post">
                <input type="hidden" name="catNo" value="<?php echo $no; ?>">
            </form>
        </div>
        <div class="donateInfo"><br>
			<?php
			$sql2 = "select count(1) from donate where CAT_NO = $no";
			$total = $pdo->query($sql2);
			$rownum = $total->fetchcolumn();
			$sql2 = "select * from donate where CAT_NO = $no";
			$donate = $pdo->query($sql2);
			$donateRow = $donate->fetchAll(PDO::FETCH_ASSOC);
			if ($rownum == 0) {
				echo "目前還沒有助養, 歡迎您成為他的第一個助養人！";
			} else {
				try {
					foreach ($donateRow as $donate_Row) {
						?>
                        感謝
                        <span>
                    <?php
                    echo $donate_Row['DONATE_NAME']; ?>
                </span>先生/小姐 助養喵航航
                        <span>
                    <?php
                    echo $donate_Row['DONATE_PRICE']; ?>
                </span> 元<br>
						<?php
					}
				} catch (PDOException $e) {
					echo "行號: ", $e->getLine(), "<br>";
					echo "訊息: ", $e->getMessage(), "<br>";
				}
			}
			?>
            <br>
            <canvas id="canvas" width="300" height="300">
                <p>抱歉, 您的瀏覽器不支援canvas。
                    <br>請盡量使用chrome瀏覽器獲得最佳使用體驗
                </p>
            </canvas>
            <h2>本月目標
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>
				<?php
				$sql2 = "select cat_no, SUM(DONATE_PRICE) total from donate where CAT_NO = $no group by CAT_NO";
				$donate = $pdo->query($sql2);
				$donateRow = $donate->fetchObject();
				echo isset($donateRow->cat_no) ? $donateRow->total : 0;
				if (isset($donateRow->cat_no)) {
					echo "<script>var totalDonate = $donateRow->total</script>";
				} else {
					echo "<script>var totalDonate = 0</script>";
				}
				?>
                NT/ 2750NT</h2>
        </div>

        <section class="introduction">
            <span class="title">【簡單介紹:】</span>
            <ul>
                <li>◎個性：<?php echo $catRow->CAT_INDIVIDUALITY; ?></li>
                <li>◎適合對象：<?php echo $catRow->CAT_FIT; ?></li>
                <li>◎優點：<?php echo $catRow->CAT_ADVANTAGE; ?></li>
                <li>◎缺點：<?php echo $catRow->CAT_DISADVANTAGE; ?></li>
            </ul>
            <span class="title">【領養流程說明:】</span>
            <ul>
                <li>→到店實際與毛孩互動、深入了解其個性</li>
                <li>→認養人填答問卷</li>
                <li>→雙方面談(網路or見面皆可)</li>
                <li>→確認想養後需到府家訪(觀看毛孩將來的生活環境並提醒需要注意的地方)、交付認養協議書雙方細閱討論</li>
                <li>→認養費用一位孩子$3000.NT-</li>
                <li>→帶毛孩回家疼</li>
            </ul>
            <span class="title">【領養條件:】</span>
            <ol>
                <li>1.需年滿25歲，25歲內需要家長同意簽切決書。</li>
                <li>2.必須親自來店內與動物相處互動過才能領養。</li>
                <li>3.可以定期追蹤、可以接受家訪。</li>
                <li>4.每年疫苗施打、預防藥使用。</li>
                <li>5.無法接受放養、顧工廠、顧農地。</li>
                <li>6.幼貓比較調皮需要非常多耐心教導
                    <br>
                    <small> (每個孩子到新環境都需要適應時間，如無法給予，請勿領養)</small>
                </li>
                <li>7.晶片不轉移，定期回報毛孩狀況ㄧ個月至少ㄧ次與領養動物物合拍一張照片存檔。
                    <br>
                    <small> (如沒有定期回報者，將依照切決書內容強制要回此動物)</small>
                </li>
                <li>8.確定領養後一周內要接回家，把位置讓給下一隻等家浪浪。</li>
            </ol>
            <span class="title">【您知道養一隻喵喵要多少錢嗎?】</span>

            <ol>
                <li class='cost'>一次性開銷:</li>
                <p>貓砂盆、飯盆、水盆與逗貓棒等等玩具大約要2000元。
                    <br>絕育手術成年禮+晶片，大概估2,000元(公貓會比母貓便宜點)。這樣
                    <span>一次性開銷大概是4,000元</span>。
                </p>
                <li class='cost'>每月餐費:</li>
                <p>用莫比無穀3公斤700元超低價來看，大概要1包半，1,050元。
                    <br>當然都吃飼料，水分攝取不夠，會容易有泌尿相關疾病，所以使用副食罐加水，一天一個騙貓咪喝水，惜食小金罐、小銀罐算她20元好了，一個月要600元。
                    <br>當然很鼓勵溼食，不過我們簡單假設，這樣
                    <span>每月餐費大概1,650元</span>。
                </p>
                <li class='cost'>每月貓砂:</li>
                <p>
                    如果用便宜一點的崩解木屑砂，大概要600元。
                    <br>好一點不要太多粉塵又耐用一點的球砂或礦砂，養一貓的朋友大概是900元。
                    <br>取較低價，
                    <span>每月廁所費算600元</span>。
                </p>
                <li class='cost'>每月滴劑:</li>
                <p>
                    心疥爽或寵愛，
                    <span>每月一管250元</span>。
                </p>
                <li class='cost'>醫藥費:</li>
                <p>
                    3合一預防（或4合一+貓白血）、四合一kit檢驗、狂犬，加上基本血液檢查，並請醫生觸診，大概要2,500到3,000元（獸醫公會都會有建議的價目表可以查詢參考）。
                    <br>
                    <span>每年基本健康開銷，算3,000元</span>。
                </p>
                <li class='cost'>開銷小計:</li>
                <p>
                    <span>第一年，您的花費大概會是</span>
                    <!-- <br>4,000+1,650*12+600*12+250*12+3,000＝ -->
                    <span>37,000元</span>
                </p>
            </ol>
        </section>
    </div>
</div>
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
<script src="../js/cat/processBar.js"></script>

</body>

</html>