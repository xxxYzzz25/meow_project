<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
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
	$sql = "select HALF_ID from halfway_member where HALF_NO = :no";
	$temt = $pdo->prepare($sql);
	$temt->bindValue(":no" , $_REQUEST["no"]);
	$temt->execute();
	$temtRow = $temt->fetchObject();
	$id = $temtRow->HALF_ID;
	if(isset($_FILES["upFile"])){
		foreach( $_FILES["upFile"]["error"] as $i=>$error){
			// if ($_FILES['upFile']['type'][$i] == "image/gif" || $_FILES['upFile']['type'][$i] == "image/png" || $_FILES['upFile']['type'][$i] == "image/jpeg" || $_FILES['upFile']['type'][$i] == "image/JPEG" || $_FILES['upFile']['type'][$i] == "image/PNG" || $_FILES['upFile']['type'][$i] == "image/GIF") {
				switch($_FILES["upFile"]["error"][$i]){
					case UPLOAD_ERR_OK:	
						$dir = "../images/halfwayPic";
						if( file_exists($dir)===false){ //make directory
							mkdir( $dir );    // 如果沒有$dir資料夾路徑 創建一個資料夾 路徑與名字=$dir
						}
						$fileType = strrchr($_FILES['upFile']['name'][$i], '.');
						$from = $_FILES['upFile']['tmp_name'][$i];
						$to = $dir . "/" . $id . $i .$fileType;
						if(copy( $from, $to) ){
							$sql = "insert into half_pic(HALF_NO,HALF_PIC_PATH)
									values(:no,:halfpic)";
							$halfmem = $pdo->prepare( $sql );
							$halfmem->bindValue(":no" , $_REQUEST["no"]);
							$halfmem->bindValue(":halfpic" , $to);
							$halfmem->execute();
							echo "<center>照片新增成功</center>";
						}else{
							echo "<center>上傳圖片至伺服器失敗</center>";
						}	
						break;
					case 1:
						echo "<center>上傳檔案太大, 不可超過" , ini_get("upload_max_filesize") , "</center>"; //ini_get
						break;
					case 2:
						echo "<center>上傳檔案太大, 不可超過" , $_POST["MAX_FILE_SIZE"] , "</center>"; //ini_get
						break;	
					case 3:
						echo "<center>上傳檔案不完整</center>";
						break;	
					case 4:
						echo "<center>尚未挑選檔案</center>";
						break;
					default:
						echo "<center>error code : " , $_FILES["upFile"]["error"][$i] , "</center>";
				}	
			// }else {s
			// 	echo "<center>檔案格式錯誤須為jpg/gif/png/jpeg</center>";
			// }
		}
	}
	
	$sql = "update halfway_member
			set HALF_NAME=:name, 
				HALF_ADDRESS=:address, 
				HALF_TEL=:tel, 
				HALF_OPEN=:open, 
				HALF_INTRO=:intro
			where HALF_NO=:no";
	$halfmem = $pdo->prepare( $sql );
	$halfmem->bindValue(":no" , $_REQUEST["no"]);
	$halfmem->bindValue(":name" , $_REQUEST["name"]);
	$halfmem->bindValue(":address" , $_REQUEST["address"]);
	$halfmem->bindValue(":tel" , $_REQUEST["tel"]);
	$halfmem->bindValue(":open" , $_REQUEST["open"]);
	$halfmem->bindValue(":intro" , $_REQUEST["intro"]);
	$halfmem->execute();
	echo "<center>中途資料編輯成功</center><br>
        <center>將在五秒後回到原網址</center><br>
        <center><a id='backNext'>或者點此直接回到原網址</a></center>";
} catch (Exception $e) {
	echo "錯誤原因 : " , $e->getMessage() , "<br>";
	echo "錯誤行號 : " , $e->getLine() , "<br>";	
}
?>
<script>
    window.addEventListener('load', ()=>{
        let back = document.getElementById('backNext')
        setTimeout(function back(){
            history.back()
        }, 5000)
        back.addEventListener('click', (e)=>{
            e.preventDefault();
            window.history.back()
        })
    })
</script>
</body>
</html>