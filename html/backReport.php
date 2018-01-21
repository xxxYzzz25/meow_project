<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檢舉審核</title>
    <link rel="stylesheet" href="../css/backReport.css">
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
            <a onclick="getData('backReportArt.php');" class="link">文章</a>
            <a onclick="getData('backReportMem.php');" class="link">留言</a>
            <div class="adoptInfomation" id="adoptInfomation"></div>
        </div>
    </div>
</body>
<script>
    function getData(pagename) {
        let xhr = new XMLHttpRequest();
        xhr.onload = function () {
            if (xhr.status == 200) {
                //modify here
                let content = document.getElementById('adoptInfomation');
                content.innerHTML = this.responseText;
            } else {
                alert(xhr.status);
            }
        }
        let url = pagename;
        xhr.open("get", url, true);
        xhr.send(null);
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
</html>