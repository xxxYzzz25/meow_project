<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
</head>
<body>
<?php
try {
    require_once "../php/connectBD103G2.php";
    $searchLoc = $REQUEST_["searchLoc"];
    $searchName = $REQUEST_["searchName"];
   	$locArr = array('北部' => array("臺北市","新北市","基隆市","桃園市","新竹市","新竹縣","宜蘭縣"), '中部' => array("苗栗縣","台中市","彰化縣","南投縣","雲林縣","嘉義縣","嘉義市"),'南部' => array("台南市","高雄市","屏東縣"),'東部' => array("花蓮縣","台東縣"),'離島' => array("金門縣","連江縣","澎湖縣"));
   	$ result = array_search($locArr, $searchLoc);
    				
    $sql     = "select * from halfway_member
    			where HALF_ADDRESS like '%$%'
				and HALF_NAME like '%$%'";
    $halfway = $pdo->prepare($sql);
    $halfway->bindColumn("HALF_NO", $NO);
    $halfway->bindColumn("HALF_NAME", $NAME);
    $halfway->bindColumn("HALF_ADDRESS", $ADDRESS);
    $halfway->bindColumn("HALF_TEL", $TEL);
    $halfway->bindColumn("HALF_OPEN", $OPEN);
    $halfway->bindColumn("HALF_COVER", $COVER);
    $halfway->execute();
    while ($row = $halfway->fetchObject()) {
        ?>
            <div class="item">
                <div class="pic">
                    <img src="<?php echo $COVER ?>" alt="halfway">
                </div>
                <div class="text tx1">
                    <h3><?php echo $NAME ?></h3>
                    <p>ADD：<?php echo $ADDRESS ?></p>
                    <p>TEL：<?php echo $TEL ?></p>
                    <p>TIME：<?php echo $OPEN ?></p>
                    <form action="halfway_house_detail.php">
                        <input type="hidden" name="halfno" value="<?php echo $NO ?>">
                        <button type="submit" id="btn">see more</button>
                        <!-- <a href="./halfway_house_detail.php">see more</a> -->
                    </form>
                </div>
                <div class="bg color<?php echo $NO ?>"></div>
            </div>

<?php
}
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>
</body>
</html>