<?php
    ob_start();
    session_start();
?>
<div class="halfMemInfo">
    <h4>編輯中途之家資料</h4>
    <?php
try {
    require_once("../php/connectBD103G2.php");

    $sql = "select * from halfway_member where HALF_NO =?";
    $HWmem = $pdo->prepare( $sql );
    $HWmem->bindValue(1, $_SESSION["HALF_ID"]);//session
    $HWmem->execute();
    
    if( $HWmem->rowCount()==0){
        echo "<center>查無此中途之家資料</center>";
    }else{
        $HWmemRow = $HWmem->fetchObject();
?>
    <form action="../php/halfMemHalfwayUpdateToDb.php">
        <input type="hidden" name="no" value="<?php echo $HWmemRow->HALF_NO;?>">
        <table>
            <tr>
                <th>中途之家名稱</th>
                <td>
                    <input type="text" name="name" placeholder="<?php echo $HWmemRow->HALF_NAME?>">
                </td>
            </tr>
            <tr>
                <th>中途之家地址</th>
                <td>
                    <input type="address" name="address" placeholder="<?php echo $HWmemRow->HALF_ADDRESS?>">
                </td>
            </tr>
            <tr>
                <th>中途之家電話</th>
                <td>
                    <input type="tel" name="tel" placeholder="<?php echo $HWmemRow->HALF_TEL?>">
                </td>
            </tr>
            <tr>
                <th>中途之家營業時間</th>
                <td>
                    <input type="text" name="open" placeholder="<?php echo $HWmemRow->HALF_OPEN?>">
                </td>
            </tr>
            <tr>
                <th>中途之家敘述</th>
                <td>
                    <textarea name="intro" id="" cols="40" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <th>中途之家的詳細圖片(最多可選擇5張)</th>
                <td>
                    <input type="file" name="hwpic" multiple="multiple">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">確定修改</button>
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