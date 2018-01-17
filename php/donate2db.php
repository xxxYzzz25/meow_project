<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>donate2db</title>
</head>
<body>
	<?php
        $catNo = $_POST['catNo'];
        $donateName = $_POST['donateName'];
        $donatePrice = $_POST['donatePrice'];
		try {
			require_once("connectBD103G2.php");
			$sql = "insert into donate set CAT_NO = ?, DONATE_NAME = ?, DONATE_PRICE = ?, donate_date = ?";
			$statement = $pdo -> prepare( $sql );
    	    $statement -> bindValue(1, $catNo);
    	    $statement -> bindValue(2, $donateName);
    	    $statement -> bindValue(3, $donatePrice);
    	    $statement -> bindValue(4, date("Y-m-d"));
    	    $statement -> execute();
    	    echo "異動成功";
		} catch (Exception $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
    	    echo "異動失敗";
		}
	?>
	<?	// 跳轉到：
		header("location:../html/catContent.php?catNo=$catNo");
	?>
</body>
</html>