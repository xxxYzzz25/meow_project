<?php
 ob_start();
 session_start();
 isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../images/logo_icon.png" />
    <link rel="stylesheet" href="../css/backProduct.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-2.1.1.min.js"></script>
    <style>
        header .logo{
            top:30px;
        }
    </style>
    <title>寵物商品上下架</title>
</head>
<body>
    <header>
        <div class="logo">
            <h1>
                <div class="svg-space">
                    <div id="logo"></div>
                </div>
            </h1>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="backMemManage.php" title="會員帳號管理">會員帳號管理</a>
                </li>
                <li>
                    <a href="backEmpManage.php" title="員工帳號管理">員工帳號管理</a>
                </li>
                <li>
                    <a href="backHalfWay.php" title="中途之家審核">中途之家審核</a>
                </li>
                <li>
                    <a href="backReport.php" title="檢舉審核">檢舉審核</a>
                </li>
                <li>
                    <a href="backOrderlist.php" title="訂單管理">訂單管理</a>
                </li>
                <li>
                    <a href="backadoptRecord.php" title="領養紀錄查詢">領養紀錄查詢</a>
                </li>
                <li>
                    <a href="backSaleRecord.php" title="銷售紀錄查詢">銷售紀錄查詢</a>
                </li>
                <li>
                    <a href="backProduct.php" title="寵物商品上下架">寵物商品上下架</a>
                </li>
            </ul>
        </nav>
        <div class="icons">
            <a href='../index.html' id='loginBtn'>
                <i class='fa fa-sign-out fa-2x' aria-hidden='true'></i>
            </a>
        </div>
    </header>
    <div class="right">
        <div class="container container1">
            <div class="bigImg">
                <img src="../images/back/catAdoptRecord.jpg" alt="">
            </div>
            <div class="adoptInfomation" id="adoptInfomation">
                <!-- 新增商品開始 -->
                <button id="newEmp" class="defaultBtn">新增商品</button>
                <form action="../php/backProductInsertToDb.php" method="post" enctype="multipart/form-data">
	                <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                    <h4 class="newEmpTR newEmpTROff">新增一項商品 (*為必填項目)</h4>
                    <table>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品名稱*</th>
                            <td>
                                <input type="text" name="name" required="required">
                            </td>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品分類*</th>
                            <td>
                                <select name="part" required="required">
                                    <option></option>
                                    <option value="1">喵喵肚子餓</option>
                                    <option value="2">喵喵待在家</option>
                                    <option value="3">精選喵草</option>
                                    <option value="4">喵喵愛玩耍</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品價錢*</th>
                            <td>
                                $<input type="text" name="price" required="required">
                            </td>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品規格(如果不填就不會顯示在頁面哦)</th>
                            <td>
                                重量<input type="text" name="weight"><br>
                                產地<input type="text" name="loc"><br>
                                成分<input type="text" name="component"><br>
                                尺寸<input type="text" name="size"><br>
                                材質<input type="text" name="material">
                            </td>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品敘述*</th>
                            <td>
                                <textarea name="narrative" cols="50" rows="15" required="required"></textarea>
                            </td>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品封面圖片(只能選擇一張)*</th>
                            <td>
                                <input type="file" name="upCover" id="file" required="required">
                                <output id="coverList"></output>
                            </td>
                        </tr>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品圖片(最多可選擇三張)*</th>
                            <td>
                                <input type="file" name="upFile[]" multiple="multiple" id="files" required="required">
                                <output id="picList"></output>
                            </td>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <td colspan="2">
                                <button type="submit" id="ensureBtn" class="defaultBtn">確認新增</button>
                                <button type="reset" class="defaultBtn" id="resetBtn">清除內容</button>
                            </td>
                        </tr>
                </form>
                <!-- 新增商品結束 -->

                <!-- 商品資訊 -->
                <table>
                    <tr>
                        <th>商品編號</th>
                        <th>商品名稱</th>
                        <th>商品價錢</th>
                        <th>商品分類</th>
                        <th>商品狀態</th>
                        <th>商品詳情</th>
                        <th>上下架管理</th>
                    </tr>
