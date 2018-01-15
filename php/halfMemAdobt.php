<?php
    ob_start();
    session_start();
?>
<div class="halfMemAdopt">
    <h4>審核領養案件</h4>

        <?php
try {
    require_once("connectBD103G2.php");

    $sql = "select *
            from adoption a,cat c,member m,halfway_member h
            where a.CAT_NO = c.CAT_NO 
              and a.MEM_NO = m.MEM_NO 
              and c.HALF_NO = h.HALF_NO
              and c.HALF_NO =?;";
    $adopt = $pdo->prepare( $sql );
    $adopt->bindValue(1, $_SESSION["HALF_ID"]);//session
    $adopt->execute();
    
    if( $adopt->rowCount()==0){
        echo "<center>查無領養案件紀錄</center>";
    }else{
        while ($adoptRow = $adopt->fetchObject()) {
?>
        <form action="halfMemAdobtUpdateToDb.php">
            <input type="hidden" name="no" value="<?php echo $adoptRow->CAT_NO;?>">
            <table>
                <tr>
                    <th>喵小孩名字</th>
                    <th>領養者</th>
                    <th>領養案件時間</th>
                    <th>審核狀態</th>
                    <th>審核此筆紀錄</th>
                </tr>
                <tr>
                    <td><?php echo $adoptRow->CAT_NAME; ?></td>
                    <td><?php echo $adoptRow->MEM_NAME; ?></td>
                    <td><?php echo $adoptRow->ADOPT_DATE; ?></td>
                    <td><?php echo $adoptRow->ADOPT_STATUS; ?></td>
                    <td>
                        <input type="radio" name="status" value="1"><i class='fa fa-thumbs-o-up' aria-hidden='true'></i>審核通過
                        <input type="radio" name="status" value="0"><i class='fa fa-trash' aria-hidden='true'></i>審核失敗
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