<?php
 ob_start();
 session_start();
 isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>購物車</title>
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <script src="https://use.fontawesome.com/533f4a82f0.js"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="../js/signIn.js"></script>
    <script src="../js/like.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/Cat_ShoppingStore_cart.css">
    <script src="../js/wow.js"></script>
    <script src="../js/hb.js"></script>
    <script src="../js/shoppingCart2.js"></script>
    <script>
        $(document).ready(function () {
            new WOW().init();
        });
    </script>
</head>
<body>
<div class="signUpLightboxBlack"></div>
<div class="signUpLightbox" id="loginBox">
    <i class="fa fa-times cancel"></i>
    <div class="bgImg" id="bgImg"></div>
    <div id="formShape1" class="formShape formShape1">
        <div class="chioce">
            <button id="halfMember1">中途之家會員</button>
            <button id="member1" class="selected">一般會員</button>
        </div>
        <form action="../php/signIn2Member.php" class="signUpForm" id="signInForm" method="post" autocomplete="off">
            <br>
            <br>
            <br>
            <br>
            <label for="userId">會員帳號
                <br>
                <small>請輸入您的電子郵件</small>
            </label>
            <input type="email" id="userIdIn" name="memId" required>
            <br>
            <label for="userPsw">會員密碼
                <br>
                <small>請輸入6~10碼英數字</small>
            </label>
            <input type="password" id="userPswIn" name="memPsw" required>
            <br>
            <div class="chioce">
                <input type="submit" class="formBtn formSubmitBtn" value="登入">
            </div>
            <p class="signInUpPos">尚未成為會員嗎?
                <span id="signIn2Up">點此註冊</span>
            </p>
        </form>
    </div>
    <div id="formShape2" class="formShape formShape2">
        <div class="chioce">
            <button id="halfMember2">中途之家會員</button>
            <button id="member2" class="selected">一般會員</button>
        </div>
        <form action="../php/signUp2mem.php" method="post" id="signUpForm" enctype="multipart/form-data" autocomplete="off">
            <label for="userName">會員名稱
                <br>
                <small>不得多於8個中/英文字元</small>
            </label>
            <input type="text" name="userName" id="userName" placeholder="請輸入您的名稱" required>
            <br>
            <label for="userId">會員帳號
                <br>
                <small>請輸入您的電子郵件</small>
            </label>
            <input type="email" name="userId" id="userId" placeholder="請輸入您的電子郵件" required>
            <br>
            <label for="userPsw">會員密碼
                <br>
                <small>請輸入6~10碼英數字</small>
            </label>
            <input type="password" name="userPsw" id="userPsw" placeholder="請輸入您的密碼" required>
            <br>
            <label for="userTel">聯絡電話
                <br>
            </label>
            <input type="tel" name="userTel" id="userTel" placeholder="請輸入您的手機號碼" required>
            <br>
            <label for="userBirth">會員生日
                <br>
            </label>
            <input type="text" name="userBirth" id="userBirth" placeholder="ex:19900101" required>
            <br>
            <label for="userAddress">通訊地址
                <br>
            </label>
            <input type="text" name="userAddress" id="userAddress" placeholder="請輸入您的地址" required>
            <br>
            <div class="chioce">
                <label for="userPhoto" class="formBtn" id="userPhotoLabel" required>
                    點我上傳您的大頭貼
                </label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                <input type="file" name='image' id="userPhoto" placeholder="您可以上傳您的檔案" value="file">
                <input type="submit" id="loginBoxSubmit" class="formBtn formSubmitBtn" value="確認註冊">
            </div>
            <p class="signInUpPos">已經是會員了嗎?
                <span id="signUp2In">點此登入</span>
            </p>
        </form>
    </div>
