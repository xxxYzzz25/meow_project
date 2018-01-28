<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>管理者登入</title>
</head>

<body>
<?php
$empId = $_POST["empId"];
$empPsw = $_POST["empPsw"];
try {
	require_once("connectBD103G2.php");
	//準備好指令
	$sql = "select * from emp where emp_Id=? and emp_Psw=?";
	//執行該指令
	$statement = $pdo->prepare($sql);
	$statement->bindValue(1, $empId);
	$statement->bindValue(2, MD5($empPsw));
	$statement->execute();
	//檢查是否有此帳密
	if ($statement->rowCount() === 0) { //帳密錯誤
		echo "<script>alert('帳密錯誤 , 請重新登入')</script>";
		header('location: ../html/backMemManage.php');
	} else {//帳密存在
		header('location: ../html/backMemManage.php');
	}
} catch (PDOException $e) {
	echo "行號: ", $e->getLine(), "<br>";
	echo "訊息: ", $e->getMessage(), "<br>";
}
?>
</body>
</html>