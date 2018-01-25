<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>會員登入</title>
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
    require_once "connectBD103G2.php";

    //新增喵大頭圖片
    $sql = "select count(c.CAT_NO) count, h.HALF_ID id 
            from cat c,halfway_member h
            where c.HALF_NO = h.HALF_NO
            and c.HALF_NO=?";
	$temt = $pdo->prepare($sql);
    $temt->bindValue(1, $_REQUEST["no"]);
	$temt->execute();
	$temtRow = $temt->fetchObject();
    $count = $temtRow->count;
    $id = $temtRow->id;
    if(isset($_FILES["upCover"])){
        if ($_FILES['upCover']['type'] == "image/gif" || $_FILES['upCover']['type'] == "image/png" || $_FILES['upCover']['type'] == "image/jpeg" || $_FILES['upCover']['type'] == "image/JPEG" || $_FILES['upCover']['type'] == "image/PNG" || $_FILES['upCover']['type'] == "image/GIF") {  
            switch($_FILES["upCover"]["error"]){
                case UPLOAD_ERR_OK:	
                    $dir = "../images/catPic/";
                    if( file_exists($dir)===false){ //make directory
                        mkdir( $dir );    // 如果沒有$dir資料夾路徑 創建一個資料夾 路徑與名字=$dir
                    }
                    $fileType = strrchr($_FILES['upCover']['name'], '.');
                    $from = $_FILES['upCover']['tmp_name'];
                    $to = $dir . $id . $count . $fileType;
                    if(copy( $from, $to) ){
                        // 新增喵喵
                        $sql = "insert into
                                cat (HALF_NO,CAT_NAME,CAT_DATE,CAT_SEX,CAT_NARRATIVE,CAT_COLOR,CAT_LOCATION,CAT_VACCINE,CAT_LIGATION,CAT_INDIVIDUALITY,CAT_FIT,CAT_ADVANTAGE,CAT_DISADVANTAGE,CAT_COVER)
                                values (:no,:name,:date,:sex,:narrative,:color,:location,:vaccine,:ligation,:individuality,:fit,:advantage,:disadvantage,:catpic)";
                        $products = $pdo->prepare($sql);
                        $products->bindValue(":no", $_REQUEST["no"]);
                        $products->bindValue(":name", $_REQUEST["name"]);
                        $products->bindValue(":date", $_REQUEST["date"]);
                        $products->bindValue(":sex", $_REQUEST["sex"]);
                        $products->bindValue(":narrative", $_REQUEST["narrative"]);
                        $products->bindValue(":color", $_REQUEST["color"]);
                        $products->bindValue(":location", $_REQUEST["location"]);
                        $products->bindValue(":vaccine", $_REQUEST["vaccine"]);
                        $products->bindValue(":ligation", $_REQUEST["ligation"]);
                        $products->bindValue(":individuality", $_REQUEST["individuality"]);
                        $products->bindValue(":fit", $_REQUEST["fit"]);
                        $products->bindValue(":advantage", $_REQUEST["advantage"]);
                        $products->bindValue(":disadvantage", $_REQUEST["disadvantage"]);
                        $products->bindValue(":catpic", $to);
                        $products->execute();
                        echo "<center>新增喵喵成功</center><br>
                            <center>喵喵大頭貼圖片新增成功</center><br>
                            <center>將在五秒後回到原網址</center><br>
                            <center><a id='backNext'>或者點此直接回到原網址</a></center>";
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
                    echo "<center>error code : " , $_FILES["upCover"]["error"][$i] , "</center>";
            }	
        }else {
            echo "<center>檔案格式錯誤須為jpg/gif/png/jpeg</center>";
        }
	}
} catch (Exception $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
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