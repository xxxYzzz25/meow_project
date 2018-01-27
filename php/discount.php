<?php

    ob_start();
    session_start();

    $who = isset($_REQUEST["memNo"]) ? "member" : "halfway_member";
    $no = isset($_REQUEST["memNo"]) ? $_REQUEST["memNo"] : $_REQUEST["halfNo"];
    $whoDiscount = isset($_REQUEST["memNo"]) ? "mem_discount" : "half_discount";
    try {
        require_once("connectBD103G2.php");
        
        $score = $_REQUEST["score"];
        $memNo = $_REQUEST["memNo"];
        $sql = "update $who set $whoDiscount = $score where mem_no = $no";
        //執行該指令
        $pdo->query($sql);
        header("Location:../html/Cat_ShoppingStore.php");
    
    } catch (PDOException $e) {
        echo "行號: ", $e->getLine(), "<br>";
        echo "訊息: ", $e->getMessage(), "<br>";
    }

?>