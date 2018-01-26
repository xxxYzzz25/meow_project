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
    <link rel="stylesheet" href="../css/backReport.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-2.1.1.min.js"></script>
    <style>
        header .logo{
            top:30px;
        }
        .link{
            cursor:pointer;
            display: inline-block;
            padding: 4px 10px;
            margin-top: 20px;
        }
    </style>
    <title>檢舉審核</title>
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
            <a onclick="getData('../php/backReportArt.php');" class="link defaultBtn">文章</a>
            <a onclick="getData('../php/backReportMes.php');" class="link defaultBtn">留言</a>
            <div class="adoptInfomation" id="adoptInfomation"></div>
        </div>
    </div>
</body>
<script>
    function getData(pagename) {
        let xhr = new XMLHttpRequest();
        xhr.onload = function () {
            if (xhr.status == 200) {
                let content = document.getElementById('adoptInfomation');
                content.innerHTML = this.responseText;
                report()
            } else {
                alert(xhr.status);
            }
        }
        let url = pagename;
        xhr.open("get", url, true);
        xhr.send(null);
    }

    function report(){
        let input = document.querySelector('#ban')
        let inputRep = document.querySelector('#report')
        let form = document.querySelector('#reportForm')
        let ensure = document.querySelector('#ensureBtn')
        let cancel = document.querySelector('#cancelBtn')
        ensure.addEventListener('click', ()=>{
            form.submit()            
        })
        cancel.addEventListener('click', ()=>{
            input.value = "0"
            inputRep.value = "2"
            form.submit()
        })
    }


    let link = document.getElementsByClassName('link');
    for (let i = 0; i < link.length; i++) {
        link[i].addEventListener('click', function () {
            for (let i = 0; i < link.length; i++) {
                link[i].style.color = "#c2740f";
            }
            this.style.color = "#0f71c2";
        });
    }
</script>
<script src="../js/jquery.lazylinepainter-1.7.0.min.js"></script>
<script src="../js/guideSvg.js"></script>
</html>