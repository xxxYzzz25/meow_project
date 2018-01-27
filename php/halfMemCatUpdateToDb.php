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
    $sql = "update cat set CAT_NAME=:name,
							CAT_DATE=:date,
							CAT_SEX=:sex,
							CAT_NARRATIVE=:narrative,
							CAT_COLOR=:color,
							CAT_LOCATION=:location,
							CAT_VACCINE=:vaccine,
							CAT_LIGATION=:ligation,
							CAT_INDIVIDUALITY=:individuality,
							CAT_FIT=:fit,
							CAT_ADVANTAGE=:advantage,
							CAT_DISADVANTAGE=:disadvantage
			where CAT_NO=:no";
    $products = $pdo->prepare($sql);
    $products->bindValue(":no", $_REQUEST["no"]);
    $products->bindValue(":name", $_REQUEST["name"]);
    $products->bindValue(":date", $_REQUEST["date"]);
    $products->bindValue(":sex", $_REQUEST["sex"]);
    $products->bindValue(":narrative", $_REQUEST["narrative"]);
    $products->bindValue(":color", $_REQUEST["color"]);
    $products->bindValue(":location", $_REQUEST["location"]);
    $products->bindValue(":vaccine", $_REQUEST["vaccine"]);
    $products->bindValue(":ligation", $_REQUEST["ligation"]);
    $products->bindValue(":individuality", $_REQUEST["individuality"]);
    $products->bindValue(":fit", $_REQUEST["fit"]);
    $products->bindValue(":advantage", $_REQUEST["advantage"]);
    $products->bindValue(":disadvantage", $_REQUEST["disadvantage"]);
    $products->execute();
    echo "  <script>
                alert('修改成功');
                window.location.href = '../html/halfMem.php';
            </script> ";
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
?>
</body>
</html>