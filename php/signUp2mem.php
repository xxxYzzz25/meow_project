<?php
    try{
		require_once("connectBD103G2.php");

		$name = $_POST['userName'];
		$id = $_POST['userId'];
		$psw = $_POST['userPsw'];
		$tel = $_POST['userTel'];
		$birth = $_POST['userBirth'];
		$address = $_POST['userAddress'];

		$sql = "select * from member where MEM_Id = ?";
		$stmt = $pdo -> prepare($sql);
		$stmt -> bindValue(1, $id);
		$stmt -> execute();
		if ($stmt -> rowCount() != 0){
			echo "<center>帳號已存在！</center>";
			return;
		}else{
			if ($_FILES['image']['error'] === 0) {
				$dir = "../images/memberPic/$id";
				if (file_exists($dir) === false) {	// 如果沒有$dir資料夾路徑
					mkdir($dir);	// 創建一個資料夾 路徑與名字=$dir
				}

				$source = $_FILES['image']['tmp_name'];
				$dest = $dir."/".$id.$_FILES['image']['name'];
				if (move_uploaded_file($source, $dest)) {
					if ( $name != null && $id != null && $psw != null && $tel != null && $birth != null && $address != null && $dest != null) {
						$sql = "insert into MEMBER set MEM_Name = ?,
							MEM_ID = ?,
							MEM_PSW = ?,
							MEM_TEL = ?,
							MEM_BIRTHDAY = ?,
							MEM_ADDRESS = ?,
							MEM_PIC = ?";
						$stmt = $pdo -> prepare( $sql );
						$stmt -> bindValue(1, $name);
						$stmt -> bindValue(2, $id);
						$stmt -> bindValue(3, MD5($psw));
						$stmt -> bindValue(4, $tel);
						$stmt -> bindValue(5, $birth);
						$stmt -> bindValue(6, $address);
						$stmt -> bindValue(7, $dest);
						$stmt -> execute();
						echo "<center>註冊成功</center><br>";
					}else{
						echo "<center>您的資料輸入未完全, 請檢查</center>";
					}
				}else{
					echo "<center>上傳圖片至伺服器失敗</center>";
				}
			}elseif ($_FILES['image']['error'] === 1) {
				echo "<center>上傳檔案太大, 不可超過", ini_get("upload_max_filesize"),"</center>";
			}elseif ($_FILES['image']['error'] === 2) {
				echo "<center>上傳檔案太大, 不可超過", $_POST['MAX_FILE_SIZE'],"Byte(1kb)</center>";
			}elseif ($_FILES['image']['error'] === 3) {
				echo "<center>上傳檔案不完整, 請檢查您的網路狀態</center>";
			}elseif ($_FILES['image']['error'] === 4) {
				echo "<center>未指定上傳檔案, 請重新確認</center>";
			}
			else{
				echo "<center>上傳圖片失敗</center>";
			}
		}
    }catch (Exception $e) {
		echo "<center>因為小精靈在搗亂伺服器所以失敗了唷<br>請稍後再試</center>";
	}
	echo "<script type='text/javascript'>back()</script>";
	echo "<center>將在五秒後回到原網址</center>";
?>
<script type='text/javascript'>
	setTimeout(function back(){
		history.back()
	}, 5000)
</script>