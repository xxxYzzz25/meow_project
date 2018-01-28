<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
try {
    require_once "connectBD103G2.php";
    $sql = "update product set PRODUCT_STATUS=:down
			where PRODUCT_NO=:productno";
    $products = $pdo->prepare($sql);
    $products->bindValue(":productno", $_REQUEST["productno"]);
    $products->bindValue(":down", $_REQUEST["down"]);
    $products->execute();
    echo "  <script>
                alert('修改成功');
                window.location.href = '../html/backProduct.php';
            </script> ";
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>
</body>
</html>