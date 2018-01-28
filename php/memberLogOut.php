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
		#backNext{
			cursor: pointer;
			color: #44f;
		}
	</style>
</head>
<body>
	<?php
		session_destroy();

	?>
	<script>
		if(localStorage.getItem('memNo')){

			localStorage.removeItem('memNo');

		}else if(localStorage.getItem('halfNo')){

			localStorage.removeItem('halfNo');

		}
	</script>
	
	<?php
		if(isset($_REQUEST['memOut'])){
			echo "<script>alert('已登出，歡迎再回來')</script>";
			echo "<script>location.href = '../homepage.php'</script>";
		}else{
			echo "<script>alert('已登出，歡迎再回來')</script>";
			echo "<script>history.back()</script>";
		}
	?>
	

</body>
</html>