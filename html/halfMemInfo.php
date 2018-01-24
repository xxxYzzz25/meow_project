<?php
ob_start();
session_start();
isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>
<div class="halfMemInfo">
    <h4>修改中途之家會員資料</h4>
    <?php
try {
    require_once "../php/connectBD103G2.php";

    $sql   = "select * from halfway_member where HALF_NO =?";
    $HWmem = $pdo->prepare($sql);
    $HWmem->bindValue(1, $_SESSION["HALF_NO"]); //session
    $HWmem->execute();

    if ($HWmem->rowCount() == 0) {
        echo "<center>查無此中途會員資料</center>";
    } else {
        $HWmemRow = $HWmem->fetchObject();
        ?>
    <form action="../php/halfMemInfoUpdateToDb.php">
        <input type="hidden" name="no" value="<?php echo $HWmemRow->HALF_NO; ?>">
        <table>
            <tr>
                <th>中途之家會員密碼</th>
                <td>
                    <input type="password" onfocus="this.select()" name="hwmempsw" value="<?php echo $HWmemRow->HALF_PSW; ?>">
                </td>
            </tr>
            <tr>
                <th>中途之家負責人姓名</th>
                <td>
                    <input type="text" onfocus="this.select()" name="hwmemhead" value="<?php echo $HWmemRow->HALF_HEAD; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="defaultBtn">確定修改</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
} //if...else
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤訊息 : ", $e->getMessage(), "<br>";
}

?>
</div>