<?php
 ob_start();
 session_start();
 isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
 isset($_SESSION['MEM_NO']) ? $_SESSION['MEM_NO'] = $_SESSION['MEM_NO'] : $_SESSION['MEM_NO'] = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>商城</title>
	
    <link rel="icon" type="image/png" href="../images/logo_icon.png" />
	<link rel="stylesheet" href="../css/animate.css">

	<link rel="stylesheet" href="../css/fontawesome.min.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<script src="https://use.fontawesome.com/533f4a82f0.js"></script>
	<script src="../js/like.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/Cat_ShoppingStore.css">
	<script src="../js/wow.js"></script>
	<script src="../js/hb.js"></script>
	<script src="../js/shoppingStore.js"></script>

	<script>
		$(document).ready(function () {
			new WOW().init();
		});
	</script>

</head>

<body>
<div class="likeBoxBack" id="likeBoxBack"></div>
    <div class="likeBox" id="likeBox"></div>
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
			<a href="../homepage.php">
				<h1>
					<img src="../images/logo_white.png" alt="尋喵啟事" title="回首頁">
				</h1>
			</a>
		</div>
		<nav>
			<ul>
				<li>
					<a href="./catSearch.php">尋喵</a>
				</li>
				<li>
					<a href="./halfway_house_search.php">中途之家</a>
				</li>
				<li>
					<a href="./Cat_ShoppingStore.php" title="前往商城">商城</a>
				</li>
				<li>
					<a href="./forum.php">討論區</a>
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
	</header>

	<div class="wrap">
		<div class="wrapCenter">
			
			<h2 class="title">
				商城
			</h2>

			<div class="menu">

				<button value="0" class="menuTitle" id="pd_all">全部商品</button>

				<button value="1" class="menuTitle" id="pd_food">喵喵肚子餓</button>

				<button value="2" class="menuTitle" id="pd_home">喵喵待在家</button>

				<button value="3" class="menuTitle" id="pd_grass">精選喵草</button>

				<button value="4" class="menuTitle" id="pd_play">喵喵愛玩耍</button>

			</div>

			

			<div class="banner  wow zoomIn">
				<img src="../img/shoppingBanner.jpg">
			</div>


			<div class="search">
				<input type="text" class="searchName" placeholder="尋找喵喵商品">
				<button class="searchBtn">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</div>
			
			<div class="br">
				<br>
				<br>
			</div>

		<div id = "pdContent">
			<div class="allProduct">
				
				<div class="type1">
					
					<div class="typeName wow zoomIn">喵喵肚子餓</div>
					
					<div class="typeBanner typeBanner1 wow zoomIn">
						<a id="btnHungry" data-ohclass="1">前往
							<b>喵喵肚子餓</b> ｜ 6 項商品</a>
					</div>

				</div>

				
						<?php
						try {
							require_once("../php/connectBD103G2.php");
							$sql = "select * from PRODUCT where PRODUCT_PART = '1' and PRODUCT_STATUS = '0' limit 4";
							$PRODUCT = $pdo->prepare($sql);
							$PRODUCT->execute();
							$PRODUCT = $PRODUCT->fetchAll(PDO::FETCH_ASSOC);
						
							foreach( $PRODUCT as $i=>$PRODUCT){
								$PRODUCT_NAME = $PRODUCT["PRODUCT_NAME"];
								$PRODUCT_NAME = explode(" ",$PRODUCT_NAME);
								$PRODUCT_EN = $PRODUCT_NAME[0];
								$PRODUCT_CH = $PRODUCT_NAME[1];
						?>
						
							<div class="product">
								<div class="pic  wow zoomIn">
									<a href="Cat_ShoppingStore_product.php?PRODUCT_NO=<?php echo $PRODUCT["PRODUCT_NO"] ?>">
										<?php echo '<img src="',$PRODUCT["PRODUCT_COVER"],'" alt="',$PRODUCT["PRODUCT_NAME"],'">' ?>
									</a>
								 </div>
								<div class="text">
									<?php echo $PRODUCT_EN  ,'<br>', $PRODUCT_CH?>
								</div>
						
								<div class="cost">
									<?php echo '$',$PRODUCT["PRODUCT_PRICE"] ?>
									<!-- $1000 -->
								</div>
						
								
						
							</div>
						
						<?php  
							}
						
						} catch (PDOException $e) {
						 echo "錯誤原因 : " , $e->getMessage() , "<br>";
						 echo "錯誤行號 : " , $e->getLine() , "<br>";
						}
						?>
						
						<!-- 2 喵喵待在家 -->
							<div class="allProduct">
								
								<div class="type1">
									
									<div class="typeName wow zoomIn">喵喵待在家</div>
									
									<div class="typeBanner typeBanner2 wow zoomIn">
										<a id="btnHome" data-ohclass="2">前往
											<b>喵喵待在家</b> ｜ 6 項商品</a>
									</div>
						
								</div>
						
						<?php
						try {
							require_once("../php/connectBD103G2.php");
							$sql = "select * from PRODUCT where PRODUCT_PART = '2' and PRODUCT_STATUS = '0' limit 4 ";
							$PRODUCT = $pdo->prepare($sql);
							$PRODUCT->execute();
							$PRODUCT = $PRODUCT->fetchAll(PDO::FETCH_ASSOC);
						
							foreach( $PRODUCT as $i=>$PRODUCT){
								$PRODUCT_NAME = $PRODUCT["PRODUCT_NAME"];
								$PRODUCT_NAME = explode(" ",$PRODUCT_NAME);
								$PRODUCT_EN = $PRODUCT_NAME[0];
								$PRODUCT_CH = $PRODUCT_NAME[1];
						?>
								
								<div class="product">
									<div class="pic  wow zoomIn">
										<a href="Cat_ShoppingStore_product.php?PRODUCT_NO=<?php echo $PRODUCT["PRODUCT_NO"] ?>">
											<?php echo '<img src="',$PRODUCT["PRODUCT_COVER"],'" alt="',$PRODUCT["PRODUCT_NAME"],'">' ?>
										</a>
									</div>

									<div class="text">
										<?php echo $PRODUCT_EN  ,'<br>', $PRODUCT_CH?>
									</div>
						
									<div class="cost">
										<?php echo '$',$PRODUCT["PRODUCT_PRICE"] ?>
										<!-- $1000 -->
									</div>
						
									
						
								</div>
						
						<?php  
							}
						
						} catch (PDOException $e) {
						 echo "錯誤原因 : " , $e->getMessage() , "<br>";
						 echo "錯誤行號 : " , $e->getLine() , "<br>";
						}
						?>
						
						<!-- 3 精選喵草 -->
						
						<div class="allProduct">
								
								<div class="type1">
									
									<div class="typeName wow zoomIn">精選喵草</div>
									
									<div class="typeBanner typeBanner3 wow zoomIn">
										<a id="btnGrass" data-ohclass="3">前往
											<b>精選喵草</b> ｜ 6 項商品</a>
									</div>
						
								</div>
						
						<?php
						try {
							require_once("../php/connectBD103G2.php");
							$sql = "select * from PRODUCT where PRODUCT_PART = '3' and PRODUCT_STATUS = '0' limit 4 ";
							$PRODUCT = $pdo->prepare($sql);
							$PRODUCT->execute();
							$PRODUCT = $PRODUCT->fetchAll(PDO::FETCH_ASSOC);
						
							foreach( $PRODUCT as $i=>$PRODUCT){
								$PRODUCT_NAME = $PRODUCT["PRODUCT_NAME"];
								$PRODUCT_NAME = explode(" ",$PRODUCT_NAME);
								$PRODUCT_EN = $PRODUCT_NAME[0];
								$PRODUCT_CH = $PRODUCT_NAME[1];
						?>
								
								<div class="product">
									<div class="pic  wow zoomIn">
										<a href="Cat_ShoppingStore_product.php?PRODUCT_NO=<?php echo $PRODUCT["PRODUCT_NO"] ?>">
											<?php echo '<img src="',$PRODUCT["PRODUCT_COVER"],'" alt="',$PRODUCT["PRODUCT_NAME"],'">' ?>
										</a>
									</div>
									<div class="text">
										<?php echo $PRODUCT_EN  ,'<br>', $PRODUCT_CH?>
									</div>
							
									<div class="cost">
										<?php echo '$',$PRODUCT["PRODUCT_PRICE"] ?>
										<!-- $1000 -->
									</div>
							
									
						
								</div>
						
						<?php  
							}
						
						} catch (PDOException $e) {
						 echo "錯誤原因 : " , $e->getMessage() , "<br>";
						 echo "錯誤行號 : " , $e->getLine() , "<br>";
						}
						?>
						
						<!-- 4 喵喵愛玩耍 -->
						
						<div class="allProduct">
								
								<div class="type1">
									
									<div class="typeName wow zoomIn">喵喵愛玩耍</div>
									
									<div class="typeBanner typeBanner4 wow zoomIn">
										<a id="btnPlay" data-ohclass="4">前往
											<b>喵喵愛玩耍</b> ｜ 6 項商品</a>
									</div>
						
								</div>
						
						<?php
						try {
							require_once("../php/connectBD103G2.php");
							$sql = "select * from PRODUCT where PRODUCT_PART = '4' and PRODUCT_STATUS = '0' limit 4 ";
							$PRODUCT = $pdo->prepare($sql);
							$PRODUCT->execute();
							$PRODUCT = $PRODUCT->fetchAll(PDO::FETCH_ASSOC);
						
							foreach( $PRODUCT as $i=>$PRODUCT){
								$PRODUCT_NAME = $PRODUCT["PRODUCT_NAME"];
								$PRODUCT_NAME = explode(" ",$PRODUCT_NAME);
								$PRODUCT_EN = $PRODUCT_NAME[0];
								$PRODUCT_CH = $PRODUCT_NAME[1];
						?>
								
								<div class="product">
									<div class="pic  wow zoomIn">
										<a href="Cat_ShoppingStore_product.php?PRODUCT_NO=<?php echo $PRODUCT["PRODUCT_NO"] ?>">
											<?php echo '<img src="',$PRODUCT["PRODUCT_COVER"],'" alt="',$PRODUCT["PRODUCT_NAME"],'">' ?>
										</a>
									</div>
									<div class="text">
										<?php echo $PRODUCT_EN  ,'<br>', $PRODUCT_CH?>	
									</div>
						
									<div class="cost">
										<?php echo '$',$PRODUCT["PRODUCT_PRICE"] ?>
										<!-- $1000 -->
									</div>
							
									
						
								</div>
						
						<?php  
							}
						
						} catch (PDOException $e) {
						 echo "錯誤原因 : " , $e->getMessage() , "<br>";
						 echo "錯誤行號 : " , $e->getLine() , "<br>";
						}
						?>
						
						
				</div>
					</div>
	</div>

			</div>
		</div>
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
	
					
	

	<script>

	$(document).ready(function(){

		$('#pd_food').click(function(){
			$('#pd_food').css({"color":"#fff","background-color":"#EAAF88","border":"3px solid #EAAF88"});
			$('#pd_home').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('#pd_grass').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('#pd_play').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('#pd_all').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('.banner').html('<img src="../img/shopping_foodBanner.jpg">');
		});

		$('#pd_home').click(function(){
			$('#pd_food').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('#pd_home').css({"color":"#fff","background-color":"#EAAF88","border":"3px solid #EAAF88"});
			$('#pd_grass').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('#pd_play').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('#pd_all').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('.banner').html('<img src="../img/shopping_homeBanner.jpg">');
		});

		$('#pd_grass').click(function(){
			$('#pd_food').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('#pd_home').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('#pd_grass').css({"color":"#fff","background-color":"#EAAF88","border":"3px solid #EAAF88"});
			$('#pd_play').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('#pd_all').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('.banner').html('<img src="../img/shopping_grassBanner.jpg">');		
		});

		$('#pd_play').click(function(){
			$('#pd_food').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('#pd_home').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('#pd_grass').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('#pd_play').css({"color":"#fff","background-color":"#EAAF88","border":"3px solid #EAAF88"});
			$('#pd_all').css({"color":"#333","background-color":"#fff","border":"3px solid #fff"});
			$('.banner').html('<img src="../img/shopping_playBanner.jpg">');	
		});

		
		var type = document.querySelectorAll(".menuTitle");
		
		let pd_play = document.getElementById("pd_play");
		let pd_grass = document.getElementById("pd_grass");
		let pd_home = document.getElementById("pd_home");
		let pd_food = document.getElementById("pd_food");
		
		for( var i=0 ; i<type.length ; i++ ){
			type[i].addEventListener("click" , getProducts , false);
			type[0].addEventListener("click" , function(){
				location.reload();
			});

		}
		
		function getProducts(e){
			var pdType = e.target.value;
			var url = "../php/Cat_ShoppingStore_food.php?pdType=" + pdType;
			ajax(url);
		}
		
		function qqq(e){
			e.preventDefault();
			let ca = this.dataset.ohclass;
			switch (ca) {
				case '1':
					pd_food.click();
					break;
				case '2':
					pd_home.click();
					break;
				case '3':
					pd_grass.click();
					break;
				case '4':
					pd_play.click();
					break;
			}
			$(window).scrollTop(0);
		}

		function ajax(dataInfo){
			var xhr = new XMLHttpRequest();
			xhr.open("Get",dataInfo, true);
			xhr.onload = function(){
			
				if( xhr.status == 200 ){
					document.getElementById("pdContent").innerHTML = this.responseText;
				}else{
					alert(xhr.status);
				}
		}
		xhr.send( null );
	}
		let btnHome = document.getElementById("btnHome");
		let btnHungry = document.getElementById("btnHungry");
		let btnGrass = document.getElementById("btnGrass");
		let btnPlay = document.getElementById("btnPlay");
		let pd_all = document.getElementById("pd_all");
		pd_all.addEventListener("click" ,()=>{
			window.location.href = 'Cat_ShoppingStore.php';
		});
		btnHome.addEventListener("click" , qqq);
		btnHungry.addEventListener("click" , qqq);
		btnGrass.addEventListener("click" , qqq);
		btnPlay.addEventListener("click" , qqq);
			
	});		

		
		


		</script>  
<?php 
	if(isset($_REQUEST["pd_class"])){
		$pd_class = $_REQUEST["pd_class"];
		echo "<script>
				$(document).ready(function(){
					document.getElementById('$pd_class').click();
				});
			</script>";
	}
?>
	<script src="../js/signIn.js"></script>
	<script src="../js/likeList.js"></script>
	
</body>

</html>