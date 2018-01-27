<?php
ob_start();
session_start();
isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
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
	$sql="update cat set ADOPT_STATUS=:status
            where CAT_NO=:no";
	$products = $pdo->prepare( $sql );
	$products->bindValue(":no" , $_REQUEST["no"]);
	$products->bindValue(":status" , $_REQUEST["status"]);
	$products->execute();
	echo "  <script>
                alert('審核成功');
                window.location.href = '../html/halfMem.php';
            </script> ";
} catch (Exception $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";	
}
?>
</body>
</html>