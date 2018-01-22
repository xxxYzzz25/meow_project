<?php 
				try {
					require_once("connectBD103G2.php");

					$ARTICLE_PART = $_POST["ARTICLE_PART"];
					$ARTICLE_TITLE = $_POST["ARTICLE_TITLE"];
					$ARTICLE_CONTENT = $_POST["ARTICLE_CONTENT"];
					$noName = isset($_POST["memNo"]) ? "MEM_NO" : "HALF_NO";
					$no = isset($_POST["memNo"]) ? $_POST["memNo"] : $_POST["halfNo"];

					$sql = "insert into article (ARTICLE_PART,ARTICLE_TITLE,ARTICLE_CONTENT,$noName,ARTICLE_TIME)
							values (:ARTICLE_PART,:ARTICLE_TITLE,:ARTICLE_CONTENT,:no,now())";
					$data = $pdo->prepare( $sql );
					$data -> bindParam(":ARTICLE_PART",$ARTICLE_PART);
					$data -> bindParam(":ARTICLE_TITLE",$ARTICLE_TITLE);
					$data -> bindParam(":ARTICLE_CONTENT",$ARTICLE_CONTENT);
					$data -> bindParam(":no",$no);
					$data->execute();

					$sql = "SELECT LAST_INSERT_ID() lastArticleNo from ARTICLE";
					$data = $pdo -> query($sql);
					$dataRow = $data -> fetchObject();
					$http = $dataRow -> lastArticleNo;
					header("Location:../html/forum-rp.php?ARTICLE_NO=$http"); 
				} catch (PDOException $e) {
  					echo "錯誤行號 : ", $e->getLine(), "<br>";
  					echo "錯誤訊息 : ", $e->getMessage(), "<br>";		
				  }
?>