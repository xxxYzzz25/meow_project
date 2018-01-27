<?php
ob_start();
session_start();
isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
<style>
    a{
        cursor: pointer;
        border-bottom: 1px solid #44f;
        color: #44f;
        text-decoration: none;
    }
</style>
</head>
<body>
<?php
try {
	require_once("connectBD103G2.php");
    $sql = "select HALF_PSW from halfway_member where HALF_NO=:no";
    $data = $pdo->prepare($sql);
    $data->bindParam(":no",$_REQUEST["no"]);
    $data->execute();
    $dataRow = $data -> fetchObject();
    $psw = $dataRow->HALF_PSW;

    if($_REQUEST["hwmempsw"] == $psw){
        $sql = "update halfway_member 
                set HALF_PSW=:psw, 
                    HALF_HEAD=:head
                where HALF_NO=:no";
        $products = $pdo->prepare( $sql );
        $products->bindValue(":no" , $_REQUEST["no"]);
        $products->bindValue(":psw" , $_REQUEST["hwmempsw"]);
        $products->bindValue(":head" , $_REQUEST["hwmemhead"]);
        $products->execute();
        echo "  <script>
                    alert('中途會員資料修改成功');
                    window.location.href = '../html/halfMem.php';
                </script> ";
    }else{
        $sql = "update halfway_member 
                set HALF_PSW=md5(:psw), 
                    HALF_HEAD=:head
                where HALF_NO=:no";
        $products = $pdo->prepare( $sql );
        $products->bindValue(":no" , $_REQUEST["no"]);
        $products->bindValue(":psw" , $_REQUEST["hwmempsw"]);
        $products->bindValue(":head" , $_REQUEST["hwmemhead"]);
        $products->execute();
        echo "  <script>
                    alert('中途會員資料修改成功');
                    window.location.href = '../html/halfMem.php';
                </script> ";
    }
} catch (Exception $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";	
}
?>
<script>
    window.addEventListener('load', ()=>{
        let back = document.getElementById('backNext')
        setTimeout(function back(){
            history.back()
        }, 5000)
        back.addEventListener('click', (e)=>{
            e.preventDefault();
            window.history.back()
        })
    })
</script>
</body>
</html>