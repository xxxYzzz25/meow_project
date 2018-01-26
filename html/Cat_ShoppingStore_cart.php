<?php
 ob_start();
 session_start();
 isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/fontawesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/header.css">
    <script src="https://use.fontawesome.com/533f4a82f0.js"></script>
    <script src="../js/like.js"></script>
    <link rel="stylesheet" href="../css/signUp.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/Cat_ShoppingStore_cart.css">
    <script src="../js/wow.js"></script>
    <script src="../js/hb.js"></script>
    <script src="../js/shoppingCart.js"></script>

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
            <form action="php/signUp2mem.php" method="post" id="signUpForm" enctype="multipart/form-data" autocomplete="off">
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
                    <a href="./forum.php">討論區</a>
                </li>
                <li>
                <?php
                    if(!isset($_SESSION['MEM_NO']) && !isset($_SESSION['HALF_NO'])){
                        echo "<a href='#' class='login'>會員專區</a>";
                    }else{
                        if(!isset($_SESSION['HALF_NO'])){
                            echo "<a href='./html/member.php'>會員專區</a>";
                        }
                        else{
                            echo "<a href='./html/halfMem.php'>中途會員專區</a>";
                        }
                    }
                ?>
                </li>
            </ul>
        </nav>
        <div class="icons">
            <a href="#">
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
                購物車
            </h2>

            <div id="cartList">
                <table cellpadding="300px" border="5">
                    <tr class="itemHead">
                        <td class="tdTitle" style="width:55%;">商品</td>
                        <td class="tdTitle" style="width:15%;text-align:center;">價錢</td>
                        <td class="tdTitle" style="width:15%;text-align:center;">數量</td>
                        <td class="tdTitle" style="width:15%;text-align:center;"></td>
                    </tr>
                </table>
            </div>

            <form class="saleCard" action="Cat_ShoppingStore_cart.php" method="post">
                是否使用遊戲折價卷？
                <select name="saleCard" class="select" id="hi">
                    <option value="0">不使用折價卷</option>
                    <option value="50">使用 50 元折價卷</option>
                    
                </select>
            </form>

            <div class="total" style="text-align:center;">
                總共：
                <span id="subtotal"></span> 元
            </div>

            <div class="confirm">
                <a href="../html/Cat_ShoppingStore.php">繼續購買</a>
            </div>

            <div class="confirm pay">
                <a id="checkout" href="javascript:void(0)">前往結帳</a>
            </div>

            <div id="result"></div>

            <script>
                function showLogin() {
                    $('.signUpLightboxBlack').css({ 'display': 'block', 'top': '0' });
                    $('#loginBox').css('display', 'block');
                }
                window.addEventListener('load',()=>{
                    function print_value() {
                        // 將 select 的值在印出
                        document.getElementById("result").innerHTML = document.getElementById("hi").value;
                    }
                    let checkout = document.getElementById("checkout");

                    function toCheckout(){

                        if(localStorage["memNo"] && localStorage["halfNo"]){
                            showLogin();
                        }else{
                            this.href = 'Cat_ShoppingStore_cart2.php';
                        }
                    }
                    checkout.addEventListener('click',toCheckout);
                });
            </script>

        </div>
    </div>

    <script src="../js/signIn.js"></script>

</body>

</html>