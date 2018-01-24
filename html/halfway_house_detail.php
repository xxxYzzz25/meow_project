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
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/533f4a82f0.js"></script>
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyDKPVIamuQGV_Yi0y8zXQl5bUGs7bfxW04"></script>
    <script src="../js/signIn.js"></script>
    <script src="../js/cat/like.js"></script>
	<script src="../js/halfway/showlarge.js"></script>
	<!-- <script src="../js/halfway/star.js"></script> -->
	<link rel="stylesheet" href="../css/halfway_house_detail.css">
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
                    <a href="catSearch.php">尋喵</a>
                </li>
                <li>
                    <a href="halfway_house_search.php">中途之家</a>
                </li>
                <li>
                    <a href="Cat_ShoppingStore.php" title="前往商城">商城</a>
                </li>
                <li>
                    <a href="forum.php">討論區</a>
                </li>
                <li>
                    <?php
                        if($_SESSION['HALF_NO'] == null){
                            echo "<a href='member.php'>會員專區</a>";
                        }
                        else{
                            echo "<a href='halfMem.php'>中途會員專區</a>";
                        }
                    ?>
                </li>
            </ul>
        </nav>
        <div class="icons">
            <a href="html/Cat_ShoppingStore_cart.php">
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
			<a href="halfway_house_search.php" class="defaultBtn">搜尋中途之家</a> >
			<a href="halfway_house_detail.php?halfno=<?php echo $halfno ?>" class="defaultBtn">
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
				<div class="bigpic" style="background-image: url(<?php echo $COVER ?>)"></div>
				<div class="text">
					<div class="intro">
						<?php echo $INTRO ?>
					</div>
					<div class="star">
						<fieldset class="rating">
							<input type="radio" class="ratingbtn" id="star5" name="rating" value="5" />
							<label class="full" for="star5" title="非常好 - 5 stars"></label>

							<input type="radio" class="ratingbtn" id="star4half" name="rating" value="4.5" />
							<label class="half" for="star4half" title="非常不錯 - 4.5 stars"></label>

							<input type="radio" class="ratingbtn" id="star4" name="rating" value="4" />
							<label class="full" for="star4" title="很不錯 - 4 stars"></label>

							<input type="radio" class="ratingbtn" id="star3half" name="rating" value="3.5" />
							<label class="half" for="star3half" title="還不錯 - 3.5 stars"></label>

							<input type="radio" class="ratingbtn" id="star3" name="rating" value="3" />
							<label class="full" for="star3" title="還好 - 3 stars"></label>

							<input type="radio" class="ratingbtn" id="star2half" name="rating" value="2.5" />
							<label class="half" for="star2half" title="有點不好 - 2.5 stars"></label>

							<input type="radio" class="ratingbtn" id="star2" name="rating" value="2" />
							<label class="full" for="star2" title="不好 - 2 stars"></label>

							<input type="radio" class="ratingbtn" id="star1half" name="rating" value="1.5" />
							<label class="half" for="star1half" title="有點糟 - 1.5 stars"></label>

							<input type="radio" class="ratingbtn" id="star1" name="rating" value="1" />
							<label class="full" for="star1" title="很糟糕 - 1 star"></label>

							<input type="radio" class="ratingbtn" id="starhalf" name="rating" value="0.5" />
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
									}else{
										echo "0";
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
	let inputbtn = document.querySelectorAll('.ratingbtn');
	for (let i = 0; i < inputbtn.length; i++) {
        inputbtn[i].addEventListener('click', function () {
            if(localStorage.getItem('memNo') == null && localStorage.getItem('halfNo') == null){
                document.getElementsByClassName("signUpLightboxBlack")[0].style.display = "block";
                document.getElementsByClassName("signUpLightboxBlack")[0].style.top = "top";
                document.getElementById("loginBox").style.display = "block";
            }else{
                if (scoretext.innerHTML == 0) {
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



		<div class="cat">
			<h2>我們的喵小孩</h2>
			<div class="container">

<?php
try {
	require_once "../php/connectBD103G2.php";
	
	$sql = "select count(1) from cat where HALF_NO=$halfno and ADOPT_STATUS = 0";    // 計算資料筆數
	$total = $pdo->query($sql);
	$rownum = $total->fetchcolumn();                            // 總共欄位數
	$perPage = 6;                                               // 每頁顯示筆數
	$totalpage = ceil($rownum / $perPage);                      // 計算總頁數
	$pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
	// 若無當前頁數則進入第一頁 若有則進入該頁
	$start = ($pageNo - 1) * $perPage;   
	// 設定每頁呈現內容
    $sql = "select * from cat where HALF_NO=$halfno and ADOPT_STATUS = 0 limit $start, $perPage";
    $halfway = $pdo->prepare($sql);
    $halfway->bindColumn("CAT_NO", $CNO);
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
				
				<div class="catpic">
					<a href="../html/catContent.php?halfno=<?php echo $halfno ?>&catNo=<?php echo $CNO ?>"><img src="<?php echo $COVER ?>" alt="cat"></a>
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


		<div class="map">
			<h2>我們的位置</h2>
			<div id="myMap"></div>
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
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						styles: [
                            {
                                "featureType": "water",
                                "stylers": [
                                    {
                                        "color": "#19a0d8"
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "labels.text.stroke",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "weight": 6
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "labels.text.fill",
                                "stylers": [
                                    {
                                        "color": "#e85113"
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.stroke",
                                "stylers": [
                                    {
                                        "color": "#efe9e4"
                                    },
                                    {
                                        "lightness": -40
                                    }
                                ]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "geometry.stroke",
                                "stylers": [
                                    {
                                        "color": "#efe9e4"
                                    },
                                    {
                                        "lightness": -20
                                    }
                                ]
                            },
                            {
                                "featureType": "road",
                                "elementType": "labels.text.stroke",
                                "stylers": [
                                    {
                                        "lightness": 100
                                    }
                                ]
                            },
                            {
                                "featureType": "road",
                                "elementType": "labels.text.fill",
                                "stylers": [
                                    {
                                        "lightness": -100
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "labels.icon"
                            },
                            {
                                "featureType": "landscape",
                                "elementType": "labels",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "landscape",
                                "stylers": [
                                    {
                                        "lightness": 20
                                    },
                                    {
                                        "color": "#efe9e4"
                                    }
                                ]
                            },
                            {
                                "featureType": "landscape.man_made",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "water",
                                "elementType": "labels.text.stroke",
                                "stylers": [
                                    {
                                        "lightness": 100
                                    }
                                ]
                            },
                            {
                                "featureType": "water",
                                "elementType": "labels.text.fill",
                                "stylers": [
                                    {
                                        "lightness": -100
                                    }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "labels.text.fill",
                                "stylers": [
                                    {
                                        "hue": "#11ff00"
                                    }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "labels.text.stroke",
                                "stylers": [
                                    {
                                        "lightness": 100
                                    }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "labels.icon",
                                "stylers": [
                                    {
                                        "hue": "#4cff00"
                                    },
                                    {
                                        "saturation": 58
                                    }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "visibility": "on"
                                    },
                                    {
                                        "color": "#f0e4d3"
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.fill",
                                "stylers": [
                                    {
                                        "color": "#efe9e4"
                                    },
                                    {
                                        "lightness": -25
                                    }
                                ]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "geometry.fill",
                                "stylers": [
                                    {
                                        "color": "#efe9e4"
                                    },
                                    {
                                        "lightness": -10
                                    }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "labels",
                                "stylers": [
                                    {
                                        "visibility": "simplified"
                                    }
                                ]
                            }
                        ]
					});

					let marker = new google.maps.Marker({
						position: params,
						map: myMap,
						icon: '../images/halfwayPic/cat_loc.png',
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