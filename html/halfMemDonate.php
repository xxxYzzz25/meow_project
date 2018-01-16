<?php
ob_start();
session_start();
?>
<div class="halfMemInfo">
    <h4>新增助養資訊</h4>
<?php
try {
    require_once "../php/connectBD103G2.php";

    $sql = "select d.CAT_NO,d.DONATE_NAME,d.DONATE_PRICE,d.DONATE_DATE,c.CAT_NAME,h.HALF_NO
            from donate d,cat c,halfway_member h
            where d.CAT_NO = c.CAT_NO
            and c.HALF_NO = h.HALF_NO
            and c.HALF_NO =1;";
    $donate = $pdo->prepare($sql);
    // $donate->bindValue(1, $_SESSION["HALF_ID"]); //session
    $donate->execute();
    $donateRow = $donate->fetchObject()
?>
    <form action="../php/halfMemDonateInserToDb.php">
        <input type="hidden" name="no" value="<?php echo $donateRow->HALF_NO; ?>">
        <table>
            <tr>
                <th>助養者名字</th>
                <td>
                    <input type="text" name="memName">
                </td>
            </tr>
            <tr>
                <th>助養的喵喵名字</th>
                <td>
                    <input type="text" name="catName">
                </td>
            </tr>
            <tr>
                <th>助養金額</th>
                <td>
                    <input type="text" name="price">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">確定新增</button>
                </td>
            </tr>
        </table>
    </form>

<?php
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤訊息 : ", $e->getMessage(), "<br>";
}
?>
</div>