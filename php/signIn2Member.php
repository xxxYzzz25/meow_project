<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>會員登入</title>
</head>

<body>
<?php
$memId = $_POST["memId"];
$memPsw = $_POST["memPsw"];
try {
	require_once("connectBD103G2.php");
		
		//準備好指令
		$sql = "select * from member where mem_Id=? and mem_Psw=?";
		//執行該指令
		$statement = $pdo->prepare($sql);
		$statement->bindValue(1, $memId);
		$statement->bindValue(2, MD5($memPsw));
		$statement->execute();
		//檢查是否有此帳密
		if ($statement->rowCount() === 0) { //帳密錯誤
			echo "<script>alert('帳密錯誤 , 請重新登入')</script>";
		} else {//帳密存在
			$memRow = $statement->fetch(PDO::FETCH_ASSOC);//取回資料錄
			if ($memRow["MEM_BAN"]) {
				echo "<script>alert('此帳號已被停權, 若有疑問請來信客服。')</script>";
			} else {
				$_SESSION["MEM_NO"] = $memRow["MEM_NO"];
				$memNo = $memRow["MEM_NO"];
				$memName = $memRow["MEM_NAME"];
				//判斷分數
				isset($_REQUEST["score"])?$_REQUEST["score"]=$_REQUEST["score"]:$_REQUEST["score"]=null;

				if($_REQUEST["score"] != null){

					$score = $_REQUEST["score"];
					$sql = "update member set mem_score = $score where mem_no = $memNo";
					//執行該指令
					$pdo->query($sql);
					echo "<script>
						localStorage.setItem('memNo',$memNo);
						alert('登入成功\\n\\n$memName, 您好')
						window.location.href = '../html/catSearch.php';
						</script>";
			
				}
				isset($_REQUEST["discount"])?$_REQUEST["discount"]=$_REQUEST["discount"]:$_REQUEST["discount"]=null;
				if($_REQUEST["discount"] != null){

					$discount = $_REQUEST["discount"];
					$sql = "update member set mem_discount = $discount where mem_no = $memNo";
					//執行該指令
					$pdo->query($sql);
					echo "<script>
						localStorage.setItem('memNo',$memNo);
						window.location.href = '../html/Cat_ShoppingStore.php';
						alert('登入成功\\n\\n$memName, 您好')
						location.href = '../html/Cat_ShoppingStore.php';
						</script>";

				}else{
					echo "<script>
						window.addEventListener('load',()=>{
							localStorage.setItem('memNo',$memNo);
						});
						alert('登入成功\\n\\n$memName, 您好')
						
					</script>";
				}
				
			}
		}
		echo"<script>
		history.back()
	</script>";
} catch (PDOException $e) {
	echo "行號: ", $e->getLine(), "<br>";
	echo "訊息: ", $e->getMessage(), "<br>";
}
?>
</body>
</html>