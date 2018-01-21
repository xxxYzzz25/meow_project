<?php
    ob_start();
    session_start();
	isset($_SESSION['MEM_NO']) ? $_SESSION['MEM_NO'] = $_SESSION['MEM_NO'] : $_SESSION['MEM_NO'] = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous">
    </script>
    <script src="https://use.fontawesome.com/533f4a82f0.js"></script>
    <link rel="stylesheet" href="../css/halfway_house_search.css">
    <title>搜尋中途之家</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="../index.html">
                <h1>
                    <img src="../images/logo_white.png" alt="尋喵啟事" title="回首頁">
                </h1>
            </a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="catSearch.html">尋喵</a>
                </li>
                <li>
                    <a href="halfway_house_search.php">中途之家</a>
                </li>
                <li>
                    <a href="Cat_ShoppingStore.html" title="前往商城">商城</a>
                </li>
                <li>
                    <a href="forum.html">討論區</a>
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
                <span id="like">6</span>
            </a>
        </div>
    </header>
    <div class="right">
        <h2>搜尋中途之家</h2>
            <div class="searchsection">
                <div class="container">
                    <div class="formInsert">
                        <select name="searchLoc" class="select defaultBtn" id="searchLoc">
                            <option>地區</option>
                            <option value="北部">北部</option>
                            <option value="中部">中部</option>
                            <option value="南部">南部</option>
                            <option value="東部">東部</option>
                            <option value="離島">離島</option>
                        </select>
                        <input type="text" name="searchName" id="searchName" class="searchBar condition1" placeholder="喜歡的中途之家的名字">
                        <button class="searchBtn defaultBtn" id="searchBtn">
                            <i class="fa fa-search " aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        <div class="result">
            <div class="container" id="content"></div>
            <!-- res -->
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
    window.addEventListener('load',() => {
        
        function getData(info) {
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
            let url = '../php/halfSearch.php';
            let dataInfo = info;
            xhr.open("post", url, true);
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            xhr.send(dataInfo);
        }
        function ajaxData(e){
            
            let searchLoc = document.getElementById('searchLoc').value;
            let searchName = document.getElementById('searchName').value;

            if(searchLoc !== '地區' || searchName !== ''){
                if(searchLoc === '地區'){
                    getData('searchName=' + searchName);
                }else if(searchName === ''){
                    getData('searchLoc=' +searchLoc);
                }else{
                    getData('searchLoc=' + searchLoc + '&' + 'searchName=' + searchName);
                }
            }
        }

        let searchBtn = document.getElementById('searchBtn');
        searchBtn.addEventListener('click',ajaxData);
        
        getData();
    });
</script>

</html>