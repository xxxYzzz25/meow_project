<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>中途之家註冊</title>
	<style>
        a {
            cursor: pointer;
            color: #44f;
        }
    </style>
</head>
<body>
<?php
try {
	require_once("connectBD103G2.php");

	$name = $_POST['userName'];
	$id = $_POST['userId'];
	$psw = $_POST['userPsw'];
	$tel = $_POST['userTel'];
	$head = $_POST['userHead'];
	$address = $_POST['userAddress'];

	$sql = "select * from halfway_member where half_Id = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(1, $id);
	$stmt->execute();
	if ($stmt->rowCount() != 0) {
		echo "<script>alert('帳號已存在！')</script>";
		return;
	} else {
		if (!isset($_FILES['image'])) {
			echo "<script>alert('請上傳大頭貼!')</script>";
		} else if (($_FILES['image']['type'] == "image/gif" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/JPEG" || $_FILES['image']['type'] == "image/PNG" || $_FILES['image']['type'] == "image/GIF")) {
			if ($_FILES['image']['error'] === 0) {
				$dir = "../images/halfMemberPic";
				if (file_exists($dir) === false) {    // 如果沒有$dir資料夾路徑
					mkdir($dir);    // 創建一個資料夾 路徑與名字=$dir
				}
				$fileType = substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.'));
				$source = $_FILES['image']['tmp_name'];
				$dest = $dir . "/$id" . $fileType;
				if (move_uploaded_file($source, $dest)) {
					if ($name != null && $id != null && $psw != null && $tel != null && $head != null && $address != null && $dest != null) {
						$sql = "insert into HALFWAY_MEMBER set HALF_Name = ?,
									HALF_ID = ?,
									HALF_PSW = ?,
									HALF_TEL = ?,
									HALF_HEAD = ?,
									HALF_ADDRESS = ?,
									HALF_COVER = ?";
						$stmt = $pdo->prepare($sql);
						$stmt->bindValue(1, $name);
						$stmt->bindValue(2, $id);
						$stmt->bindValue(3, MD5($psw));
						$stmt->bindValue(4, $tel);
						$stmt->bindValue(5, $head);
						$stmt->bindValue(6, $address);
						$stmt->bindValue(7, $dest);
						$stmt->execute();
						echo "<script>alert('註冊成功\\n請靜候審核')</script>";
					} else {
						echo "<script>alert('您的資料輸入未完全, 請檢查')</script>";
					}
				} else {
					echo "<script>alert('上傳圖片至伺服器失敗')</script>";
				}
			} elseif ($_FILES['image']['error'] === 1) {
				echo "<center>上傳檔案太大, 不可超過", ini_get("upload_max_filesize"), "</center>";
			} elseif ($_FILES['image']['error'] === 2) {
				echo "<center>上傳檔案太大, 不可超過", $_POST['MAX_FILE_SIZE'], "Byte(1024kb)</center>";
			} elseif ($_FILES['image']['error'] === 3) {
				echo "<script>alert('上傳檔案不完整, 請檢查您的網路狀態')</script>";
			} elseif ($_FILES['image']['error'] === 4) {
				echo "<script>alert('未指定上傳檔案, 請重新確認')</script>";
			} else {
				echo "<script>alert('上傳圖片失敗')</script>";
			}
		} else {
			echo "<script>alert('檔案格式錯誤須為jpg/gif/png/jpeg<')/script>";
		}
	}
} catch (Exception $e) {
	echo "<script>alert('因為小精靈在搗亂伺服器所以失敗了唷\\n請稍後再試')</script>";
}
echo"<script>
		history.back()
	</script>";

?>
</body>
</html>