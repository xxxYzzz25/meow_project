<h4>訂單詳情(訂單編號<?php echo $_REQUEST["ORDER_NO"]?>)</h4>
<table class="odTable">
    <tr>
        <th>客戶名字</th>
        <th>商品名稱</th>
        <th>商品價錢</th>
        <th>商品數量</th>
    </tr>
<?php
try {
    require_once "connectBD103G2.php";

    $sql = "select *
            from orderlist o,orderlist_details od,product p
            where o.ORDER_NO = od.ORDER_NO
            and od.PRODUCT_NO = p.PRODUCT_NO
            and o.HALF_NO = :halfNo
            and o.ORDER_NO = :orderNo";
    $product = $pdo->prepare($sql);
    // $product->bindValue(":halfNo", $_REQUEST["halfNo"]);
    $product->bindValue(":orderNo", $_REQUEST["ORDER_NO"]);
    $product->bindValue(":halfNo", 1);
    $product->execute();
    while($productRow = $product->fetchObject()){;
?>   
    <tr>
        <td><?php echo $productRow->CUS_NAME?></td>
        <td><a href="<?php echo $productRow->PRODUCT_NAME?>"><?php echo $productRow->PRODUCT_NAME?></a></td>
        <td><?php echo $productRow->PRODUCT_PRICE?></td>
        <td><?php echo $productRow->COUNT?></td>
    </tr>
</table>
<?php
    }
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>
