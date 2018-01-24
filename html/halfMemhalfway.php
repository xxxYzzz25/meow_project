<?php
ob_start();
session_start();
isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>
<div class="halfMemInfo">
    <h4>編輯中途之家資料</h4>
    <?php
try {
    require_once "../php/connectBD103G2.php";

    $sql   = "select * from halfway_member where HALF_NO =?";
    $HWmem = $pdo->prepare($sql);
    $HWmem->bindValue(1, $_SESSION["HALF_NO"]); //session
    $HWmem->execute();

    if ($HWmem->rowCount() == 0) {
        echo "<center>查無此中途之家資料</center>";
    } else {
        $HWmemRow = $HWmem->fetchObject();
        ?>
    <form action="../php/halfMemHalfwayUpdateToDb.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="no" value="<?php echo $HWmemRow->HALF_NO; ?>">
	    <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
        <table>
            <tr>
                <th>中途之家名稱</th>
                <td>
                    <input type="text" onfocus="this.select()" name="name" value="<?php echo $HWmemRow->HALF_NAME ?>">
                </td>
            </tr>
            <tr>
                <th>中途之家地址</th>
                <td>
                    <input type="address" onfocus="this.select()" name="address" value="<?php echo $HWmemRow->HALF_ADDRESS ?>">
                </td>
            </tr>
            <tr>
                <th>中途之家電話</th>
                <td>
                    <input type="tel" onfocus="this.select()" name="tel" value="<?php echo $HWmemRow->HALF_TEL ?>">
                </td>
            </tr>
            <tr>
                <th>中途之家營業時間</th>
                <td>
                    <input type="text" onfocus="this.select()" name="open" value="<?php echo $HWmemRow->HALF_OPEN ?>">
                </td>
            </tr>
            <tr>
                <th>中途之家敘述</th>
                <td>
                    <textarea onfocus="this.select()" name="intro" id="" cols="60" rows="5" id="textarea"></textarea>
                </td>
            </tr>
            <tr>
                <th>新增中途之家的詳細圖片(最多可選擇4張)</th>
                <td>
                    <input type="file" name="upFile[]" id="files" multiple="multiple">
                    <output id="picList"></output>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="defaultBtn">確定修改</button>
                    <button type="reset" class="defaultBtn" id="resetBtn">清除重填</button>
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