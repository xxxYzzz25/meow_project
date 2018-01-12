<?php
	ob_start();
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Examples</title>
</head>
<body>
	<?php
		session_destroy();
	?>
	<div>已登出，歡迎再回來</div>
</body>
</html>