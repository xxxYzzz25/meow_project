<?php 

    try{
        require_once("../php/connectBD103G2.php");

        $cmd = $_POST["cmd"];
        
        if($cmd == "add"){

            $sql = "insert into emp (EMP_ID,EMP_PSW,EMP_POST) values(:empId,md5(:empPsw),:empOffice)";
            $data = $pdo -> prepare($sql);
            $empId = $_POST["empId"];
            $empPsw = $_POST["empPsw"];
            $empOffice = $_POST["empOffice"];
            $data -> bindParam(":empId",$empId);
            $data -> bindParam(":empPsw",$empPsw);
            $data -> bindParam(":empOffice",$empOffice);
            $data -> execute();

            header("Location:../html/backEmpManage.php");
            
        }else if($cmd == "update"){
            
            $sql= "update EMP set EMP_ID = :empId,EMP_PSW = md5(:empPsw),EMP_POST = :empOffice where EMP_NO = :empNo";

            $data = $pdo -> prepare($sql);
            $empId = $_POST["empId"];
            $empPsw = $_POST["empPsw"];
            $empOffice = $_POST["empOffice"];
            $empNo = $_POST["empNo"];
            $data -> bindParam(":empId",$empId);
            $data -> bindParam(":empPsw",$empPsw);
            $data -> bindParam(":empOffice",$empOffice);
            $data -> bindParam(":empNo",$empNo);
            $data -> execute();
        }else if($cmd == "delete"){

            $sql = "delete from EMP where EMP_NO = :empNo";
            $data = $pdo -> prepare($sql);
            $empNo = $_POST["empNo"];
            $data -> bindParam(":empNo",$empNo);
            $data -> execute();

        }else if($cmd == "query"){

            $sql = "select EMP_NO,EMP_ID,EMP_POST from emp";
            $data = $pdo -> query($sql);
            $resJson = array();

            while ($dataRow = $data -> fetchObject()) {
            $arr = array($dataRow -> EMP_ID =>  $dataRow -> EMP_POST, "No" => $dataRow -> EMP_NO);
            array_push($resJson,$arr);

            }
            echo json_encode($resJson);
        }
    }catch(PDOException $e){
        echo $e -> getLine();
        echo $e -> getMessage();
    }

?>