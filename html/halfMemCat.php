<?php
    ob_start();
    session_start();
?>
<div class="halfMemCat">
    <h4>編輯喵小孩資料</h4>
    <?php
try {
    require_once("../php/connectBD103G2.php");

    $sql = "select * from cat where HALF_NO =1";
    $HWcat = $pdo->prepare( $sql );
    // $HWcat->bindValue(1, $_SESSION["HALF_ID"]);//session
    $HWcat->execute();
    
    if( $HWcat->rowCount()==0){
        echo "<center>查無此中途之家喵小孩資料</center>";
    }else{
        $HWcatRow = $HWcat->fetchObject();
?>
    <form action="../php/halfMemCatUpdateToDb.php">
        <input type="hidden" name="no" value="<?php echo $HWcatRow->HALF_NO;?>">
        <table>
            <tr>
                <th>喵小孩名稱</th>
                <td>
                    <input type="text" name="name" placeholder="<?php echo $HWcatRow->CAT_NAME;?>">
                </td>
            </tr>
            <tr>
                <th>喵小孩出生年月</th>
                <td>
                    <input type="text" name="date" placeholder="<?php echo $HWcatRow->CAT_DATE;?>">
                </td>
            </tr>
            <tr>
                <th>喵小孩性別</th>
                <td>
                    <input type="radio" class="radio" name="sex" value="0" checked="true">男
                    <input type="radio" class="radio" name="sex" value="1">女
                </td>
            </tr>
            <tr>
                <th>喵小孩個性</th>
                <td>
                    <input type="text" name="narrative" placeholder="<?php echo $HWcatRow->CAT_NARRATIVE;?>">
                </td>
            </tr>
            <tr>
                <th>喵小孩毛色</th>
                <td>
                    <input type="text" name="color" placeholder="<?php echo $HWcatRow->CAT_COLOR;?>">
                </td>
            </tr>
            <tr>
                <th>喵小孩地區</th>
                <td>
                    <select name="location">
                    <option value="1">請選擇</option>
                    <option value="1">臺北市</option>
                    <option value="2">新北市</option>
                    <option value="3">基隆市</option>
                    <option value="4">桃園市</option>
                    <option value="5">新竹市</option>
                    <option value="6">新竹縣</option>
                    <option value="7">宜蘭縣</option>
                    <option value="8">苗栗縣</option>
                    <option value="9">台中市</option>
                    <option value="10">彰化縣</option>
                    <option value="11">南投縣</option>
                    <option value="12">雲林縣</option>
                    <option value="13">嘉義縣</option>
                    <option value="14">嘉義市</option>
                    <option value="15">台南市</option>
                    <option value="16">高雄市</option>
                    <option value="17">屏東縣</option>
                    <option value="18">花蓮縣</option>
                    <option value="19">台東縣</option>
                    <option value="20">離島喔</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>喵小孩疫苗</th>
                <td>
                    <input type="radio" class="radio" name="vaccine" value="1">是
                    <input type="radio" class="radio" name="vaccine" value="0" checked="true">否
                </td>
            </tr>
            <tr>
                <th>喵小孩結紮</th>
                <td>
                    <input type="radio" class="radio" name="ligation" value="1">是
                    <input type="radio" class="radio" name="ligation" value="0" checked="true">否
                </td>
            </tr>
            <tr>
                <th>喵小孩簡單介紹</th>
                <td id="simple">
                    <p>個性
                        <input type="text" class="simple" name="individuality" value="<?php echo $HWcatRow->CAT_INDIVIDUALITY;?>">
                    </p>
                    <p>適合對象
                        <input type="text" class="simple" name="fit" value="<?php echo $HWcatRow->CAT_FIT;?>">
                    </p>
                    <p>優點
                        <input type="text" class="simple" name="advantage" value="<?php echo $HWcatRow->CAT_ADVANTAGE;?>">
                    </p>
                    <p>缺點
                        <input type="text" class="simple" name="disadvantage" value="<?php echo $HWcatRow->CAT_DISADVANTAGE;?>">
                    </p>
                </td>
            </tr>
            <tr>
                <th>喵小孩大頭貼</th>
                <td>
                    <input type="file" name="catpic">
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