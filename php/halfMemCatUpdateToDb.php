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
	$sql="update cat set CAT_NAME=:name, 
                       CAT_DATE=:date, 
                       CAT_SEX=:sex, 
                       CAT_NARRATIVE=:narrative, 
                       CAT_LOCATION=:location, 
                       CAT_VACCINE=:vaccine, 
                       CAT_LIGATION=:ligation, 
                       CAT_INDIVIDUALITY=:individuality, 
                       CAT_FIT=:fit, 
                       CAT_ADVANTAGE=:advantage, 
                       CAT_DISADVANTAGE=:disadvantage
			  where HALF_NO=:no";
	$products = $pdo->prepare( $sql );
	$products->bindValue(":name" , $_REQUEST["name"]);
	$products->bindValue(":date" , $_REQUEST["date"]);
	$products->bindValue(":sex" , $_REQUEST["sex"]);
	$products->bindValue(":narrative" , $_REQUEST["narrative"]);
	$products->bindValue(":location" , $_REQUEST["location"]);
	$products->bindValue(":vaccine" , $_REQUEST["vaccine"]);
	$products->bindValue(":ligation" , $_REQUEST["ligation"]);
	$products->bindValue(":individuality" , $_REQUEST["individuality"]);
	$products->bindValue(":fit" , $_REQUEST["fit"]);
	$products->bindValue(":advantage" , $_REQUEST["advantage"]);
	$products->bindValue(":disadvantage" , $_REQUEST["disadvantage"]);
	$products->execute();
	echo "編輯成功<br>";
} catch (Exception $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";	
}
?>
</body>
</html>