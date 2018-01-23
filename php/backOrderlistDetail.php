<caption>訂單詳情(訂單編號<?php echo $_REQUEST["ORDER_NO"]?>)</caption>
    <tr>
        <th>商品名稱</th>
        <th>商品價錢</th>
        <th>商品數量</th>
    </tr>
<?php
try {
    require_once "connectBD103G2.php";

    $sql = "select p.PRODUCT_NAME name,od.PRODUCT_PRICE price,od.COUNT count
            from orderlist o,orderlist_details od,product p
            where o.ORDER_NO = od.ORDER_NO
            and od.PRODUCT_NO = p.PRODUCT_NO
            and o.ORDER_NO = :orderNo";
    $product = $pdo->prepare($sql);
    $product->bindValue(":orderNo", $_REQUEST["ORDER_NO"]);
    $product->execute();
    while($productRow = $product->fetchObject()){;
?>   
    <tr>
        <td><a href="#"><?php echo $productRow->name ?></a></td>
        <td><?php echo $productRow->price ?></td>
        <td><?php echo $productRow->count ?></td>
    </tr>
    
<?php
    }
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>
