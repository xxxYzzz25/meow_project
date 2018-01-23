<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		try {
			require_once("connectBD103G2.php");
			$sql = "update member set MEM_BAN = 0 where MEM_ID = ?";
			$statement = $pdo -> prepare( $sql );
    	    $statement -> bindValue(1, $_REQUEST['memId']);
    	    $statement -> execute();
    	    echo "異動成功";
		} catch (Exception $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
    	    echo "異動失敗";
		}
	?>
	<?php	// 跳轉到：
		header('location:../html/backMemManage.php');
	?>
</body>
</html>