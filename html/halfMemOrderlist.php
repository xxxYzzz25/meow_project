<?php
ob_start();
session_start();
isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>
<div class="halfMemOrderlist" id="halfMemCat">
    <h4>查詢訂單記錄</h4>
    <p>以下是您的訂購紀錄：</p>
    <span>*提醒您，若您的未取件次數累計達5次(含)，將無法再使用超商取貨付款，造成不便及困擾之處，懇請見諒。</span>
<?php
try {
    require_once "../php/connectBD103G2.php";
    $sql       = "select count(*) from orderlist"; // 計算資料筆數
    $total     = $pdo->query($sql);
    $rownum    = $total->fetchcolumn(); // 總共欄位數
    $perPage   = 10; // 每頁顯示筆數
    $totalpage = ceil($rownum / $perPage); // 計算總頁數
    $pageNo    = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo    = 1;
    // 若無當前頁數則進入第一頁 若有則進入該頁
    $start = ($pageNo - 1) * $perPage;
    // 設定每頁呈現內容
    $sql       = "select * from orderlist where HALF_NO = ? limit $start, $perPage";
    $orderlist = $pdo->prepare($sql);
    $orderlist->bindValue(1, $_SESSION["HALF_NO"]); //session
    $orderlist->execute();

    if ($orderlist->rowCount() == 0) {
        echo "<center>查無此訂單資料</center>";
    } else {
        ?>
    <table>
        <tr>
            <th>訂單編號</th>
            <th>購買總金額</th>
            <th>訂購時間</th>
            <th>訂單狀態</th>
            <th>訂單明細</th>
        </tr>
<?php
while ($orderlistRow = $orderlist->fetchObject()) {
            ?>
        <tr>
            <td><?php echo $orderlistRow->ORDER_NO; ?></td>
            <td><?php echo $orderlistRow->ORDER_PRICE; ?></td>
            <td><?php echo $orderlistRow->ORDER_TIME; ?></td>
            <td><?php
if ($orderlistRow->ORDER_STATUS == 0) {
                echo "商品尚未出貨";
            } elseif ($orderlistRow->ORDER_STATUS == 1) {
                echo "商品運送中";
            } else {
                echo "訂單已完成";
            }
            ?></td>
            <td><button class="defaultBtn" onclick="add('../php/halfMemOrderlistDetail.php?ORDER_NO=<?php echo $orderlistRow->ORDER_NO; ?>');">訂單詳情</button></td>
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
        <div class="page">
            <?php
for ($i = 1; $i <= $totalpage; $i++) {
    echo "<a href='?pageNo=$i' class='pageNo defaultBtn'>" . $i . "</a>";
}
?>
        </div>

    <h4>備註說明</h4>
    <h5>「集貨時間」說明：</h5>
    <p>
        <i class="fa fa-hand-o-right" aria-hidden="true"></i>訂單內商品皆有現貨庫存需1~3個工作天即可為您出貨</p>
    <p>
        <i class="fa fa-hand-o-right" aria-hidden="true"></i>訂單內有部分商品需要調貨需5~7個工作天即可為您出貨</p>
</div>