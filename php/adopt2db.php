<?php
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
            color: #44c;
        }
    </style>
</head>
<body>
<?php
try {
    require_once("connectBD103G2.php");
    $sql = "select MEM_SCORE from member where mem_no = $memNo";
    $statement = $pdo->query($sql);
    $mem = $statement->fetchObject();
    $score = $mem->MEM_SCORE;
    if($score >= 5){
        try {
            $sql = "update CAT SET ADOPT_STATUS = 1 WHERE CAT_NO = $catNo";
            $statement = $pdo->query($sql);
            echo "<center>已送出領養請求, 請等候中途之家通知</center>";
            echo "<center><a href='../html/catSearch.php'>請按此回到尋喵頁面</a></center>";
        } catch (Exception $e) {
            echo "錯誤原因 : ", $e->getMessage(), "<br>";
            echo "錯誤行號 : ", $e->getLine(), "<br>";
            echo "異動失敗";
        }
    }else{
        echo "<center>您的答對題數為：$score 題</center>";
        echo "<center>您的養貓知識還不足夠, <a href='../index.php'>點我去首頁學習！</a></center>";
    }
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}

?>
</body>
</html>