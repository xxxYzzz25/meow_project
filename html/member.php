<!DOCTYPE html>
<?php
    ob_start();
    session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>會員專區</title>
    <link rel="stylesheet" href="../css/member.css">
    <script src="https://use.fontawesome.com/533f4a82f0.js"></script>
</head>

<body onload="getData('memInfo.php');">
    <header>
        <div class="logo">
            <a href="../index.php">
                <h1>
                    <img src="../images/logo_white.png" alt="尋喵啟事" title="回首頁">
                </h1>
            </a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="catSearch.php">尋喵</a>
                </li>
                <li>
                    <a href="halfway_house_search.php">中途之家</a>
                </li>
                <li>
                    <a href="Cat_ShoppingStore.php" title="前往商城">商城</a>
                </li>
                <li>
                    <a href="forum.php">討論區</a>
                </li>
                <li>
                    <a href="member.html">會員專區</a>
                </li>
            </ul>
        </nav>
        <div class="icons">
            <a href="#">
                <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
            </a>
            <a href="#">
                <i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
            </a>
            <a href="#">
                <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
            </a>
        </div>
    </header>

    <div class="right">
        <div class="bigImg"></div>
        <div class="container">
            <h2>我的會員專區</h2>
            <div class="leftselect">
                <div class="lefttitle">
                    <img src="../images/left_list_title2.jpg" alt="">
                </div>
                <div class="leftlist">
                    <ul>
                        <li onclick="getData('memInfo.php');" class="li">
                            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> 修改會員資料
                        </li>
                        <li onclick="getData('memOrderlist.php');" class="li">
                            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> 查詢訂單記錄
                        </li>
                    </ul>
                </div>
                <div class="leftbottom">
                    <img src="../images/left_list_bottom.jpg" alt="">
                </div>
            </div>

            <div class="smalllist">
                <ul>
                    <li onclick="getData('memInfo.php');" class="li">
                        修改會員資料
                    </li>
                    <li onclick="getData('memOrderlist.php');" class="li">
                        查詢訂單記錄
                    </li>
                </ul>
            </div>

            <div class="content" id="content"></div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="follow">
                <div class="btns">
                    <span>follow us on</span>
                    <a href="#" class="btn facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#" class="btn youtube">
                        <i class="fa fa-youtube"></i>
                    </a>
                    <a href="#" class="btn twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#" class="btn google">
                        <i class="fa fa-google"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>

<script>
    function getData(pagename) {
        let xhr = new XMLHttpRequest();
        xhr.onload = function () {
            if (xhr.status == 200) {
                //modify here
                let content = document.getElementById('content');
                content.innerHTML = this.responseText;
            } else {
                alert(xhr.status);
            }
        }
        let url = pagename;
        xhr.open("get", url, true);
        xhr.send(null);
    }
    let li = document.getElementsByClassName('li');
    for (let i = 0; i < li.length; i++) {
        li[i].addEventListener('click', function () {
            for (let i = 0; i < li.length; i++) {
                li[i].style.color = "#c2740f";
            }
            this.style.color = "#0f71c2";
        });
    }
</script>
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
</html>