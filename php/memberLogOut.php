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
	<center>已登出，歡迎再回來</center><br>
	<center>將在五秒後回到上一頁</center>
	<center><a id="backNext">或點我回到上一頁</a></center>
	<script>
    window.addEventListener('load', () => {
		let back = document.getElementById('backNext')
		setTimeout(function(){
			window.history.back()
		}, 5000)
		back.addEventListener('click', (e) => {
			e.preventDefault();
			window.history.back()
		})
	})
	</script>
</body>
</html>