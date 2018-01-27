<?php
 ob_start();
 session_start();
 isset($_SESSION['MEM_NO']) ? $_SESSION['MEM_NO'] = $_SESSION['MEM_NO'] : $_SESSION['MEM_NO'] = null;
?>
    <h4>訂單詳情(訂單編號<?php echo $_REQUEST["ORDER_NO"]?>)</h4>
<?php
try {
    require_once "connectBD103G2.php";

    $sql = "select *
            from orderlist o,orderlist_details od,product p
            where o.ORDER_NO = od.ORDER_NO
            and od.PRODUCT_NO = p.PRODUCT_NO
            and MEM_NO = :memNo
            and o.ORDER_NO = :orderNo";
    $product = $pdo->prepare($sql);
    $product->bindValue(":memNo", $_SESSION["MEM_NO"]);
    $product->bindValue(":orderNo", $_REQUEST["ORDER_NO"]);
    $product->execute();
?>
    <table>
    <tr>
        <th>商品名稱</th>
        <th>商品價錢</th>
        <th>商品數量</th>
    </tr>
<?php
    while($productRow = $product->fetchObject()){
?>   
    <tr>
        <td><a href="../html/Cat_ShoppingStore_product.php?PRODUCT_NO=<?php echo $productRow->PRODUCT_NO?>"><?php echo $productRow->PRODUCT_NAME?></a></td>
        <td><?php echo $productRow->PRODUCT_PRICE?></td>
        <td><?php echo $productRow->COUNT?></td>
    </tr>
<?php
    }
?>
    </table>
<?php
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>
