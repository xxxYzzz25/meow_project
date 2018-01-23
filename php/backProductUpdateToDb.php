<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>會員登入</title>
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
    $sql = "update product set PRODUCT_NAME=:name,
                                PRODUCT_PART=:part,
                                PRODUCT_PRICE=:price,
                                PRODUCT_WEIGHT=:weight,
                                PRODUCT_LOC=:loc,
                                PRODUCT_COMPONENT=:component,
                                PRODUCT_SIZE=:size,
                                PRODUCT_NARRATIVE=:narrative
            where PRODUCT_NO=:no";
    $products = $pdo->prepare($sql);
    $products->bindValue(":no", $_REQUEST["no"]);
    $products->bindValue(":name", $_REQUEST["name"]);
    $products->bindValue(":part", $_REQUEST["part"]);
    $products->bindValue(":price", $_REQUEST["price"]);
    $products->bindValue(":weight", $_REQUEST["weight"]);
    $products->bindValue(":loc", $_REQUEST["loc"]);
    $products->bindValue(":component", $_REQUEST["component"]);
    $products->bindValue(":size", $_REQUEST["size"]);
    $products->bindValue(":narrative", $_REQUEST["narrative"]);
    $products->execute();
    echo "<center>修改成功</center><br>
        <center>將在五秒後回到原網址</center><br>
        <center><a id='backNext'>或者點此直接回到原網址</a></center>";
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