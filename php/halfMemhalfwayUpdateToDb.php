<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
</head>
<body>
<?php
try {
	require_once("connectBD103G2.php");
	$sql="update halfway_member set HALF_NAME=:name, 
				                          HALF_ADDRESS=:address, 
				                          HALF_TEL=:tel, 
				                          HALF_OPEN=:open, 
				                          HALF_INTRO=:intro 
			  where HALF_NO=:no";
	$products = $pdo->prepare( $sql );
	$products->bindValue(":name" , $_REQUEST["name"]);
	$products->bindValue(":address" , $_REQUEST["address"]);
	$products->bindValue(":tel" , $_REQUEST["tel"]);
	$products->bindValue(":open" , $_REQUEST["open"]);
	$products->bindValue(":intro" , $_REQUEST["intro"]);
	$products->execute();
	echo "編輯成功<br>";
} catch (Exception $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";	
}
?>
</body>
</html>