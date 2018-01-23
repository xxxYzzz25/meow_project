<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		try {
            $audit = $_REQUEST['audit'];
            $id = $_REQUEST['halfNo'];
			require_once("connectBD103G2.php");
			$sql = "update halfway_member set half_audit_status = $audit where half_NO = $id";
			$statement = $pdo -> prepare( $sql );
    	    $statement -> execute();
    	    echo "異動成功";
		} catch (Exception $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
    	    echo "異動失敗";
		}
	?>
	<?php	// 跳轉到：
		header('location:../html/backHalfWay.php');
	?>
</body>
</html>