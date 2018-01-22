

<?php
try {
	require_once("../php/connectBD103G2.php");
	$sql = "select * from PRODUCT where PRODUCT_PART = :TYPE";
	$pdType = $_REQUEST["pdType"];
	$PRODUCT = $pdo->prepare($sql);
	$PRODUCT->bindValue(":TYPE",$pdType);
	$PRODUCT->execute();
	$PRODUCT = $PRODUCT->fetchAll(PDO::FETCH_ASSOC);
	$result = "";
	foreach( $PRODUCT as $i=>$PRODUCT){

		$PRODUCT_NO = $PRODUCT['PRODUCT_NO'];
		$PRODUCT_COVER = $PRODUCT['PRODUCT_COVER'];
		$PRODUCT_NAME = $PRODUCT['PRODUCT_NAME'];
		$PRODUCT_PRICE = $PRODUCT['PRODUCT_PRICE'];
		$PRODUCT_NAME = explode(" ",$PRODUCT_NAME);
		$PRODUCT_EN = $PRODUCT_NAME[0];
		$PRODUCT_CH = $PRODUCT_NAME[1];

	$result.="<div class='product'>
		<a href='Cat_ShoppingStore_product.php?PRODUCT_NO=$PRODUCT_NO'>
			<div class='pic  wow zoomIn'>
				<img src='$PRODUCT_COVER' alt='$PRODUCT_NAME'>
			</div>
		</a>

		<div class='text'>
			$PRODUCT_EN <br>
			$PRODUCT_CH
		</div>

		<div class='cost'>
			$$PRODUCT_PRICE
		</div>

		<span id='pd$PRODUCT_NO class='addButton'>
			加入購物車
			<input type='hidden' value='$PRODUCT_NAME|$PRODUCT_COVER|$PRODUCT_PRICE|1'>
		</span>
	</div>";


	}
	echo $result;
} catch (PDOException $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";
}
					