</div>

    <header>
        <div class="logo">
            <a href="../homepage.php">
                <h1>
                    <img src="../images/logo_white.png" alt="尋喵啟事" title="回首頁">
                </h1>
            </a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="./catSearch.php">尋喵</a>
                </li>
                <li>
                    <a href="./halfway_house_search.php">中途之家</a>
                </li>
                <li>
                    <a href="./Cat_ShoppingStore.php" title="前往商城">商城</a>
                </li>
                <li>
                    <a href="./member.php">討論區</a>
                </li>
                <li>
                <?php
                    if(!isset($_SESSION['MEM_NO']) && !isset($_SESSION['HALF_NO'])){
                        echo "<a href='#' class='login'>會員專區</a>";
                    }else{
                        if(!isset($_SESSION['HALF_NO'])){
                            echo "<a href='./member.php'>會員專區</a>";
                        }
                        else{
                            echo "<a href='./halfMem.php'>中途會員專區</a>";
                        }
                    }
                ?>
                </li>
            </ul>
        </nav>
        <div class="icons">
            <a href="Cat_ShoppingStore_cart.php">
                <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
            </a>
            <?php
                    if(isset($_SESSION["MEM_NO"]) || isset($_SESSION["HALF_NO"])){
                        echo "<a href='../php/memberLogOut.php' id='loginBtn'>
                            <i class='fa fa-sign-out fa-2x' aria-hidden='true'></i>
                            </a>";
                    }else{
                        echo "<a href='#' class='login' id='loginBtn'>
                            <i class='fa fa-user-circle-o fa-2x' aria-hidden='true'></i>
                            </a>";
                    }
            ?>
            <?php
                if(isset($_SESSION["MEM_NO"])){
                    echo "<a href='#' id='likeBoxBtn'>
                            <i class='fa fa-heart-o fa-2x' aria-hidden='true'></i>
                        </a>";
                }
            ?>
        </div>
        <div class="hb">
            <div class="hamburger" id="hamburger-6">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
    </header>


    <div class="wrap">
        <div class="wrapCenter">
            <h2 class="title">
                購物明細
            </h2>

            <div id="cartList">
                <table>
                    <tr class="itemHead">
                        <td style="width:55%;">商品</td>
                        <td style="width:15%;text-align:center;">價錢</td>
                        <td style="width:15%;text-align:center;">數量</td>
                    </tr>
                </table>
            </div>
            
            <div class="total" style="text-align:center;">
                總共：
                <span id="subtotal">0</span>
            </div>
            
            <form action="../php/Cat_ShoppingStore_cart2todb.php" id="orderList" method="post">
                <table class="info pay">
                    <tr>
                        <th>收件人姓名</th>
                        <td>
                            <input type="text" name="name" required>
                        </td>
                    </tr>
                    <tr>
                        <th>收件人地址</th>
                        <td>
                            <input type="address" name="address" required>
                        </td>
                    </tr>
                    <tr>
                        <th>聯絡電話</th>
                        <td>
                            <input type="tel" name="tel" required>
                        </td>
                    </tr>
                    <tr>
                        <th>配送方式</th>
                        <td class="mail">
                            <input type="radio" name="delivery" value="1" required>宅配
                            <input type="radio" name="delivery" value="0" required>超商
                        </td>
                    </tr>
                    <tr>
                        <th>付款方式</th>
                        <td class="payWay">
                            <input type="radio" name="pay" value="0" required>超商付款
                            <input type="radio" name="pay" value="1" required>信用卡付款
                        </td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="confirm">確認購買</button></td>
                    </tr>
                </table>
            </form>
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

<script>
    // let storage = localStorage;
    window.addEventListener('load',()=>{
        let itemString = storage.getItem('addItemList');
        let items = itemString.substr(0,itemString.length-2).split(', ');
        function Prod(name,price,count){
            this.name = name;
            this.price = price;
            this.count = count;
        }
        let json = [];

        for(let key in items){		//use items[key]
            let itemInfo = storage.getItem(items[key]);	//let itemInfo = storage[items[key]];
            let itemSplit = itemInfo.split('|');
            let itemName = itemSplit[0];
            let itemPrice = itemSplit[2];
            let itemCount = itemSplit[3];
            let obj = new Prod(itemName,itemPrice,itemCount);
            json.push(obj);
        }
        json = JSON.stringify(json);

        function ajax(callback,dataInfo){

            let xhr = new XMLHttpRequest();
            xhr.open('post','../php/Cat_ShoppingStore_cart2todb.php');
            xhr.onload = callback;
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            xhr.send(dataInfo);

        }
        function sendList(e){
            e.preventDefault();

            let orderList = document.forms['orderList'];
            let price = document.getElementById('subtotal').textContent;
            let name = orderList.elements.name.value;
            let address = orderList.elements.address.value;
            let pay = orderList.elements.pay.value;
            let delivery = orderList.elements.delivery.value;
            let tel = orderList.elements.tel.value;
            let dataInfo;
            if(localStorage.getItem('discount')){
                let discount = 'true';
                dataInfo = `discount=${discount}&list=${json}&tel=${tel}&price=${price}&name=${name}&address=${address}&pay=${pay}&delivery=${delivery}`;
            }else{
                dataInfo = `list=${json}&tel=${tel}&price=${price}&name=${name}&address=${address}&pay=${pay}&delivery=${delivery}`;
            }

            
            ajax(function(){
                let prodNos = document.querySelectorAll('#prodList .itemHead');
                if(localStorage.getItem('discount')){
                    localStorage.removeItem('discount');
                }
                if(localStorage.getItem('addItemList')){
                    localStorage.removeItem('addItemList');
                }
                for (const i of prodNos) {
                    let prodNo = i.childNodes[1].className;
                    if(localStorage.getItem(prodNo)){
                        localStorage.removeItem(prodNo);
                    }
                }
                alert('購買完成，謝謝您的購買');
                // window.location.href = './Cat_ShoppingStore.php';
            },dataInfo);
        
        }

        let orderList = document.getElementById('orderList');
        orderList.addEventListener('submit',sendList);
    });
</script>

</body>

</html>