<?php
try {
    require_once "../php/connectBD103G2.php";

    $sql     = "select * from product";
    $product = $pdo->prepare($sql);
    $product->execute();

    if ($product->rowCount() == 0) {
        echo "<center>查無商品資料</center>";
    } else {
        while ($productRow = $product->fetchObject()) {
            ?>
                    <tr class="ptr">
                        <td><?php echo $productRow->PRODUCT_NO; ?></td>
                        <td><?php echo $productRow->PRODUCT_NAME; ?></td>
                        <td>$<?php echo $productRow->PRODUCT_PRICE; ?></td>
                        <td>
                            <?php 
                                if($productRow->PRODUCT_PART == 1){
                                    echo "喵喵肚子餓";
                                }elseif($productRow->PRODUCT_PART == 2){
                                    echo "喵喵待在家";
                                }elseif($productRow->PRODUCT_PART == 3){
                                    echo "精選喵草";
                                }else{
                                    echo "喵喵愛玩耍";
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                if($productRow->PRODUCT_STATUS == 0){
                                    echo "商品上架中";
                                }else{
                                    echo "商品下架中";
                                }
                            ?>
                        </td>
                        <td>
                            <button class="defaultBtn" onclick="add('../php/backProductDetail.php?PRODUCT_NO=<?php echo $productRow->PRODUCT_NO; ?>');">商品詳情</button>
                        </td>
                        <td>
                            <form action="../php/backProductUpDown.php">
                                <input type="hidden" value="<?php echo ($productRow->PRODUCT_STATUS == 0)? "1" :"0"?>" name="down">
                                <input type="hidden" value="<?php echo $productRow->PRODUCT_NO; ?>" name="productno">
                                <button type="submit" class="defaultBtn">
                                <?php echo ($productRow->PRODUCT_STATUS == 0)? "下架" : "上架" ?> 
                                </button>
                            </form>
                        </td>
                    </tr>
<?php
}
    } //if...else
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤訊息 : ", $e->getMessage(), "<br>";
}
?>
                </table>
            </div>
        </div>
    </div>

<script>
    window.addEventListener('load', function () {
        let newEmp = document.getElementById('newEmp');
        newEmp.addEventListener('click', function newEmp() {
            let tr = document.getElementsByClassName('newEmpTR');
            if (tr[0].className.match('newEmpTROff')) {
                tr[0].className =
                    tr[0].className.replace('newEmpTROff', 'newblock');
                for (let i = 0; i < tr.length; i++) {
                    tr[i].className =
                        tr[i].className.replace('newEmpTROff', 'newEmpTROn');
                }
                let newEmp = document.getElementById('newEmp');
                newEmp.innerHTML = "取消新增商品";
            } else {
                tr[0].className =
                    tr[0].className.replace('newblock', 'newEmpTROff');
                for (let i = 0; i < tr.length; i++) {
                    tr[i].className =
                        tr[i].className.replace('newEmpTROn', 'newEmpTROff');
                }
                let newEmp = document.getElementById('newEmp');
                newEmp.innerHTML = "新增商品";
            }
        });

        let ensureBtn = document.getElementById('ensureBtn')
        ensureBtn.addEventListener('click', function () {
            confirm('您確定要新增嗎?');
        });
                
        document.getElementById('file').addEventListener('change', function(evt){
            let files = evt.target.files;
            for (let i = 0, f; f = files[i]; i++) {
                let reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) {
                    let span = document.createElement('span');
                    span.innerHTML = ['<img class="filePic" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    
                    document.getElementById('coverList').insertBefore(span, null);
                    };
                })(f);
                reader.readAsDataURL(f);
            }
            document.getElementById('resetBtn').addEventListener('click', function(){
                document.getElementById('coverList').textContent='';
            });
        });

        document.getElementById('files').addEventListener('change', function(evt){
            let files = evt.target.files;
            for (let i = 0, f; f = files[i]; i++) {
                let reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) {
                    let span = document.createElement('span');
                    span.innerHTML = ['<img class="filePic" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    document.getElementById('picList').insertBefore(span, null);
                    };
                })(f);
                reader.readAsDataURL(f);
            }
            document.getElementById('resetBtn').addEventListener('click', function(){
                document.getElementById('picList').textContent='';
            });
        });
    })

    function add(data) {
        event.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.onload = function () {
            if (xhr.status == 200) {
                //modify here
                let pro = document.getElementById('adoptInfomation');
                pro.innerHTML = this.responseText;

                let backPre = document.getElementById('backPre');
                backPre.addEventListener('click',function () {
                    window.location.reload();
                });
                

            } else {
                alert(xhr.status);
            }
        }
        let url = data;
        xhr.open("get", url, true);
        xhr.send(null);
    }
</script>
<script src="../js/jquery.lazylinepainter-1.7.0.min.js"></script>
<script src="../js/guideSvg.js"></script>
</body>

</html>