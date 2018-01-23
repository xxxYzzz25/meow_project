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
            $sql = "select count(*) count 
                    from emp
                    where EMP_ID = :empId and EMP_PSW = :empPsw";
            $data = $pdo -> prepare($sql);
            $empId = $_POST["empId"];
            $empPsw = $_POST["empPsw"];
            $data -> bindParam(":empId",$empId);
            $data -> bindParam(":empPsw",$empPsw);
            $data -> execute();
            $dataRow = $data -> fetchObject();

            if($dataRow -> count == 0){
                $sql= "update EMP set EMP_ID = :empId,EMP_PSW = md5(:empPsw),
                        EMP_POST = :empOffice where EMP_NO = :empNo";
            }else if($dataRow -> count == 1){
                $sql= "update EMP set EMP_ID = :empId,
                        EMP_POST = :empOffice where EMP_NO = :empNo";
            }
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

            $sql = "select EMP_NO,EMP_ID,EMP_POST,EMP_PSW from emp";
            $data = $pdo -> query($sql);
            $resJson = array();

            while ($dataRow = $data -> fetchObject()) {
            $arr = array("id" => $dataRow -> EMP_ID , "post" => $dataRow -> EMP_POST, "No" => $dataRow -> EMP_NO,"odd" => $dataRow -> EMP_PSW);
            array_push($resJson,$arr);

            }
            echo json_encode($resJson);
        }else if($cmd == "md"){
            $sql = "select EMP_PSW
                    from emp
                    where EMP_ID = :empId and EMP_NO = :empNo";
            $data = $pdo -> prepare($sql);
            $data -> bindParam(":empId",$_POST["empId"]);
            $data -> bindParam(":empNo",$_POST["empNo"]);
            $data -> execute();
            $dataRow = $data -> fetchObject();
            echo $dataRow -> EMP_PSW;
        }
    }catch(PDOException $e){
        echo $e -> getLine();
        echo $e -> getMessage();
    }

?>