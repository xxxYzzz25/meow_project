<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="https://use.fontawesome.com/533f4a82f0.js"></script>
	<link rel="stylesheet" href="../css/halfway_house_detail.css">
	<title>中途之家</title>
</head>

<body>
	<header>
		<div class="logo">
			<a href="../index.html">
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
					<a href="../php/halfway_house_search.php">中途之家</a>
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
			<a href="#">
				<i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
			</a>
			<a href="#">
				<i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
				<span id="like">6</span>
			</a>
		</div>
	</header>

<?php
$no = $_REQUEST["halfno"];

try {
    require_once "../php/connectBD103G2.php";

    $sql     = "select * from halfway_member where HALF_NO=$no";
    $halfway = $pdo->prepare($sql);
    $halfway->bindColumn("HALF_NAME", $NAME);
    $halfway->bindColumn("HALF_ADDRESS", $ADDRESS);
    $halfway->bindColumn("HALF_TEL", $TEL);
    $halfway->bindColumn("HALF_OPEN", $OPEN);
    $halfway->bindColumn("HALF_INTRO", $INTRO);
    $halfway->bindColumn("HALF_COVER", $COVER);
    $halfway->execute();
    $row = $halfway->fetchObject()
    ?>

	<div class="right">
		<div class="breadcrumbs">
			<a href="../index.html" class="defaultBtn">尋喵啟事</a> >
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
							<label class="full" for="star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="star4half" name="rating" value="4 and a half" />
							<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input type="radio" id="star4" name="rating" value="4" />
							<label class="full" for="star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="star3half" name="rating" value="3 and a half" />
							<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input type="radio" id="star3" name="rating" value="3" />
							<label class="full" for="star3" title="Meh - 3 stars"></label>
							<input type="radio" id="star2half" name="rating" value="2 and a half" />
							<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input type="radio" id="star2" name="rating" value="2" />
							<label class="full" for="star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="star1half" name="rating" value="1 and a half" />
							<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input type="radio" id="star1" name="rating" value="1" />
							<label class="full" for="star1" title="Sucks big time - 1 star"></label>
							<input type="radio" id="starhalf" name="rating" value="half" />
							<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
						</fieldset>
						<div class="ratingtext">
							總平均
							<span>4.6</span>/5顆星(共10人評分)
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    // echo "getCode : " , $e->getCode() , "<br>";
    // echo "異動失敗,請聯絡系統維護人員";
}
?>

		<div class="halfwaypic">
			<div class="container">

<?php
try {
    require_once "../php/connectBD103G2.php";

    $sql     = "select * from half_pic where HALF_NO=$no";
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
    // echo "getCode : " , $e->getCode() , "<br>";
    // echo "異動失敗,請聯絡系統維護人員";
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

    $sql     = "select * from cat where HALF_NO=$no";
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
						<?php echo $SEX ?>
						<i class="fa fa-venus" aria-hidden="true"></i>
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