<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<?php
	ob_start();
	session_start();
	try {
		require_once("connectBD103G2.php");

		$who = isset($_SESSION["HALF_NO"]) ? "HALF_NO" : "MEM_NO";
		$whoNo = isset($_SESSION["HALF_NO"]) ? $_SESSION["HALF_NO"] : $_SESSION["MEM_NO"];
		$narrative = isset($_REQUEST["narrative"]) ? $_REQUEST["narrative"] : '';
		if(isset($_REQUEST["ARTICLE_NO"])){//文章檢舉
			
			$ARTICLE_NO = $_REQUEST["ARTICLE_NO"];
			$sql = "insert into ARTICLE_REPORT ($who,ARTICLE_NO,AUDIT_STATUS,ARTICLE_REPORT_NARRATIVE,ARTICLE_REPORT_TIME) 
					values(:whoNo,:ARTICLE_NO,0,:NARRATIVE,now())";
			$data = $pdo -> prepare($sql);
			$data -> bindParam(":whoNo",$whoNo);
			$data -> bindParam(":ARTICLE_NO",$ARTICLE_NO);
			$data -> bindParam(":NARRATIVE",$narrative);
			$data -> execute();

		}else{//留言檢舉
			$MESSAGE_NO = $_REQUEST["MESSAGE_NO"];
			$sql = "insert into MESSAGE_REPORT ($who,MESSAGE_NO,AUDIT_STATUS,MESSAGE_REPORT_NARRATIVE,MESSAGE_REPORT_TIME) 
					values(:whoNo,:MESSAGE_NO,0,:NARRATIVE,now())";
			$data = $pdo -> prepare($sql);
			$data -> bindParam(":whoNo",$whoNo);
			$data -> bindParam(":MESSAGE_NO",$MESSAGE_NO);
			$data -> bindParam(":NARRATIVE",$narrative);
			$data -> execute();
		}
		echo "<script>
				alert('謝謝您的檢舉，我們會盡快幫您審核');
				history.back();
			</script>";
	} catch (Exception $e) {
		echo "錯誤行號 : ", $e->getLine(), "<br>";
		echo "錯誤訊息 : ", $e->getMessage(), "<br>";	
	}

?>
</body>
</html>