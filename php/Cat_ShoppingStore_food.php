<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="../css/animate.css">

	<link rel="stylesheet" href="../css/fontawesome.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="../css/header.css">
	<script src="https://use.fontawesome.com/533f4a82f0.js"></script>
	<script src="../js/like.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/Cat_ShoppingStore_food.css">
	<script src="../js/wow.js"></script>

	<script src="../js/shoppingStore_food.js"></script>

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
					<img src="../img/logo_white.png" alt="尋喵啟事" title="回首頁">
				</h1>
			</a>
		</div>
		<nav>
			<ul>
				<li>
					<a href="./catSearch.html">尋喵</a>
				</li>
				<li>
					<a href="./halfway_house_search.html">中途之家</a>
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
				喵喵肚子餓
			</h2>

			<div class="menu">

				<a href="Cat_ShoppingStore.php" class="menuTitle">全部喵喵商品</a>

				<a href="#" class="menuNow menuTitle">喵喵肚子餓</a>
				<!-- <li><a href="#">喵飼料</a></li>
							<li><a href="#">喵零食</a></li>
							<li><a href="#">喵罐頭</a></li> -->

				<a href="#" class="menuTitle">喵喵待在家</a>
				<!-- 	<li><a href="#">喵毛處理</a></li>
							<li><a href="#">精選喵砂</a></li>
							<li><a href="#">喵喵想睡覺</a></li>-->

				<a href="#" class="menuTitle">精選喵草</a>

				<a href="#" class="menuTitle">喵喵愛玩耍</a>

			</div>

			<div class="banner  wow zoomIn">
				<img src="../img/shopping_foodBanner.jpg">
			</div>

			<form>
				<select name="YourLocation" class="select">
					<option value="high">價格由高到低</option>
					<option value="low">價格由低到高</option>
				</select>
			</form>

			<div class="search">
				<input type="text" placeholder="尋 找 喵 喵 商 品">
				<i class="fa fa-search" aria-hidden="true"></i>
			</div>

			<br>
			<br>

			<div id="pdFoodContent">

					<?php
					try {
						require_once("../php/connectBD103G2.php");
						$sql = "select * from PRODUCT where PRODUCT_PART = '1'";
						$PRODUCT = $pdo->prepare($sql);
						$PRODUCT->execute();
						$PRODUCT = $PRODUCT->fetchAll(PDO::FETCH_ASSOC);
					
						foreach( $PRODUCT as $i=>$PRODUCT){
					?>
					
						<div class="product">
							<a href="Cat_ShoppingStore_product.php?PRODUCT_NO=<?php echo $PRODUCT["PRODUCT_NO"] ?>">
								<div class="pic  wow zoomIn">
								<?php echo '<img src="',$PRODUCT["PRODUCT_COVER"],'" alt="',$PRODUCT["PRODUCT_NAME"],'">' ?>
								</div>
							</a>
					
							<div class="text">
								<?php echo $PRODUCT["PRODUCT_NAME"] ?>
								<!-- Friskies
								<br>雞肉罐頭 -->
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


</body>

</html>