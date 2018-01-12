<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>會員登入</title>
</head>

<body>
    <?php
        $memId = $_GET["memId"];
        $memPsw = $_GET["memPsw"];
        try{
            require_once("connectBD103G2.php");

                //準備好指令
            $sql = "select * from member where memId=? and memPsw=?";
                //執行該指令
            $statement = $pdo -> prepare( $sql );
            $statement -> bindValue(1, $memId);
            $statement -> bindValue(2, $memPsw);
            $statement -> execute();
                //檢查是否有此帳密
            if( $statement->rowCount() === 0){ //帳密錯誤
                echo "帳密錯誤 , 請重新登入";
            }else{//帳密存在
                $memRow = $statement -> fetch(PDO::FETCH_ASSOC);//取回資料錄
                echo $memRow["memName"] , "您好~";//致歡迎詞
            }
        }catch( PDOException $e){
        echo "行號: ",$e->getLine(), "<br>";
        echo "訊息: ",$e->getMessage() , "<br>";
        }echo "<script type='text/javascript'>back()</script>";
        echo "<center>將在五秒後回到原網址</center>";
    ?>
    <script type='text/javascript'>
        setTimeout(function back(){
            history.back()
        }, 5000)
    </script>
</body>
</html>