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
                    <a href="member.php">會員專區</a>
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
            
            <form action="../php/Cat_ShoppingStore_cart2todb/php" id="orderList" method="post">
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

            let dataInfo = `list=${json}&tel=${tel}&price=${price}&name=${name}&address=${address}&pay=${pay}&delivery=${delivery}`;
            
            ajax(function(){
                window.location.href = './Cat_ShoppingStore.php';
            },dataInfo);
        
        }

        let orderList = document.getElementById('orderList');
        orderList.addEventListener('submit',sendList);
    });
</script>

</body>

</html>