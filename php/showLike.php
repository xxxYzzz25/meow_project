<?php
    try{
        require_once('./connectBD103G2.php');

        $path = $_REQUEST["path"];
        $memNo = $_REQUEST["memNo"];
        
        $sql = "select c.cat_name catName,h.half_name halfName,c.cat_cover catCover
                from favorite f
                join cat c
                on f.cat_no = c.cat_no
                join halfway_member h
                on h.half_no = c.half_no
                where f.mem_no = $memNo";

        $data = $pdo -> query($sql);
                
        $likeList = array();

        while ($dataRow = $data -> fetchObject()) {

            if($path == "index"){

                $catCover = $dataRow -> catCover;
                $catCover = substr( $catCover , 2 );

            }else{
    
                $catCover = $dataRow -> fetchObject();
                
            }
            $like = array('catName' => $dataRow -> catName,'halfName' => $dataRow -> halfName,'catCover' => $catCover);

            array_push($likeList,$like);
            
        }
        echo json_encode($likeList);
    }catch(PDOException $e){
        echo $e -> getLine();
        echo $e -> getMessage();
    }
?>