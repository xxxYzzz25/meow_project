<?php
ob_start();
session_start();
?>
<div class="memOrderlist">
    <h4>查詢訂單記錄</h4>
    <p>以下是您的訂購紀錄：</p>
    <span>*提醒您，若您的未取件次數累計達5次(含)，將無法再使用超商取貨付款，造成不便及困擾之處，懇請見諒。</span>

<!-- try {
    require_once "../php/connectBD103G2.php";

    $sql       = "select * from orderlist o,member m
                where o.MEM_NO = m.MEM_NO
                and m.MEM_ID = ?";
    $orderlist = $pdo->prepare($sql);
    $orderlist->bindValue(1, $_SESSION["MEM_ID"]); //session
    $orderlist->execute();

    if ($orderlist->rowCount() == 0) {
        echo "<center>查無此訂單資料</center>";
    } else {
        while ($orderlistRow = $orderlist->fetchObject()) { -->

        <table>
            <tr>
                <th>訂單編號</th>
                <th>購買總金額</th>
                <th>訂購時間</th>
                <th>訂單狀態</th>
                <th>訂單明細</th>
            </tr>
            <tr>
                <td>1</td>
                <td>1000</td>
                <td>123</td>
                <td>555</td>
                <td><button>查看訂單詳情</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>1000</td>
                <td>123</td>
                <td>555</td>
                <td><button>查看訂單詳情</button></td>
            </tr>


<!-- }
    } //if...else
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤訊息 : ", $e->getMessage(), "<br>";
} -->


        </table>

    <h4>備註說明</h4>
    <h5>「集貨時間」說明：</h5>
    <p>
        <i class="fa fa-hand-o-right" aria-hidden="true"></i>訂單內商品皆有現貨庫存需1~3個工作天即可為您出貨</p>
    <p>
        <i class="fa fa-hand-o-right" aria-hidden="true"></i>訂單內有部分商品需要調貨需5~7個工作天即可為您出貨</p>
</div>
<script>
	let btn = document.getElementsByTagName('button');
	for (let i = 0; i < btn.length; i++) {
		btn[i].addEventListener('click', function () {
			let xhr = new XMLHttpRequest();
			xhr.onload=function(){
				let response = JSON.parse(xhr.responseText);
                response.name
                response.cover
                response.pname
                response.price
                response.count
                let table = document.createElement('table');
                let tr = document.createElement('tr');
                let th = document.createElement('th');
                let td = document.createElement('td');
                tr.appendChild(th);
                tr.appendChild(td);
                table.appendChild(tr);
			}
			let url = "../php/memOrderlistDetail.php?MEM_NO=<?php echo $_SESSION['MEM_ID'] ?>
                        &ORDER_NO=<?php echo $orderlistRow->ORDER_NO ?>";
			xhr.open("get", url, true);
			xhr.send(null);
		});
	}
</script>