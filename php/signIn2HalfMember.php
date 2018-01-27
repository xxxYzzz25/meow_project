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
$halfId = $_POST["memId"];
$halfPsw = $_POST["memPsw"];
try {
	require_once("connectBD103G2.php");

	//準備好指令
	$sql = "select * from halfway_member where half_Id=? and half_Psw=?";
	//執行該指令
	$statement = $pdo->prepare($sql);
	$statement->bindValue(1, $halfId);
	$statement->bindValue(2, MD5($halfPsw));
	$statement->execute();
	//檢查是否有此帳密
	if ($statement->rowCount() === 0) { //帳密錯誤
		echo "<script>alert('帳密錯誤 , 請重新登入')</script>";
	} else {//帳密存在
		$halfRow = $statement->fetch(PDO::FETCH_ASSOC);//取回資料錄
		if ($halfRow["HALF_BAN"]) {
			echo "<script>alert('此帳號已被停權, 若有疑問請來信客服。')</script>";
		}else if ( $halfRow["HALF_AUDIT_STATUS"] != 1 ) {
			echo "<script>alert('此帳號尚未審核, 請稍候, 我們將盡快為您審核。')</script>";
        }else {
			$halfNo = $halfRow["HALF_NO"];
			$halfName = $halfRow["HALF_NAME"];
			isset($_REQUEST["discount"])?$_REQUEST["discount"]=$_REQUEST["discount"]:$_REQUEST["discount"]=null;
			if($_REQUEST["discount"] != null ){
				$discount = $_REQUEST["discount"];
				$sql = "update halfway_member set half_discount = $discount where half_no = $halfNo";
				//執行該指令
				$pdo->query($sql);
				echo "<script>
				window.addEventListener('load',()=>{
					localStorage.setItem('halfNo',$halfNo);
				});
				alert('登入成功\\n\\n$halfName, 您好')
				location.href = '../html/Cat_ShoppingStore.php';
				</script>";
			}else{
				echo "<script>
				window.addEventListener('load',()=>{
					localStorage.setItem('halfNo',$halfNo);
				});
				alert('登入成功\\n\\n$halfName, 您好')
				</script>";
			}
				
			$_SESSION["HALF_NO"] = $halfRow["HALF_NO"];
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