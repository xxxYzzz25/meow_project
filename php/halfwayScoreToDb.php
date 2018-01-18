<?php
try {
    require_once "connectBD103G2.php";

    $sql = "insert into evaluation( MEM_NO,HALF_NO,EVALUATION_STARS ) 
                            VALUES(:MEM_NO,:HALF_NO,:EVALUATION_STARS)";
    $eva = $pdo->prepare($sql);
    $eva->bindValue(":MEM_NO", $_REQUEST["MEM_NO"]);
    $eva->bindValue(":HALF_NO", $_REQUEST["HALF_NO"]);
    $eva->bindValue(":EVALUATION_STARS", $_REQUEST["EVALUATION_STARS"]);
    $eva->execute();

    // $sql = "select EVALUATION_STARS from evaluation ORDER BY EVALUATION_NO DESC limit 1";
    // $star = $pdo->query($sql);
    // $starRow=$star->fetch(PDO::FETCH_ASSOC);
    // echo $starRow["EVALUATION_STARS"];

    $sql = "select ROUND(avg(EVALUATION_STARS), 1) avg,COUNT(*) count
            from evaluation
            where HALF_NO=:HALF_NO";
    $avgScore = $pdo->prepare($sql);
    $avgScore->bindValue(":HALF_NO", $_REQUEST["HALF_NO"]);
    $avgScore->execute();
    $avgScoreRow = $avgScore->fetchObject();
    $avg = $avgScoreRow->avg;
    $count = $avgScoreRow->count;
    $array = array( "avg" => $avg ,"count" => $count );
    $array_json = json_encode($array);
    echo $array_json;
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>