<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="../css/animate.css">

	<link rel="stylesheet" href="../css/fontawesome.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<script src="https://use.fontawesome.com/533f4a82f0.js"></script>
	<script src="../js/like.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/Cat_ShoppingStore.css">
	<script src="../js/wow.js"></script>

	<script src="../js/shoppingStore.js"></script>

	<script>
		$(document).ready(function () {
			new WOW().init();
		});
	</script>

</head>

<body>

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
					<a href="./catSearch.html">尋喵</a>
				</li>
				<li>
					<a href="./halfway_house_search.php">中途之家</a>
				</li>
				<li>
					<a href="./Cat_ShoppingStore.php" title="前往商城">商城</a>
				</li>
				<li>
					<a href="./forum.html">討論區</a>
				</li>
				<li>
					<a href="./member.html">會員專區</a>
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

			<form>
				<select name="price" class="select">
					<option value="priceDown">價格由高到低</option>
					<option value="priceUp">價格由低到高</option>
				</select>
			</form>

			<div class="search">
				<input type="text" class="searchName" placeholder="尋找喵喵商品">
				<button class="searchBtn">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</div>

			<br>
			<br>


		<div id = "pdContent">
			<div class="allProduct">
				
				<div class="type1">
					
					<div class="typeName wow zoomIn">喵喵肚子餓</div>
					
					<div class="typeBanner typeBanner1 wow zoomIn">
						<a href="../php/Cat_ShoppingStore_food.php">前往
							<b>喵喵肚子餓</b> ｜ 30 項商品</a>
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
						
								<span id="pd<?php echo $PRODUCT["PRODUCT_NO"] ?>" class="addButton">
									加入購物車
									<input type="hidden" value="<?php echo $PRODUCT["PRODUCT_NAME"],'|',$PRODUCT["PRODUCT_COVER"],'|',$PRODUCT["PRODUCT_PRICE"],'|1' ?>">
								</span>
						
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
										<a href="#">前往
											<b>喵喵待在家</b> ｜ 46 項商品</a>
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
						
								<span id="pd<?php echo $PRODUCT["PRODUCT_NO"] ?>" class="addButton">
									加入購物車
									<input type="hidden" value="<?php echo $PRODUCT["PRODUCT_NAME"],'|',$PRODUCT["PRODUCT_COVER"],'|',$PRODUCT["PRODUCT_PRICE"],'|1' ?>">
								</span>
						
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
										<a href="#">前往
											<b>精選喵草</b> ｜ 46 項商品</a>
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
						
								<span id="pd<?php echo $PRODUCT["PRODUCT_NO"] ?>" class="addButton">
									加入購物車
									<input type="hidden" value="<?php echo $PRODUCT["PRODUCT_NAME"],'|',$PRODUCT["PRODUCT_COVER"],'|',$PRODUCT["PRODUCT_PRICE"],'|1' ?>">
								</span>
						
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
										<a href="#">前往
											<b>喵喵愛玩耍</b> ｜ 46 項商品</a>
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
						
								<span id="pd<?php echo $PRODUCT["PRODUCT_NO"] ?>" class="addButton">
									加入購物車
									<input type="hidden" value="<?php echo $PRODUCT["PRODUCT_NAME"],'|',$PRODUCT["PRODUCT_COVER"],'|',$PRODUCT["PRODUCT_PRICE"],'|1' ?>">
								</span>
						
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

	<!-- <script>
		window.onload = function(){
        

		}
	</script> -->

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

		

			
	});		

		var type = document.querySelectorAll(".menuTitle");  
		
		for( var i=0 ; i<type.length ; i++ ){
			type[i].addEventListener("click" , getProducts , false);
			type[0].addEventListener("click" , function(){
				location.reload();
			});

		}

		function getProducts(e){
			var pdType = e.target.value;
			var url = "../php/Cat_ShoppingStore_food.php?pdType=" + pdType;
			
			var xhr = new XMLHttpRequest();
			xhr.open("Get",url, true);
			xhr.onload = function(){
			
				if( xhr.status == 200 ){
					document.getElementById("pdContent").innerHTML = this.responseText;
				}else{
					alert(xhr.status);
				}
			
		}
		xhr.send( null );
	}



		</script>  
<?php 
	if($_REQUEST["pd_class"]){
		$pd_class = $_REQUEST["pd_class"];
		echo "<script>
				$(document).ready(function(){
					document.getElementById('$pd_class').click();
				});
			</script>";
	}
?>

</body>

</html>