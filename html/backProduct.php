<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>寵物商品上下架</title>
    <link rel="stylesheet" href="../css/backProduct.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
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
                    <a href="backAdobtRecord.php" title="領養紀錄查詢">領養紀錄查詢</a>
                </li>
                <li>
                    <a href="backSaleRecord.php" title="銷售紀錄查詢">銷售紀錄查詢</a>
                </li>
                <li>
                    <a href="backProduct.php" title="寵物商品上下架">寵物商品上下架</a>
                </li>
            </ul>
        </nav>
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
                    <h4 class="newEmpTR newEmpTROff">新增一項商品</h4>
                    <table>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品名稱</th>
                            <td>
                                <input type="text" name="name">
                            </td>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品分類</th>
                            <td>
                                <select name="part">
                                    <option>請選擇</option>
                                    <option value="1">喵喵肚子餓</option>
                                    <option value="2">喵喵待在家</option>
                                    <option value="3">精選喵草</option>
                                    <option value="4">喵喵愛玩耍</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品價錢</th>
                            <td>
                                $<input type="text" name="price">
                            </td>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品規格</th>
                            <td>
                                重量<input type="text" name="weight"><br>
                                產地<input type="text" name="loc"><br>
                                成分<input type="text" name="component"><br>
                                尺寸<input type="text" name="size">
                            </td>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品敘述</th>
                            <td>
                                <textarea name="narrative" id="" cols="50" rows="15"></textarea>
                            </td>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <th>商品圖片(最多可選擇三張)</th>
                            <td>
                                <input type="file" name=" upFile[]" multiple="multiple">
                            </td>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <td colspan="2">
                                <button type="submit" id="ensureBtn" class="defaultBtn">確認新增</button>
                                <button type="reset" class="defaultBtn">清除內容</button>
                            </td>
                        </tr>
                </form>
                <!-- 新增商品結束 -->

                <!-- 商品資訊 -->
                <table id="adoptInfomation">
                    <tr>
                        <th>商品編號</th>
                        <th>商品名稱</th>
                        <th>商品價錢</th>
                        <th>商品狀態</th>
                        <th>商品明細</th>
                    </tr>
<?php
    try {
        require_once "../php/connectBD103G2.php";

        $sql = "select * from product";
        $product = $pdo->prepare($sql);
        $product->execute();

        if ($product->rowCount() == 0) {
            echo "<center>查無商品資料</center>";
        } else {
            while ($productRow = $product->fetchObject()) {
?>
                    <tr>
                        <td><?php echo $productRow->PRODUCT_NO; ?></td>
                        <td><?php echo $productRow->PRODUCT_NAME; ?></td>
                        <td>$<?php echo $productRow->PRODUCT_PRICE; ?></td>
                        <td><?php echo $productRow->PRODUCT_STATUS; ?></td>
                        <td>
                            <button class="defaultBtn" onclick="add('../php/backProductDetail.php?PRODUCT_NO=<?php echo $productRow->PRODUCT_NO; ?>');">商品詳情</button>
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
        })
        let ensureBtn = document.getElementById('ensureBtn')
        ensureBtn.addEventListener('click', function () {
            confirm('您確定要新增嗎?')
        })
    })
</script>
<script>
    function add(data) {
        event.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.onload = function () {
            if (xhr.status == 200) {
                //modify here
                let pro = document.getElementById('adoptInfomation');
                pro.innerHTML = this.responseText;

                let back = document.getElementById('back');
                back.addEventListener('click',function () {
                    window.location.reload();
            } else {
                alert(xhr.status);
            }
        }
        let url = data;
        xhr.open("get", url, true);
        xhr.send(null);
    }
</script>
</body>

</html>