<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
</head>
<body>
<?php
try {
	require_once("../php/connectBD103G2.php");
	$sql="update halfway_member set HALF_PSW=:psw, 
				                          HALF_HEAD=:head 
			  where HALF_NO=:no";
	$products = $pdo->prepare( $sql );
	$products->bindValue(":no" , $_REQUEST["no"]);
	$products->bindValue(":psw" , $_REQUEST["psw"]);
	$products->bindValue(":head" , $_REQUEST["head"]);
	$products->execute();
	echo "修改成功<br>";
} catch (Exception $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";	
}
?>
</body>
</html>