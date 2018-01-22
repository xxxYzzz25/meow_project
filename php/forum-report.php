<?php
	
	try {
		require_once("connectBD103G2.php");

		$who = isset($_SESSION["HALF_NO"]) ? "MEM_NO" : "HALF_NO";
		$whoNo = isset($_SESSION["HALF_NO"]) ? $_SESSION["MEM_NO"] : $_SESSION["HALF_NO"];

		if(isset($_REQUEST["ARTICLE_NO"])){//文章檢舉
			
			$ARTICLE_NO = $_REQUEST["ARTICLE_NO"];
			$narrative = isset($_REQUEST["narrative"]) ? $_REQUEST["narrative"] : '';
			$sql = "insert into ARTICLE_REPORT ($who,AUDIT_STATUS,ARTICLE_REPORT_NARRATIVE,ARTICLE_REPORT_TIME) 
					values(:whoNo,0,:NARRATIVE,now())";
			$data = $pdo -> prepare($sql);
			$data -> bindParam(":whoNo",$whoNo);
			$data -> bindParam(":NARRATIVE",$narrative);
			$data -> execute();

		}else{//留言檢舉

			$who = is_null($_REQUEST["MEM_NO"]) ? $_REQUEST["HALF_NO"] : $_REQUEST["MEM_NO"];
			$sql = "insert into MESSAGE_REPORT () 
					values() ";

		}
		
		
	} catch (Exception $e) {
		echo "錯誤行號 : ", $e->getLine(), "<br>";
		echo "錯誤訊息 : ", $e->getMessage(), "<br>";	
	}

?>