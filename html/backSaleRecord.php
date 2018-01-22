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
    <title>查詢領養紀錄</title>
    <link rel="stylesheet" href="../css/backSaleRecord.css">
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
                <select name="sort" id="adobtOrder">
                    <option value="1">購買日期從新到舊</option>
                    <option value="2">購買日期從舊到新</option>
                </select>
                <table id="saleList">
                    <tr id="listTitle">
                        <th>訂單編號</th>
                        <th>購買人帳號</th>
                        <th>購買時間</th>
                        <th>出貨狀態</th>
                    </tr>

                </table>
                <div id="linkArea"></div>
            </div>
        </div>

    </div>
    <script>
        window.addEventListener('load', () => {

            function getData() {
                let obj = JSON.parse(this.responseText);
                let saleList = document.getElementById('saleList');
                let fragment = document.createDocumentFragment();
                let listLen = saleList.childElementCount;
                let linkArea = document.getElementById('linkArea');

                while (linkArea.firstChild) {
                    linkArea.removeChild(linkArea.firstChild);
                }
                for (let i = listLen; i > 1; i--) {
                    saleList.lastChild.remove();
                }
                for (const i of obj) {
                    let tr = document.createElement('tr');
                    let orderNoTd = document.createElement('td');
                    let memIdTd = document.createElement('td');
                    let timeTd = document.createElement('td');
                    let statusTd = document.createElement('td');
                    let orderNo = document.createTextNode(i["訂單編號"]);
                    let memId = document.createTextNode(i["購買人帳號"]);
                    let time = document.createTextNode(i["購買時間"]);
                    let status = document.createTextNode(i["出貨狀態"]);
                    orderNoTd.appendChild(orderNo);
                    memIdTd.appendChild(memId);
                    timeTd.appendChild(time);
                    statusTd.appendChild(status);
                    tr.appendChild(orderNoTd);
                    tr.appendChild(memIdTd);
                    tr.appendChild(timeTd);
                    tr.appendChild(statusTd);
                    fragment.appendChild(tr);
                }
                saleList.appendChild(fragment);

                ajax(showPages, `order=${order}&qty=${qty}&pages=true`);
            }

            function showPages() {
                let count = this.responseText;
                let linkArea = document.getElementById('linkArea');
                let fragment = document.createDocumentFragment();
                let pagesOne = document.createElement('a');
                pagesOne.textContent = 1;
                Object.assign(pagesOne, {
                    className: "defaultBtn"
                });
                pagesOne.addEventListener('click', changePages);
                fragment.appendChild(pagesOne);
                for (let i = 1; i < count; i++) {

                    if (i % limit == 0) {
                        let links = document.createElement('a');
                        links.textContent = (i / limit) + 1;
                        Object.assign(links, {
                            className: "defaultBtn"
                        });
                        links.addEventListener('click', changePages);
                        fragment.appendChild(links);
                    }

                }
                linkArea.appendChild(fragment);
            }

            function changePages() { //換頁面 ..第幾頁
                qty = (parseInt(this.textContent) - 1);
                let pagesQty = qty * limit;
                ajax(getData, `order=${order}&qty=${qty}`);
            }

            function changeOrder() { //換排序 1:降冪 2: 升冪
                order = this.value;
                let saleList = document.getElementById('saleList');
                let listLen = saleList.childElementCount;

                ajax(getData, `order=${order}&qty=${qty}`);
            }

            function ajax(cb, dataInfo) {

                let xhr = new XMLHttpRequest();
                xhr.open('post', '../php/backSaleRecord_s.php');
                xhr.onload = cb;
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                xhr.send(dataInfo);

            }

            let selector = document.getElementById('adobtOrder');
            let qty = 0;
            let limit = 20;
            let order = 1;
            selector.addEventListener('change', changeOrder);
            ajax(getData, `order=${order}&qty=${qty}`);
        });
    </script>
</body>

</html>