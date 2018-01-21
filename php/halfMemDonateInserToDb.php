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
    $sql1 = "select d.CAT_NO
            from donate d,cat c,halfway_member h
            where d.CAT_NO = c.CAT_NO
            and c.HALF_NO = h.HALF_NO
            and c.HALF_NO = :no
            and c.CAT_NAME = :catName";
    $catno = $pdo->prepare($sql1);
    $catno->bindValue(":no", $_REQUEST["no"]);
    $catno->bindValue(":catName", $_REQUEST["catName"]);
    $catno->execute();

    $sql2 = "insert into donate(CAT_NO,DONATE_NAME,DONATE_PRICE,DONATE_DATE) VALUES (:catNo,:memName,:price,curdate())";
    $donate = $pdo->prepare($sql2);
    $donate->bindValue(":catNo", $_REQUEST["catNo"]);
    $donate->bindValue(":memName", $_REQUEST["memName"]);
    $donate->bindValue(":price", $_REQUEST["price"]);
    $donate->execute();

    echo "<center>新增成功</center><br>
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