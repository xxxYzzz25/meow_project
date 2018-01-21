<?php
    ob_start();
    session_start();
	isset($_SESSION['MEM_NO']) ? $_SESSION['MEM_NO'] = $_SESSION['MEM_NO'] : $_SESSION['MEM_NO'] = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="https://use.fontawesome.com/533f4a82f0.js"></script>
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyDKPVIamuQGV_Yi0y8zXQl5bUGs7bfxW04"></script>
    <script src="../js/signIn.js"></script>
	<link rel="stylesheet" href="../css/halfway_house_detail.css">
	<title>中途之家</title>
</head>

<body>
	<header>
		<div class="logo">
			<a href="index.php">
				<h1>
					<img src="../images/logo_white.png" alt="尋喵啟事" title="回首頁">
				</h1>
			</a>
		</div>
		<nav>
			<ul>
				<li>
					<a href="html/catSearch.html">尋喵</a>
				</li>
				<li>
					<a href="html/halfway_house_search.html">中途之家</a>
				</li>
				<li>
					<a href="html/Cat_ShoppingStore.html" title="前往商城">商城</a>
				</li>
				<li>
					<a href="html/forum.html">討論區</a>
				</li>
				<li>
					<a href="html/member.html">會員專區</a>
				</li>
			</ul>
		</nav>
		<div class="icons">
			<a href="#">
				<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
			</a>
			<?php
				if(isset($_SESSION["MEM_NO"]) || isset($_SESSION["HALF_NO"])){

					echo "<a href='php/memberLogOut.php'>
						<i class='fa fa-sign-out fa-2x' aria-hidden='true'></i>
						</a>";
				}else{
					echo "<a href='#' class='login'>
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
$halfno = $_REQUEST["halfno"];
$memno = $_SESSION["MEM_NO"];
// $memno = 1;
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
							<span id="scoretext">
								<?php
									if ($_SESSION['MEM_NO'] !== null) {
										$sql2 = "select count(*),EVALUATION_STARS es 
												from evaluation 
												where MEM_NO = $memno and HALF_NO = $halfno";
										$starcount = $pdo->query($sql2);
										$starcountRow = $starcount->fetchObject();
										if ( $starcountRow->es != '') {
											echo $starcountRow->es;
										} else {
											echo "0";
										}
									}
								?>
							</span>/5顆星
						</div>
						<div class="ratingtext">
							總平均
							<span id="avgScore"><?php echo $AVG ?></span>/5顆星(共<span id="count"><?php echo $COUNT ?></span>人評分)
						</div>
					</div>
				</div>
			</div>
		</div>

<script>
	//把點到的星星數量傳到scoretext秀出來
	let inputbtn = document.getElementsByTagName('input');
	for (let i = 0; i < inputbtn.length; i++) {
		inputbtn[i].addEventListener('click', function () {
			if (scoretext.innerHTML == '0') {
				let score = inputbtn[i].getAttribute('value');
				// ajax傳到php 存到mysql
				let xhr = new XMLHttpRequest();
				xhr.onload=function(){
					let response = JSON.parse(xhr.responseText);
					document.getElementById("avgScore").innerHTML=response.avg;
					document.getElementById("count").innerHTML=response.count;
					document.getElementById("scoretext").innerHTML=response.star;
				}
				let url = "../php/halfwayScoreToDb.php?EVALUATION_STARS="+ score +"&MEM_NO=<?php echo $memno ?>&HALF_NO=<?php echo $halfno ?>";
				xhr.open("get", url, true);
				xhr.send(null);
			}else{
				alert("您已經評過分囉!");
			}
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
	
	$sql = "select count(1) from cat where HALF_NO=$halfno";    // 計算資料筆數
	$total = $pdo->query($sql);
	$rownum = $total->fetchcolumn();                            // 總共欄位數
	$perPage = 6;                                               // 每頁顯示筆數
	$totalpage = ceil($rownum / $perPage);                      // 計算總頁數
	$pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
	// 若無當前頁數則進入第一頁 若有則進入該頁
	$start = ($pageNo - 1) * $perPage;   
	// 設定每頁呈現內容
    $sql     = "select * from cat where HALF_NO=$halfno limit $start, $perPage";
    $halfway = $pdo->prepare($sql);
    $halfway->bindColumn("CAT_NAME", $CNAME);
    $halfway->bindColumn("CAT_COVER", $COVER);
    $halfway->bindColumn("CAT_DATE", $DATE);
    $halfway->bindColumn("CAT_SEX", $SEX);
    $halfway->bindColumn("CAT_NARRATIVE", $NARRATIVE);
	$halfway->execute();
	if( $halfway->rowCount()==0){
        echo "<center>此中途之家沒有任何喵小孩哦!</center>";
    }else{
    	while ($row = $halfway->fetchObject()) {
?>
			<div class="catitem">
				<i class="fa fa-heart-o favorite" aria-hidden="true"></i>
				<div class="catpic">
					<img src="<?php echo $COVER ?>" alt="cat">
				</div>
				<div class="text">
					<h3>
						<?php echo $CNAME ?>
					</h3>
					<?php echo $DATE ?>
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
	}
?>
			</div>
			<div class="page">
				<?php
					for ($i = 1; $i <= $totalpage; $i++) {
						echo "<a href='?halfno=$halfno&pageNo=$i' class='pageNo defaultBtn'>" . $i . "</a>";
					}
				?>
			</div>
		</div>
		<script src="../js/cat/like.js"></script>


		<div class="map">
			<h2>我們的位置</h2>
			<div id="myMap" style="width:1300px;height:600px;"></div>
		</div>

		<script>
			function doFirst(){
				let geocoder = new google.maps.Geocoder();

				// 地址
				let add = "<?php echo $ADDRESS ?>";

				// 傳地址資訊至 geocoder.geocode
				geocoder.geocode({'address': add }, function(results, status) {
					if (status === google.maps.GeocoderStatus.OK) {
						// 如果有資料就會回傳
						if (results) {
							showmap(results[0].geometry.location);
						}
					}
					// 經緯度資訊錯誤
					else {
						alert("Reverse Geocoding failed because: " + status);
					}
				});

				function showmap(params) {
					let area = document.getElementById('myMap');

					let myMap = new google.maps.Map(area,{
						zoom: 16,
						center: params,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					});

					let marker = new google.maps.Marker({
						position: params,
						map: myMap,
						icon: '../images/flycat1.png',
						title: ''
					});

					let infowindow = new google.maps.InfoWindow({
						content: "<center><?php echo $NAME ?></center><br><center><?php echo $ADDRESS ?></center>"
					});

					google.maps.event.addListener(marker, 'click', function() {
						infowindow.open(myMap, marker);
					});
				};

				
			}
			window.addEventListener('load',doFirst);
		</script>

	</div>

<?php
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>
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