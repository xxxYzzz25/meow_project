<?php
ob_start();
session_start();
?>

<div class="halfMemCat" id="catInfo">
<!-- 新增喵開始 -->
    <button id="newEmp" class="newbtn">新增喵小孩</button>
    <form action="../php/halfMemCatInsertToDb.php" method="post">
        <input type="hidden" name="no" value="<?php echo $_SESSION["HALF_NO"];?>">
        <h4 class="newEmpTR newEmpTROff">新增喵小孩</h4>
        <table>
            <tr class="newEmpTR newEmpTROff">
                <th>喵小孩名稱</th>
                <td>
                    <input type="text" name="name">
                </td>
            </tr>
            <tr class="newEmpTR newEmpTROff">
                <th>喵小孩出生年月</th>
                <td>
                    <input type="text" name="date">
                </td>
            </tr>
            <tr class="newEmpTR newEmpTROff">
                <th>喵小孩性別</th>
                <td>
                    <input type="radio" class="radio" name="sex" value="0" checked="true">男
                    <input type="radio" class="radio" name="sex" value="1">女
                </td>
            </tr>
            <tr class="newEmpTR newEmpTROff">
                <th>喵小孩個性</th>
                <td>
                    <input type="text" name="narrative">
                </td>
            </tr>
            <tr class="newEmpTR newEmpTROff">
                <th>喵小孩毛色</th>
                <td>
                    <input type="text" name="color">
                </td>
            </tr>
            <tr class="newEmpTR newEmpTROff">
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
            <tr class="newEmpTR newEmpTROff">
                <th>喵小孩疫苗</th>
                <td>
                    <input type="radio" class="radio" name="vaccine" value="1">是
                    <input type="radio" class="radio" name="vaccine" value="0" checked="true">否
                </td>
            </tr>
            <tr class="newEmpTR newEmpTROff">
                <th>喵小孩結紮</th>
                <td>
                    <input type="radio" class="radio" name="ligation" value="1">是
                    <input type="radio" class="radio" name="ligation" value="0" checked="true">否
                </td>
            </tr>
            <tr class="newEmpTR newEmpTROff">
                <th>喵小孩簡單介紹</th>
                <td id="simple">
                    <p>個性
                        <input type="text" class="simple" name="individuality">
                    </p>
                    <p>適合對象
                        <input type="text" class="simple" name="fit">
                    </p>
                    <p>優點
                        <input type="text" class="simple" name="advantage">
                    </p>
                    <p>缺點
                        <input type="text" class="simple" name="disadvantage">
                    </p>
                </td>
            </tr>
            <tr class="newEmpTR newEmpTROff">
                <th>喵小孩大頭貼</th>
                <td>
                    <input type="file" name="catpic">
                </td>
            </tr>
            <tr class="newEmpTR newEmpTROff">
                <td colspan="2">
                    <button type="submit">確定修改</button>
                    <button type="reset">清除內容</button>
                </td>
            </tr>
        </table>
    </form>
<!-- 新增喵結束 -->

<!-- 喵的資訊 -->
    <h4>喵小孩資料</h4>
    <table class="catInfo">
        <tr>
            <th>喵小孩名字</th>
            <th>喵小孩領養狀態</th>
            <th>喵小孩詳細資料</th>
        </tr>
<?php
try {
    require_once "../php/connectBD103G2.php";

    $sql   = "select * from cat where HALF_NO =1";
    $HWcat = $pdo->prepare($sql);
    // $HWcat->bindValue(1, $_SESSION["HALF_ID"]);//session
    $HWcat->execute();

    if ($HWcat->rowCount() == 0) {
        echo "<center>查無此中途之家喵小孩資料</center>";
    } else {
        while ($HWcatRow = $HWcat->fetchObject()) {
            ?>
        <tr>
            <td><?php echo $HWcatRow->CAT_NAME; ?></td>
            <td>
                <?php if ($HWcatRow->ADOPT_STATUS == 0) {
                echo "喵喵等待領養";
            } elseif ($HWcatRow->ADOPT_STATUS == 1) {
                echo "喵喵領養審核中";
            } else {
                echo "喵喵已被領養";
            }
            ?>
            </td>
            <td><button onclick="add('../html/halfMemCatDetail.php?CAT_NO=<?php echo $HWcatRow->CAT_NO; ?>');">查看喵小孩</button></td>
        </tr>

<?php
} //while
    } //if...else
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤訊息 : ", $e->getMessage(), "<br>";
}
?>
    </table>
</div>