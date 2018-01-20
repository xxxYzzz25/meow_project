<?php
ob_start();
session_start();
?>
<div class="memOrderlist">
    <h4>查詢訂單記錄</h4>
    <p>以下是您的訂購紀錄：</p>
    <span>*提醒您，若您的未取件次數累計達5次(含)，將無法再使用超商取貨付款，造成不便及困擾之處，懇請見諒。</span>

        <table>
            <tr>
                <th>訂單編號</th>
                <th>購買總金額</th>
                <th>訂購時間</th>
                <th>訂單狀態</th>
                <th>訂單明細</th>
            </tr>

<?php
try {
    require_once "../php/connectBD103G2.php";

    $sql       = "select * from orderlist o,member m
                where o.MEM_NO = m.MEM_NO
                and m.MEM_ID = ?";
    $orderlist = $pdo->prepare($sql);
    $orderlist->bindValue(1, $_SESSION["MEM_ID"]); //session
    $orderlist->execute();

    if ($orderlist->rowCount() == 0) {
        echo "<center>查無此訂單資料</center>";
    } else {
        while ($orderlistRow = $orderlist->fetchObject()) {
?>
        <tr>
            <td><?php echo $orderlistRow->ORDER_NO; ?></td>
            <td><?php echo $orderlistRow->ORDER_PRICE; ?></td>
            <td><?php echo $orderlistRow->ORDER_TIME; ?></td>
            <td><?php echo $orderlistRow->ORDER_STATUS; ?></td>
            <td><button class="defaultBtn" onclick="add('../php/memOrderlistDetail.php?ORDER_NO=<?php echo $orderlistRow->ORDER_NO; ?>');">訂單詳情</button></td>
        </tr>
<?php
        }
    } //if...else
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤訊息 : ", $e->getMessage(), "<br>";
}
?>

        </table>

        <table id="odTable" class="odTable"></table>

    <h4>備註說明</h4>
    <h5>「集貨時間」說明：</h5>
    <p>
        <i class="fa fa-hand-o-right" aria-hidden="true"></i>訂單內商品皆有現貨庫存需1~3個工作天即可為您出貨</p>
    <p>
        <i class="fa fa-hand-o-right" aria-hidden="true"></i>訂單內有部分商品需要調貨需5~7個工作天即可為您出貨</p>
</div>