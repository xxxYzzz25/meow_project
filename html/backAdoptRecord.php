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
        <link rel="stylesheet" href="../css/backAdoptRecord.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="../js/jquery-2.1.1.min.js"></script>
        <style>
            header .logo{
                top:30px;
            }
        </style>
        <title>查詢領養紀錄</title>
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
                    <select name="sort" id="adoptOrder">
                        <option value="1">領養日期從新到舊</option>
                        <option value="2">領養日期從舊到新</option>
                    </select>
                    <table id="adoptList">
                        <tr id="listTitle">
                            <th>喵小孩編號</th>
                            <th>喵小孩名字</th>
                            <th>領養者</th>
                            <th>領養時間</th>
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
                    let adoptList = document.getElementById('adoptList');
                    let fragment = document.createDocumentFragment();
                    let listLen = adoptList.childElementCount;
                    let linkArea = document.getElementById('linkArea');

                    while (linkArea.firstChild) {
                        linkArea.removeChild(linkArea.firstChild);
                    }
                    for (let i = listLen; i > 1; i--) {
                        adoptList.lastChild.remove();
                    }
                    for (const i of obj) {
                        let tr = document.createElement('tr');
                        let catNoTd = document.createElement('td');
                        let catNameTd = document.createElement('td');
                        let memIdTd = document.createElement('td');
                        let timeTd = document.createElement('td');
                        let catNo = document.createTextNode(i["喵編號"]);
                        let catName = document.createTextNode(i["喵名字"]);
                        let memId = document.createTextNode(i["領養者"]);
                        let time = document.createTextNode(i["領養時間"]);
                        catNoTd.appendChild(catNo);
                        catNameTd.appendChild(catName);
                        memIdTd.appendChild(memId);
                        timeTd.appendChild(time);
                        tr.appendChild(catNoTd);
                        tr.appendChild(catNameTd);
                        tr.appendChild(memIdTd);
                        tr.appendChild(timeTd);
                        fragment.appendChild(tr);
                    }
                    adoptList.appendChild(fragment);

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
                    let adoptList = document.getElementById('adoptList');
                    let listLen = adoptList.childElementCount;
                    
                    ajax(getData, `order=${order}&qty=${qty}`);
                }

                function ajax(cb, dataInfo) {

                    let xhr = new XMLHttpRequest();
                    xhr.open('post', '../php/backadoptRecord_s.php');
                    xhr.onload = cb;
                    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                    xhr.send(dataInfo);

                }

                let selector = document.getElementById('adoptOrder');
                let qty = 0;
                let limit = 10;
                let order = 1;
                selector.addEventListener('change', changeOrder);
                ajax(getData, `order=${order}&qty=${qty}`);
            });
        </script>    
        <script src="../js/jquery.lazylinepainter-1.7.0.min.js"></script>
        <script src="../js/guideSvg.js"></script>

    </body>

    </html>