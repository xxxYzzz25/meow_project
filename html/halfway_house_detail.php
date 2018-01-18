<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="https://use.fontawesome.com/533f4a82f0.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<link rel="stylesheet" href="../css/halfway_house_detail.css">
    <script src="../js/signIn.js"></script>
	<title>中途之家</title>
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
            <form action="php/signIn2Member.php" class="signUpForm" id="signInForm" method="post" autocomplete="off">
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
            <form action="php/signUp2mem.php" method="post" id="signUpForm" enctype="multipart/form-data" autocomplete="off">
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
					<a href="../catSearch.html">尋喵</a>
				</li>
				<li>
					<a href="../halfway_house_search.php">中途之家</a>
				</li>
				<li>
					<a href="../Cat_ShoppingStore.html" title="前往商城">商城</a>
				</li>
				<li>
					<a href="../forum.html">討論區</a>
				</li>
				<li>
					<a href="../member.html">會員專區</a>
				</li>
			</ul>
		</nav>
		<div class="icons">
			<a href="#">
				<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
			</a>
			<a href="#" class="login">
				<i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
			</a>
			<a href="#">
				<i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
				<span id="like">6</span>
			</a>
		</div>
	</header>

<?php
$halfno = $_REQUEST["halfno"];
// $memno = $_SESSION["MEM_NO"];
$memno = 1;
try {
    require_once "../php/connectBD103G2.php";

    $sql = "select HALF_NAME,HALF_ADDRESS,
				HALF_TEL,HALF_OPEN,
				HALF_INTRO,HALF_COVER,
				EVALUATION_STARS,
				ROUND(avg(EVALUATION_STARS), 1),
				COUNT(EVALUATION_STARS)
				from halfway_member h,evaluation e
				where h.HALF_NO=e.HALF_NO
				and h.HALF_NO=$halfno";
    $halfway = $pdo->prepare($sql);
    $halfway->bindColumn("HALF_NAME", $NAME);
    $halfway->bindColumn("HALF_ADDRESS", $ADDRESS);
    $halfway->bindColumn("HALF_TEL", $TEL);
    $halfway->bindColumn("HALF_OPEN", $OPEN);
    $halfway->bindColumn("HALF_INTRO", $INTRO);
    $halfway->bindColumn("HALF_COVER", $COVER);
    $halfway->bindColumn("ROUND(avg(EVALUATION_STARS), 1)", $AVG);
    $halfway->bindColumn("COUNT(EVALUATION_STARS)", $COUNT);
    $halfway->execute();
    $row = $halfway->fetchObject()
    ?>

	<div class="right">
		<div class="breadcrumbs">
			<a href="../index.php" class="defaultBtn">尋喵啟事</a> >
			<a href="halfway_house_search.html" class="defaultBtn">搜尋中途之家</a> >
			<a href="halfway_house_detail.html" class="defaultBtn">
				<?php echo $NAME ?>
			</a>
		</div>
		<div class="banner">
			<h2>
				<?php echo $NAME ?>
			</h2>
			<div class="contact">
				<p>地址：
					<?php echo $ADDRESS ?>
				</p>
				<p>電話：
					<?php echo $TEL ?>
				</p>
				<p>營業時間：
					<?php echo $OPEN ?>
				</p>
			</div>
			<div class="container">
				<div class="bigpic" style="background-image: url(<?php echo $COVER ?>);"></div>
				<div class="text">
					<div class="intro">
						<?php echo $INTRO ?>
					</div>
					<div class="star">
						<fieldset class="rating">
							<input type="radio" id="star5" name="rating" value="5" />
							<label class="full" for="star5" title="非常好 - 5 stars"></label>

							<input type="radio" id="star4half" name="rating" value="4.5" />
							<label class="half" for="star4half" title="非常不錯 - 4.5 stars"></label>

							<input type="radio" id="star4" name="rating" value="4" />
							<label class="full" for="star4" title="很不錯 - 4 stars"></label>

							<input type="radio" id="star3half" name="rating" value="3.5" />
							<label class="half" for="star3half" title="還不錯 - 3.5 stars"></label>

							<input type="radio" id="star3" name="rating" value="3" />
							<label class="full" for="star3" title="還好 - 3 stars"></label>

							<input type="radio" id="star2half" name="rating" value="2.5" />
							<label class="half" for="star2half" title="有點不好 - 2.5 stars"></label>

							<input type="radio" id="star2" name="rating" value="2" />
							<label class="full" for="star2" title="不好 - 2 stars"></label>

							<input type="radio" id="star1half" name="rating" value="1.5" />
							<label class="half" for="star1half" title="有點糟 - 1.5 stars"></label>

							<input type="radio" id="star1" name="rating" value="1" />
							<label class="full" for="star1" title="很糟糕 - 1 star"></label>

							<input type="radio" id="starhalf" name="rating" value="0.5" />
							<label class="half" for="starhalf" title="糟透了 - 0.5 stars"></label>

						</fieldset>
						<div class="ratingscore">
							您的評分
							<span id="scoretext">0</span>/5顆星
							<input type="hidden" name="" value="">
						</div>
						<div class="ratingtext">
							總平均
							<span id="avgScore"><?php echo $AVG ?></span>/5顆星(共<span id="person"><?php echo $COUNT ?></span>人評分)
						</div>
					</div>
				</div>
			</div>
		</div>

<script>
	//把點到的星星數量傳到scoretext秀出來
	let input = document.getElementsByTagName('input');
	for (let i = 0; i < input.length; i++) {
		input[i].addEventListener('click', function () {
			let score = input[i].getAttribute('value');
			let scoretext = document.getElementById('scoretext');
			scoretext.innerHTML = score;

			// ajax傳到php 存到mysql
			let xhr = new XMLHttpRequest();
			xhr.onload=function(){
				let response = JSON.parse(xhr.responseText);
				document.getElementById("avgScore").innerHTML=response.avg;
				document.getElementById("person").innerHTML=response.count;
			}
			if (scoretext.innerHTML !== 0) {
				alert("您已經評過分了！");
			}
			let url = "../php/halfwayScoreToDb.php?EVALUATION_STARS="+ score +"&MEM_NO=<?php echo $memno ?>&HALF_NO=<?php echo $halfno ?>";
			xhr.open("get", url, true);
			xhr.send(null);
		});
	}
</script>

<?php
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>

		<div class="halfwaypic">
			<div class="container">

<?php
try {
    require_once "../php/connectBD103G2.php";

    $sql     = "select * from half_pic where HALF_NO=$halfno";
    $halfway = $pdo->prepare($sql);
    $halfway->bindColumn("HALF_PIC_PATH", $PATH);
    $halfway->execute();
    while ($row = $halfway->fetchObject()) {
        ?>

			<div class="picture">
				<img src="<?php echo $PATH ?>" alt="halfwaypic">
			</div>

<?php
}
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>

			</div>
		</div>
		<script src="../js/halfway/showlarge.js"></script>



		<div class="cat">
			<h2>我們的喵小孩</h2>
			<div class="container">

<?php
try {
    require_once "../php/connectBD103G2.php";

    $sql     = "select * from cat where HALF_NO=$halfno";
    $halfway = $pdo->prepare($sql);
    $halfway->bindColumn("CAT_NAME", $NAME);
    $halfway->bindColumn("CAT_COVER", $COVER);
    $halfway->bindColumn("CAT_DATE", $ADDRESS);
    $halfway->bindColumn("CAT_SEX", $SEX);
    $halfway->bindColumn("CAT_NARRATIVE", $NARRATIVE);
    $halfway->execute();
    while ($row = $halfway->fetchObject()) {
        ?>

				<div class="catitem">
					<i class="fa fa-heart-o favorite" aria-hidden="true"></i>
					<div class="catpic">
						<img src="<?php echo $COVER ?>" alt="cat">
					</div>
					<div class="text">
						<h3>
							<?php echo $NAME ?>
						</h3>
						<?php echo $ADDRESS ?>
						<br>
						<?php
if ($SEX = 1) {
            echo "男生" . "<i class='fa fa-mars' aria-hidden='true'></i>";
        } else {
            echo "女生" . "<i class='fa fa-venus' aria-hidden='true'></i>";
        }
        ?>
						<br>
						<?php echo $NARRATIVE ?>
					</div>
				</div>

<?php
}

} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>
			</div>
		</div>
		<script src="../js/cat/like.js"></script>



		<div class="map">
			<h2>我們的位置</h2>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1808.4820782514587!2d121.19146549411086!3d24.967334110163314!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1b5e6ee66e9fec49!2z6LOH562W5pyD5Lit5aOiIFRpYmFNZSDlnIvpmpvkurrmiY3nmbzlsZXkuK3lv4M!5e0!3m2!1szh-TW!2stw!4v1514365006333"
			    frameborder="0" style="border:0" allowfullscreen id="map"></iframe>
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
</body>

</html>