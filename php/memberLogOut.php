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
	<script>alert('已登出，歡迎再回來')</script>
	<script>history.back()</script>

</body>
</html>