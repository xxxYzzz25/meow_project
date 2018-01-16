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
	$sql="update member set MEM_PSW=:psw, 
				                  MEM_NAME=:name 
				                  MEM_TEL=:tel 
				                  MEM_ADDRESS=:address 
				                  MEM_PIC=:pic 
			  where MEM_NO=:no";
	$products = $pdo->prepare( $sql );
	$products->bindValue(":no" , $_REQUEST["no"]);
	$products->bindValue(":psw" , $_REQUEST["mempsw"]);
	$products->bindValue(":name" , $_REQUEST["memname"]);
	$products->bindValue(":tel" , $_REQUEST["memtel"]);
	$products->bindValue(":address" , $_REQUEST["memaddress"]);
	$products->bindValue(":pic" , $_REQUEST["mempic"]);
	$products->execute();
	echo "修改成功<br>";
} catch (Exception $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";	
}
?>
</body>
</html>