<?
ob_start();
session_start();
$memNo = $_SESSION['MEM_NO'];
$catNo = $_GET['CATNO'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>領養要求送出</title>
    <style>
        a {
            border-bottom: 1px solid #00f;
            color: #44c;
        }
    </style>
</head>
<body>
<?php
try {
	require_once("connectBD103G2.php");
	$sql = "insert into adoption set CAT_NO = ?, MEM_NO = ?, ADOPT_DATE = ?";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(1, $catNo);
	$statement->bindValue(2, $memNo);
	$statement->bindValue(3, date("Y-m-d"));
	$sql = "update CAT SET ADOPT_STATUS = 1 WHERE CAT_NO = $catNo";
	$statement = $pdo->query($sql);
	echo "<center>已送出領養請求, 請等候中途之家通知</center>";
	echo "<center><a href='../html/catSearch.php'>請按此回到尋喵頁面</a>, 或等候五秒, 我們將為您轉至尋喵頁面</center>";
} catch (Exception $e) {
	echo "錯誤原因 : ", $e->getMessage(), "<br>";
	echo "錯誤行號 : ", $e->getLine(), "<br>";
	echo "異動失敗";
}
?>
</body>
</html>