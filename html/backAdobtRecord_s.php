<?php
    try{
        require_once('./connectBook.php');

        $order = $_POST["order"];
        // if($order == '1'){
            $sql = "select a.CAT_NO catNo,a.MEM_NO memNo,a.ADOPT_DATE adoptDate 
                from adoption a 
                join CAT c on a.CAT_NO = c.CAT_NO 
                where c.ADOPT_STATUS = '1' 
                order by a.ADOPT_DATE desc 
                limit 20;";
        // }else if($order == '2'){
            $sql = "select a.CAT_NO catNo,a.MEM_NO memNo,a.ADOPT_DATE adoptDate 
            from adoption a 
            join CAT c on a.CAT_NO = c.CAT_NO 
            where c.ADOPT_STATUS = '1' 
            order by a.ADOPT_DATE desc 
            limit 20;";
        // }
            $jsonData = array('喵編號' => $data -> catNo, '領養帳號' => $data -> memNo, '領養時間' => $data -> adoptDate);
            $jsonData = json_encode($jsonData);
    }catch(PDOException $e){
        echo $e -> getMessage();
        echo $e -> getLine();
    }

?>