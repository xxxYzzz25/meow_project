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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/Cat_ShoppingStore_cart.css">
    <script src="../js/wow.js"></script>

    <script src="../js/shoppingCart.js"></script>

    <script>
        $(document).ready(function () {
            new WOW().init();
        });
    </script>

</head>

<body>



    <header>
        <div class="logo">
            <a href="../index.php">
                <h1>
                    <img src="../img/logo_white.png" alt="尋喵啟事" title="回首頁">
                </h1>
            </a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="./catSearch.html">尋喵</a>
                </li>
                <li>
                    <a href="./halfway_house_search.html">中途之家</a>
                </li>
                <li>
                    <a href="./Cat_ShoppingStore.php" title="前往商城">商城</a>
                </li>
                <li>
                    <a href="./member.html">討論區</a>
                </li>
                <li>
                    <a href="member.html">會員專區</a>
                </li>
            </ul>
        </nav>
        <div class="icons">
            <a href="html/Cat_ShoppingStore_cart.php">
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
                <a href="Cat_ShoppingStore_cart2.php">前往結帳</a>
            </div>

            <div id="result"></div>

            <script>
            function print_value() {
                // 將 select 的值在印出
                document.getElementById("result").innerHTML = document.getElementById("hi").value;
            }
            </script>
                     

            

        </div>
    </div>


</body>

</html>