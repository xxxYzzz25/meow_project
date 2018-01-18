<?php
try {
    require_once "connectBD103G2.php";
    $sql = "insert into
            cat (CAT_NAME,,CAT_DATE,CAT_SEX,CAT_NARRATIVE,CAT_LOCATION,CAT_VACCINE,CAT_LIGATION,CAT_INDIVIDUALITY,CAT_FIT,CAT_ADVANTAGE,CAT_DISADVANTAGE,CAT_COVER)
            values (:name,:date,:sex,:narrative,:location,:vaccine,:ligation,:individuality,:fit,:advantage,:disadvantage,:catpic)
			where CAT_NO=:no";
    $products = $pdo->prepare($sql);
    $products->bindValue(":no", $_REQUEST["no"]);
    $products->bindValue(":name", $_REQUEST["name"]);
    $products->bindValue(":date", $_REQUEST["date"]);
    $products->bindValue(":sex", $_REQUEST["sex"]);
    $products->bindValue(":narrative", $_REQUEST["narrative"]);
    $products->bindValue(":location", $_REQUEST["location"]);
    $products->bindValue(":vaccine", $_REQUEST["vaccine"]);
    $products->bindValue(":ligation", $_REQUEST["ligation"]);
    $products->bindValue(":individuality", $_REQUEST["individuality"]);
    $products->bindValue(":fit", $_REQUEST["fit"]);
    $products->bindValue(":advantage", $_REQUEST["advantage"]);
    $products->bindValue(":disadvantage", $_REQUEST["disadvantage"]);
    $products->bindValue(":catpic", $_REQUEST["catpic"]);
    $products->execute();
    echo "新增成功<br>";
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
}
