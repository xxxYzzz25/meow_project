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
	$sql="update halfway_member set HALF_PSW=:psw, 
				                          HALF_HEAD=:head, 
				                          HALF_COVER=:pic 
			  where HALF_NO=:no";
	$products = $pdo->prepare( $sql );
	$products->bindValue(":no" , $_REQUEST["no"]);
	$products->bindValue(":psw" , $_REQUEST["hwmempsw"]);
	$products->bindValue(":head" , $_REQUEST["hwmemhead"]);
	$products->bindValue(":pic" , $_REQUEST["hwmempic"]);
	$products->execute();
	echo "修改成功<br>";
} catch (Exception $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";	
}
?>
</body>
</html>