<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$part = $_REQUEST['part'];
	$reportVal = $_REQUEST['reportVal'];
	$val = $_REQUEST['banVal'];
	$artNo = $_REQUEST['artNo'];
	$colName =  $part .= "_NO";
	$part = $_REQUEST['part'];
	
	if ( isset($_REQUEST['halfNo']) ) {
		try {
			require_once("connectBD103G2.php");
			$sql = "update halfway_member set half_BAN = $val where HALF_NO = ?";
			$statement = $pdo -> prepare( $sql );
    	    $statement -> bindValue(1, $_REQUEST['halfNo']);
    	    $statement -> execute();
			$sql = "update $part set audit_status = $reportVal where $colName = $artNo";
			$statement = $pdo -> query( $sql );
			$statement -> execute();
			header('location:../html/backReport.php');
		} catch (Exception $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
    	    echo "異動失敗";
		}
	}else{
		try {
			require_once("connectBD103G2.php");
			$sql = "update member set mem_BAN = $val where mem_NO = ?";
			$statement = $pdo -> prepare( $sql );
    	    $statement -> bindValue(1, $_REQUEST['memNo']);
			$statement -> execute();
			$sql = "update $part set audit_status = $reportVal where $colName = $artNo";
			$statement = $pdo -> query( $sql );
			$statement -> execute();
			header('location:../html/backReport.php');
		} catch (Exception $e) {
			echo "錯誤原因 : " , $e->getMessage() , "<br>";
			echo "錯誤行號 : " , $e->getLine() , "<br>";
    	    echo "異動失敗". $colName . $part;
		}
	}
		
	?>
</body>
</html>