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
            $newdate = date("Y-m-d");
            $sql = "insert into adoption SET cat_no = $catNo, mem_no = $memNo, adopt_date = ?";
            $statement = $pdo->prepare($sql);
            $statement -> bindValue(1, date("Y-m-d"));
            $statement->execute();
            echo "<script>alert('已送出領養請求, 請等候中途之家通知')</script>";
            echo "<script>history.back()</script>";
        } catch (Exception $e) {
            echo "錯誤原因 : ", $e->getMessage(), "<br>";
            echo "錯誤行號 : ", $e->getLine(), "<br>";
            echo "異動失敗";
        }
    }else{
        echo "<script>alert('您的答對題數為：$score 題\\n您的養貓知識還不足夠, 前往首頁學習！')</script>";
        echo "<script>document.location.href='../index.php#page2'</script>";
    }
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}

?>
</body>
</html>