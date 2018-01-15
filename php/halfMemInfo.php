<?php
    ob_start();
    session_start();
?>
<div class="halfMemInfo">
    <h4>修改中途之家會員資料</h4>
    <?php
try {
    require_once("connectBD103G2.php");

    $sql = "select * from halfway_member where HALF_NO =?";
    $HWmem = $pdo->prepare( $sql );
    $HWmem->bindValue(1, $_SESSION["HALF_ID"]);//session
    $HWmem->execute();
    
    if( $HWmem->rowCount()==0){
        echo "<center>查無此中途會員資料</center>";
    }else{
        $HWmemRow = $HWmem->fetchObject();
?>
    <form action="halfMemInfoUpdateToDb.php">
        <input type="hidden" name="no" value="<?php echo $HWmemRow->HALF_NO;?>">
        <table>
            <tr>
                <th>中途之家會員密碼</th>
                <td>
                    <input type="psw" name="psw" placeholder="<?php echo $HWmemRow->HALF_PSW;?>">
                </td>
            </tr>
            <tr>
                <th>中途之家負責人姓名</th>
                <td>
                    <input type="text" name="head" placeholder="<?php echo $HWmemRow->HALF_HEAD;?>">
                </td>
            </tr>
            <tr>
                <th>中途之家會員頭貼</th>
                <td>
                    <input type="file" name="hwmempic">
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