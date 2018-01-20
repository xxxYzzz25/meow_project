<?php
try {
	require_once("../php/connectBD103G2.php");
	$NO = $_POST['CAT_NO'];
	$sql = "select * from cat where CAT_NO = $NO";
	$pic = $pdo->query($sql);
	$picRow = $pic->fetch();
	?>
    <i class="fa fa-times cancel" id="cancelQkv"></i><img src='<?php
	echo $picRow['CAT_COVER'];?>' alt='<?php
	echo $picRow['CAT_NAME'];?>'>
	<?php
} catch (PDOException $e) {
	echo "行號: ", $e->getLine(), "<br>";
	echo "訊息: ", $e->getMessage(), "<br>";
}
?>