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
    

    //新增封面圖片
    $sql = "select count(PRODUCT_NO) count from product";
	$temt = $pdo->prepare($sql);
	$temt->execute();
	$temtRow = $temt->fetchObject();
    $count = $temtRow->count;
    if(isset($_FILES["upCover"])){
        if ($_FILES['upCover']['type'] == "image/gif" || $_FILES['upCover']['type'] == "image/png" || $_FILES['upCover']['type'] == "image/jpeg" || $_FILES['upCover']['type'] == "image/JPEG" || $_FILES['upCover']['type'] == "image/PNG" || $_FILES['upCover']['type'] == "image/GIF") {  
            switch($_FILES["upCover"]["error"]){
                case UPLOAD_ERR_OK:	
                    $dir = "../images/productPic";
                    if( file_exists($dir)===false){ //make directory
                        mkdir( $dir );    // 如果沒有$dir資料夾路徑 創建一個資料夾 路徑與名字=$dir
                    }
                    $fileType = strrchr($_FILES['upCover']['name'], '.');
                    $from = $_FILES['upCover']['tmp_name'];
                    $count = $count + 1;
                    $to = $dir . "/product" . $count . $fileType;
                    if(copy( $from, $to) ){
                        // 新增商品
                        $sql = "insert into
                                product (PRODUCT_NAME,PRODUCT_PART,PRODUCT_PRICE,PRODUCT_WEIGHT,PRODUCT_LOC,PRODUCT_COMPONENT,PRODUCT_SIZE,PRODUCT_NARRATIVE,PRODUCT_MATERIAL,PRODUCT_COVER)
                                values (:name , :part , :price , :weight , :loc , :component , :size , :narrative , :material , :productcover)";
                        $products = $pdo->prepare($sql);
                        $products->bindValue(":name", $_REQUEST["name"]);
                        $products->bindValue(":part", $_REQUEST["part"]);
                        $products->bindValue(":price", $_REQUEST["price"]);
                        $products->bindValue(":weight", $_REQUEST["weight"]);
                        $products->bindValue(":loc", $_REQUEST["loc"]);
                        $products->bindValue(":component", $_REQUEST["component"]);
                        $products->bindValue(":size", $_REQUEST["size"]);
                        $products->bindValue(":narrative", $_REQUEST["narrative"]);
                        $products->bindValue(":material", $_REQUEST["material"]);
                        $products->bindValue(":productcover" , $to);
                        $products->execute();


                        if(isset($_FILES["upFile"])){
                            foreach( $_FILES["upFile"]["error"] as $i=>$error){
                                if ($_FILES['upFile']['type'][$i] == "image/gif" || $_FILES['upFile']['type'][$i] == "image/png" || $_FILES['upFile']['type'][$i] == "image/jpeg" || $_FILES['upFile']['type'][$i] == "image/JPEG" || $_FILES['upFile']['type'][$i] == "image/PNG" || $_FILES['upFile']['type'][$i] == "image/GIF") {
                                    if(count($_FILES["upFile"]["name"]) < 4){
                                        switch($_FILES["upFile"]["error"][$i]){
                                            case UPLOAD_ERR_OK:	
                                                $dire = "../images/productDetailPic";
                                                if( file_exists($dire)===false){ //make directory
                                                    mkdir( $dire );    // 如果沒有$dir資料夾路徑 創建一個資料夾 路徑與名字=$dir
                                                }
                                                $type = strrchr($_FILES['upFile']['name'][$i], '.');
                                                $where = $_FILES['upFile']['tmp_name'][$i];
                                                $go = $dire . "/product" . $count . "-" . $i .$type;
                                                if(copy( $where, $go) ){
                                                    $sql2 = "insert into product_pic(PRODUCT_NO,PRODUCT_PIC_PATH)
                                                            values(:no,:productpic)";
                                                    $productmem = $pdo->prepare( $sql2 );
                                                    $productmem->bindValue(":no" , $count);
                                                    $productmem->bindValue(":productpic" , $go);
                                                    $productmem->execute();
                                                    echo "  <script>
                                                                alert('新增商品成功\\n商品圖片新增成功');
                                                                window.location.href = '../html/backProduct.php';
                                                            </script> ";
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
                                    }else{
                                        echo "<center>您上傳的圖片超過數量限制</center>";
                                    }
                                }else {
                                    echo "<center>檔案格式錯誤須為jpg/gif/png/jpeg</center>";
                                }
                            }
                        }

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
            window.history.back()
        }, 5000)
        back.addEventListener('click', (e)=>{
            e.preventDefault();
            window.history.back()
        })
    })
</script>
</body>
</html>