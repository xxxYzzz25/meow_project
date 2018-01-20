<?
ob_start();
session_start();
try {
	require_once("../php/connectBD103G2.php");
	if (isset($_SESSION['MEM_NO'])) {
		$NO = $_POST['LIKE_NO'];
		$LIKE = $_POST['LIKE'];
		$MEM = $_SESSION['MEM_NO'];
		if ($LIKE == 1) {
			$sql = "INSERT INTO `FAVORITE` (`CAT_NO`, `MEM_NO`)VALUES($NO, $MEM);";
			$like = $pdo->query($sql);
		} else if ($LIKE == 0) {
			$sql = "delete from `FAVORITE` where `CAT_NO` = $NO and `MEM_NO` = $MEM";
			$dislike = $pdo->query($sql);
		}
	} else {
		echo "<script>alert('error')</script>";
	}

} catch (PDOException $e) {
	echo "行號: ", $e->getLine(), "<br>";
	echo "訊息: ", $e->getMessage(), "<br>";
}


?>