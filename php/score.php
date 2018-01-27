<?php

    ob_start();
    session_start();


    try {
        require_once("connectBD103G2.php");
        
        $score = $_REQUEST["score"];
        $memNo = $_REQUEST["memNo"];
        $sql = "update member set mem_score = $score where mem_no = $memNo";
        //執行該指令
        $pdo->query($sql);
        header("Location:../html/catSearch.php");
    
    } catch (PDOException $e) {
        echo "行號: ", $e->getLine(), "<br>";
        echo "訊息: ", $e->getMessage(), "<br>";
    }

?>