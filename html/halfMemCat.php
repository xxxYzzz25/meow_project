<?php
    ob_start();
    session_start();
?>

<div class="halfMemCat" id="catInfo">
    <h4>喵小孩資料</h4>
    <table class="catInfo">
        <tr>
            <th>喵小孩名字</th>
            <th>喵小孩領養狀態</th>
            <th>喵小孩詳細資料</th>
        </tr>
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
        while($HWcatRow = $HWcat->fetchObject()){
?>
        <tr>
            <td><?php echo $HWcatRow->CAT_NAME; ?></td>
            <td>
                <?php if($HWcatRow->ADOPT_STATUS == 0){
                            echo "喵喵等待領養";
                        }elseif($HWcatRow->ADOPT_STATUS == 1){
                            echo "喵喵領養審核中";
                        }else{
                            echo "喵喵已被領養";
                        }
                ?>
            </td>
            <td><button onclick="add('../html/halfMemCatDetail.php?CAT_NO=<?php echo $HWcatRow->CAT_NO; ?>');">查看喵小孩</button></td>
        </tr>

<?php
        }//while
    } //if...else 
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤訊息 : ", $e->getMessage(), "<br>"; 
}
?>
    </table>
</div>