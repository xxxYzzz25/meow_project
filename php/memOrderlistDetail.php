<?php
try {
    require_once "connectBD103G2.php";

    $sql = "select *
            from orderlist o,orderlist_details od,product p
            where o.ORDER_NO = od.ORDER_NO
            and od.PRODUCT_NO = p.PRODUCT_NO
            and MEM_NO = :memNo
            and ORDER_NO = :orderNo";
    $product = $pdo->prepare($sql);
    $product->bindValue(":memNo", $_REQUEST["MEM_NO"]);
    $product->bindValue(":orderNo", $_REQUEST["ORDER_NO"]);
    $product->execute();
    $productRow = $product->fetchObject();
    $name       = $productRow->CUS_NAME;
    $cover      = $productRow->PRODUCT_COVER;
    $pname      = $productRow->PRODUCT_NAME;
    $price      = $productRow->PRODUCT_PRICE;
    $count      = $productRow->COUNT;
    $array      = array("name" => $name,
        "cover"                    => $cover,
        "pname"                    => $pname,
        "price"                    => $price,
        "count"                    => $count);
    $array_json = json_encode($array);
    echo $array_json;
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
