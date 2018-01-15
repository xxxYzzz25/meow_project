<?php
    ob_start();
    session_start();
?>
<div class="halfMemInfo">
    <h4>編輯助養資訊</h4>
<?php
try {
    require_once "connectBD103G2.php";

    $sql = "select *
            from donate d,cat c,halfway_member h
            where d.CAT_NO = c.CAT_NO 
              and c.HALF_NO = h.HALF_NO
              and c.HALF_NO =?;";
    $donate = $pdo->prepare($sql);
    $donate->bindValue(1, $_SESSION["HALF_ID"]); //session
    $donate->execute();

    if ($donate->rowCount() == 0) {
        echo "<center>查無此訂單資料</center>";
    } else {
        while ($donateRow = $donate->fetchObject()) {
            ?>

    <form action="" id="form1">
        <table>
            <tr>
                <th>助養者名字</th>
                <td>
                    <input type="text" value="<?php echo $donateRow->DONATE_NAME; ?>">
                </td>
            </tr>
            <tr>
                <th>助養的喵喵名字</th>
                <td>
                    <input type="text" value="<?php echo $donateRow->CAT_NAME; ?>">
                </td>
            </tr>
            <tr>
                <th>助養金額</th>
                <td>
                    <input type="text" value="<?php echo $donateRow->DONATE_PRICE; ?>">
                </td>
            </tr>
            <tr>
                <th>助養時間</th>
                <td>
                    <input type="text" value="<?php echo $donateRow->DONATE_DATE; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button>確定修改</button>
                </td>
            </tr>
        </table>
    </form>

<?php
}
    } //if...else
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤訊息 : ", $e->getMessage(), "<br>";
}

?>
</div>