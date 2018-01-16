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
	$sql="update cat set ADOPT_STATUS=:status
			  where CAT_NO=:no";
	$products = $pdo->prepare( $sql );
	$products->bindValue(":status" , $_REQUEST["status"]);
	$products->execute();
	echo "編輯成功<br>";
} catch (Exception $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";	
}
?>
</body>
</html>