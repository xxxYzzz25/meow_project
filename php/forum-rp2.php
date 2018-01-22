<?php 
				try {
					require_once("connectBD103G2.php");

					$MESSAGE_CONTENT = $_POST["MESSAGE_CONTENT"];
					$noName = isset($_POST["memNo"]) ? "MEM_NO" : "HALF_NO";
					$no = isset($_POST["memNo"]) ? $_POST["memNo"] : $_POST["halfNo"];
					$ARTICLE_NO = $_POST["ARTICLE_NO"];
					$sql = "insert into MESSAGE (ARTICLE_NO,MESSAGE_CONTENT,$noName,MESSAGE_TIME)
							values (:ARTICLE_NO,:MESSAGE_CONTENT,:no,now())";
					$data = $pdo->prepare( $sql );
					$data -> bindParam(":ARTICLE_NO",$ARTICLE_NO);
					$data -> bindParam(":MESSAGE_CONTENT",$MESSAGE_CONTENT);
					$data -> bindParam(":no",$no);
					$data->execute();
					$x=$_SERVER["HTTP_REFERER"];
					 header("Location:$x"); 
				} catch (PDOException $e) {
  					echo "錯誤行號 : ", $e->getLine(), "<br>";
  					echo "錯誤訊息 : ", $e->getMessage(), "<br>";		
				}
?>