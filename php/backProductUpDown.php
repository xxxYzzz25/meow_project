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