
<?php
try {
    require_once "../php/connectBD103G2.php";

    if(isset($_REQUEST["searchLoc"]) || isset($_REQUEST["searchName"])){
        $echoText = "";
        
        $searchLoc = isset($_REQUEST["searchLoc"]) ? $_REQUEST["searchLoc"] : '';
        $searchName = isset($_REQUEST["searchName"]) ? $_REQUEST["searchName"] : '';
        
        $locArr = array('北部' => array("台北市","新北市","基隆市","桃園市","新竹市","新竹縣","宜蘭縣"), '中部' => array("苗栗縣","台中市","彰化縣","南投縣","雲林縣","嘉義縣","嘉義市"),'南部' => array("台南市","高雄市","屏東縣"),'東部' => array("花蓮縣","台東縣"),'離島' => array("金門縣","連江縣","澎湖縣"));
        
        $sql     = "select * from halfway_member
                    where ";
    	if(!empty($searchLoc)){
            $arrLen = count($locArr[$searchLoc]);
            $sql .= "(";
            for($i = 0; $i < $arrLen ; $i++) {
                if($i == $arrLen-1){
                    $temp = $locArr[$searchLoc][$i];
                    $sql.="HALF_ADDRESS like '%$temp%') and ";
                }else{
                    $temp = $locArr[$searchLoc][$i];
                    $sql.="HALF_ADDRESS like '%$temp%' or ";
                }
            }
        }
        $sql .= "HALF_NAME like '%$searchName%'";
        $halfway = $pdo->prepare($sql);
        $halfway->bindColumn("HALF_NO", $NO);
        $halfway->bindColumn("HALF_NAME", $NAME);
        $halfway->bindColumn("HALF_ADDRESS", $ADDRESS);
        $halfway->bindColumn("HALF_TEL", $TEL);
        $halfway->bindColumn("HALF_OPEN", $OPEN);
        $halfway->bindColumn("HALF_COVER", $COVER);
        $halfway->execute();
        while ($row = $halfway->fetchObject()) {
            
            $echoText .="<div class='item'>
                <div class='pic'>
                    <img src='$COVER' alt='halfway'>
                </div>
                <div class='text tx1'>
                    <h3>$NAME</h3>
                    <p>ADD：$ADDRESS</p>
                    <p>TEL：$TEL</p>
                    <p>TIME：$OPEN</p>
                    <form action='halfway_house_detail.php'>
                        <input type='hidden' name='halfno' value='$NO'>
                        <button type='submit' id='btn'>see more</button>
                    </form>
                </div>
                <div class='bg color$NO'></div>
            </div>";
        }
        echo $echoText;

    }else{
        $echoText = "";
        $sql = "select * from halfway_member";
        $halfway = $pdo->prepare($sql);
        $halfway->bindColumn("HALF_NO", $NO);
        $halfway->bindColumn("HALF_NAME", $NAME);
        $halfway->bindColumn("HALF_ADDRESS", $ADDRESS);
        $halfway->bindColumn("HALF_TEL", $TEL);
        $halfway->bindColumn("HALF_OPEN", $OPEN);
        $halfway->bindColumn("HALF_COVER", $COVER);
        $halfway->execute();
        while ($row = $halfway->fetchObject()) {
            
                $echoText .="<div class='item'>
                    <div class='pic'>
                        <img src='$COVER' alt='halfway'>
                    </div>
                    <div class='text tx1'>
                        <h3>$NAME</h3>
                        <p>ADD：$ADDRESS</p>
                        <p>TEL：$TEL</p>
                        <p>TIME：$OPEN</p>
                        <form action='halfway_house_detail.php'>
                            <input type='hidden' name='halfno' value='$NO'>
                            <button type='submit' id='btn'>see more</button>
                        </form>
                    </div>
                    <div class='bg color$NO'></div>
                </div>";
        }
        echo $echoText;
    }
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>