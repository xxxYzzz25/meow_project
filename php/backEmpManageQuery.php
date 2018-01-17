<?php 

    require_once("../php/connectBD103G2.php");
    $sql = "select EMP_ID,EMP_POST from emp";

    $data = $pdo -> query($sql);
    $resJson = array();
    
    while ($dataRow = $data -> fetchObject()) {
        $arr = array($dataRow -> EMP_ID =>  $dataRow -> EMP_POST );
        array_push($resJson,$arr);
    }

    echo json_encode($resJson);

?>