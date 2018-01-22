<?php
    ob_start();
    session_start();
?>
<div class="halfMemAdopt">
    <h4>審核領養案件</h4>
    <form action="../php/halfMemAdoptToDb.php">
        <table>
            <tr>
                <th>喵小孩名字</th>
                <th>領養者</th>
                <th>領養案件時間</th>
                <th>審核狀態</th>
                <th>審核此筆紀錄</th>
                <th>送出審核</th>
            </tr>
<?php
try {
    require_once("../php/connectBD103G2.php");

    $sql = "select *
            from adoption a,cat c,member m,halfway_member h
            where a.CAT_NO = c.CAT_NO 
                and a.MEM_NO = m.MEM_NO 
                and c.HALF_NO = h.HALF_NO
                and c.ADOPT_STATUS = 1
                and h.HALF_NO = ?
                order by ADOPT_DATE desc";
    $adopt = $pdo->prepare( $sql );
    $adopt->bindValue(1, $_SESSION["HALF_NO"]);//session
    $adopt->execute();
    
    if( $adopt->rowCount()==0){
        echo "<center>查無領養案件紀錄</center>";
    }else{
        while ($adoptRow = $adopt->fetchObject()) {
?>
        <input type="hidden" name="no" value="<?php echo $adoptRow->CAT_NO;?>">
            <tr>
                <td><?php echo $adoptRow->CAT_NAME; ?></td>
                <td><?php echo $adoptRow->MEM_NAME; ?></td>
                <td><?php echo $adoptRow->ADOPT_DATE; ?></td>
                <td>
                    <?php if($adoptRow->ADOPT_STATUS == 1){
                            echo "喵喵領養審核中";
                        }elseif($adoptRow->ADOPT_STATUS == 0){
                            echo "喵喵等待領養中";
                        }else{
                            echo "喵喵已被領養";
                        }
                    ?>
                </td>
                <td>
                    <p class="circle">
                        <input type="radio" id="circle" name="status" value="2">
                        <i class="fa fa-circle-o" aria-hidden="true" id="ensureBtn"></i>成功
                    </p>
                    <p class="times">
                        <input type="radio" id="times" name="status" value="0">
                        <i class="fa fa-times cancel"></i>失敗
                    </p>
                </td>
                <td>
                    <button type="submit" class="defaultBtn">確定審核</button>
                </td>
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
    </form>
</div>