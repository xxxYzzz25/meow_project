<?php

    ob_start();
    session_start();
    
    try{

        require_once('./connectBD103G2.php');
        $memNo = $_SESSION["MEM_NO"];
        $sql = "select c.CAT_NAME name,c.CAT_LOCATION loc,c.CAT_COVER cover,f.CAT_NO catNo
                from favorite f
                join cat c 
                on c.CAT_NO = f.CAT_NO
                where MEM_NO = $memNo";
                
        $data = $pdo -> query($sql);
        $res = "<ul id='likeList'>";
        
        while ($dataList = $data -> fetchObject()) {

            $name = $dataList -> name;
            $loc = $dataList -> loc;
            $cover = $dataList -> cover;
            $catNo = $dataList -> catNo;
            $link = "../html/catContent.php?catNo=$catNo";
            
            if($_REQUEST["pathName"] == 'homepage.php'){
                $cover = substr($cover, 1);
                $link = "./html/catContent.php?catNo=$catNo";
            }

            $res .= "<li class='likeItem'>
                        <img src='$cover' alt='cute cat'>
                        <span class='likeName'><a href='$link'>$name</a></span>
                        <span class='likeAddress'>$loc</span>
                    </li>";

        }
        $res.='</ul>';

        $sql = "select count(*) count from favorite where mem_no = $memNo";

        $data = $pdo -> query($sql);
        $dataList = $data -> fetchObject();
        $count = $dataList -> count;
        if($count == 0){
            $res = '<center>目前無追蹤的貓咪!</center>';
        }
        echo $res;
    }catch(PDOException $e){

        echo $e -> getLine();
        echo $e -> getMessage();

    }

?>