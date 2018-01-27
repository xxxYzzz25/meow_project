<?php
ob_start();
session_start();
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
    require_once "connectBD103G2.php";
    if(isset($_SESSION["MEM_NO"])==null && isset($_SESSION["HALF_NO"])==null){
            echo '請先登入!';
    }else{

        if(isset($_REQUEST["list"])){
            $prodList = json_decode($_REQUEST["list"],true);
            
        }
        if(isset($_SESSION["HALF_NO"])==null){
            $who = "MEM_NO";
            $no = $_SESSION["MEM_NO"];
        }else if(isset($_SESSION["MEM_NO"])==null){
                $who = "HALF_NO";
                $no = $_SESSION["HALF_NO"];
        }
        
        if(isset($_REQUEST["discount"])){
            $whoTable = $who == "MEM_NO" ? "MEMBER" : "HALFWAY_MEMBER";
            $whoDiscount = $who == "MEM_NO" ? "MEM_DISCOUNT" : "HALF_DISCOUNT";
            $sql = "update $whoTable set $whoDiscount = 2 where $who = $no";
            $pdo -> query($sql);
        }

        $sql1 = "insert into orderlist ($who,ORDER_PRICE,CUS_NAME,CUS_ADDRESS,CUS_TEL,ORDER_TIME,CUS_PAYMENT,CUS_RECIPIENT) 
                            VALUES ($no,:price,:name,:add,:tel,NOW(),:pay,:delivery)";
        $data = $pdo->prepare($sql1);
        $data -> bindValue(":price", $_REQUEST["price"]);
        $data -> bindValue(":name", $_REQUEST["name"]);
        $data -> bindValue(":add", $_REQUEST["address"]);
        $data -> bindValue(":pay", $_REQUEST["pay"]);
        $data -> bindValue(":tel", $_REQUEST["tel"]);
        $data -> bindValue(":delivery", $_REQUEST["delivery"]);
        $data -> execute();
        $orderNo = $pdo -> lastInsertId();

        foreach ($prodList as $key) {
            $name = $key["name"];
            $sql = "select PRODUCT_NO from PRODUCT where PRODUCT_NAME = '$name'";
            $data = $pdo -> query($sql);
            $dataRow = $data -> fetchObject();
            $no = $dataRow -> PRODUCT_NO;

            $name = $key["name"];
            $price = $key["price"];
            $count = $key["count"];
            $sql = "insert into orderlist_details (order_no,PRODUCT_NO,PRODUCT_PRICE,COUNT)
                values ($orderNo,$no,$price,$count)";
            $pdo -> query($sql);
        }

    }
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
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