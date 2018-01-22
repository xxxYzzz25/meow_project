<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>訂單管理</title>
    <link rel="stylesheet" href="../css/backOrderlist.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="backMemManage.html" title="會員帳號管理">會員帳號管理</a>
                </li>
                <li>
                    <a href="backEmpManage.html" title="員工帳號管理">員工帳號管理</a>
                </li>
                <li>
                    <a href="backHalfWay.html" title="中途之家審核">中途之家審核</a>
                </li>
                <li>
                    <a href="backReport.html" title="檢舉審核">檢舉審核</a>
                </li>
                <li>
                    <a href="backOrderlist.html" title="訂單管理">訂單管理</a>
                </li>
                <li>
                    <a href="backAdobtRecord.html" title="領養紀錄查詢">領養紀錄查詢</a>
                </li>
                <li>
                    <a href="backSaleRecord.html" title="銷售紀錄查詢">銷售紀錄查詢</a>
                </li>
                <li>
                    <a href="backProduct.html" title="寵物商品上下架">寵物商品上下架</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="right">
        <div class="container container1">
            <div class="bigImg">
                <img src="../images/back/catAdoptRecord.jpg" alt="">
            </div>
            <div class="adoptInfomation">
<?php
try {
    require_once "../php/connectBD103G2.php";

    $sql = "select count(*) from orderlist";    // 計算資料筆數
	$total = $pdo->query($sql);
	$rownum = $total->fetchcolumn();                            // 總共欄位數
	$perPage = 10;                                               // 每頁顯示筆數
	$totalpage = ceil($rownum / $perPage);                      // 計算總頁數
	$pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
	// 若無當前頁數則進入第一頁 若有則進入該頁
	$start = ($pageNo - 1) * $perPage;   
	// 設定每頁呈現內容
    $sql = "select * from orderlist order by ORDER_NO desc limit $start, $perPage";
    $orderlist = $pdo->prepare($sql);
    $orderlist->execute();

    if ($orderlist->rowCount() == 0) {
        echo "<center>查無此訂單資料</center>";
    } else {
?>
            <table>
                <tr>
                    <th>訂單編號</th>
                    <th>客戶名字</th>
                    <th>購買總金額</th>
                    <th>訂單時間</th>
                    <th>訂單狀態</th>
                    <th>訂單明細</th>
                </tr>
<?php
        while ($orderlistRow = $orderlist->fetchObject()) {
?>
                <tr>
                    <td><?php echo $orderlistRow->ORDER_NO; ?></td>
                    <td><?php echo $orderlistRow->CUS_NAME; ?></td>
                    <td><?php echo $orderlistRow->ORDER_PRICE; ?></td>
                    <td><?php echo $orderlistRow->ORDER_TIME; ?></td>
                    <td><?php
                        if( $orderlistRow->ORDER_STATUS == 0){
                            echo "商品尚未出貨";
                        }elseif($orderlistRow->ORDER_STATUS == 1){
                            echo "商品運送中";
                        }else{
                            echo "訂單已完成";
                        }
                    ?></td>
                    <td><button class="defaultBtn" onclick="add('../php/memOrderlistDetail.php?ORDER_NO=<?php echo $orderlistRow->ORDER_NO; ?>');">訂單詳情</button></td>
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
        <table id="odTable" class="odTable"></table>
        <div class="page">
            <?php
                for ($i = 1; $i <= $totalpage; $i++) {
                    echo "<a href='?pageNo=$i' class='pageNo defaultBtn'>" . $i . "</a>";
                }
            ?>
        </div>
        </div>
    </div>
</div>
<script>
    function add(data) {
        let xhr = new XMLHttpRequest();
        xhr.onload = function () {
            if (xhr.status == 200) {
                //modify here
                let odTable = document.getElementById('odTable');
                odTable.innerHTML = this.responseText;
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