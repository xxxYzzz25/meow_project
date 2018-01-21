<?php
try {
    require_once("../php/connectBD103G2.php");

    $sql = "select * from cat where CAT_NO = :catNo";
    $HWcat = $pdo->prepare( $sql );
    $HWcat->bindValue(":catNo", $_REQUEST["CAT_NO"]);
    $HWcat->execute();
    while($HWcatRow = $HWcat->fetchObject()){
?>
    <h4>修改喵小孩資料</h4>
    <form action="../php/halfMemCatUpdateToDb.php" method="post">
        <input type="hidden" name="no" value="<?php echo $HWcatRow->CAT_NO;?>">
        <table>
            <tr>
                <th>喵小孩名稱</th>
                <td>
                    <input type="text" name="name" value="<?php echo $HWcatRow->CAT_NAME;?>">
                </td>
            </tr>
            <tr>
                <th>喵小孩出生年月</th>
                <td>
                    <input type="text" name="date" value="<?php echo $HWcatRow->CAT_DATE;?>">
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
                    <input type="text" name="narrative" value="<?php echo $HWcatRow->CAT_NARRATIVE;?>">
                </td>
            </tr>
            <tr>
                <th>喵小孩毛色</th>
                <td>
                    <input type="text" name="color" value="<?php echo $HWcatRow->CAT_COLOR;?>">
                </td>
            </tr>
            <tr>
                <th>喵小孩地區</th>
                <td>
                    <select name="location">
                    <option>請選擇</option>
                    <option value="台北市">台北市</option>
                    <option value="新北市">新北市</option>
                    <option value="基隆市">基隆市</option>
                    <option value="桃園市">桃園市</option>
                    <option value="新竹市">新竹市</option>
                    <option value="新竹縣">新竹縣</option>
                    <option value="宜蘭縣">宜蘭縣</option>
                    <option value="苗栗縣">苗栗縣</option>
                    <option value="台中市">台中市</option>
                    <option value="彰化縣">彰化縣</option>
                    <option value="南投縣">南投縣</option>
                    <option value="雲林縣">雲林縣</option>
                    <option value="嘉義縣">嘉義縣</option>
                    <option value="嘉義市">嘉義市</option>
                    <option value="台南市">台南市</option>
                    <option value="高雄市">高雄市</option>
                    <option value="屏東縣">屏東縣</option>
                    <option value="花蓮縣">花蓮縣</option>
                    <option value="台東縣">台東縣</option>
                    <option value="離島">離島喔</option>
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
                    <button type="submit" class="defaultBtn">確定修改</button>
                </td>
            </tr>
        </table>
    </form>
<?php
    }//while
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤訊息 : ", $e->getMessage(), "<br>"; 
}
?>