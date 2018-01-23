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

    <script src="../js/shoppingCart2.js"></script>

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
                    <a href="./Cat_ShoppingStore.html" title="前往商城">商城</a>
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

            <form class="payCard">
                請選擇配送方式：
                <select name="send" class="select">
                    <option value="1">宅配</option>
                    <option value="0">超商</option>
                </select>
            </form>

            
            <table class="info">
                <tr>
                    <th>收件人姓名</th>
                    <td>
                        <input type="textbox">
                    </td>
                </tr>
                <tr>
                    <th>收件人地址</th>
                    <td>
                        <input type="textbox">
                    </td>
                </tr>
                <tr>
                    <th>聯絡電話</th>
                    <td>
                        <input type="textbox">
                    </td>
                </tr>
                <tr>
                    <th>備註</th>
                    <td>
                        <input type="textbox">
                    </td>
                </tr>
            </table>

           

            <div class="confirm pay">
                <a href="">確認購買</a>
            </div>

        </div>
    </div>


</body>

</html>