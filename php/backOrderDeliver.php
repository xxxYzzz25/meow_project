<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
try {
    require_once "connectBD103G2.php";
    $sql = "update orderlist set ORDER_STATUS=:deliver
			where ORDER_NO=:orderno";
    $products = $pdo->prepare($sql);
    $products->bindValue(":orderno", $_REQUEST["orderno"]);
    $products->bindValue(":deliver", $_REQUEST["deliver"]);
    $products->execute();
    echo "  <script>
                alert('出貨成功');
                window.location.href = '../html/backOrderlist.php';
            </script> ";
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>
</body>
</html>