<?php
 ob_start();
 session_start();
 isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/fontawesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/header.css">
    <script src="https://use.fontawesome.com/533f4a82f0.js"></script>
    <script src="../js/like.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/Cat_ShoppingStore_product.css">
    <script src="../js/wow.js"></script>
    <script src="../js/hb.js"></script>
    <script src="../js/shoppingStore_product.js"></script>
    <script src="../js/shoppingCount.js"></script>

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
                商品
            </h2>

            <br>
            <br>

            <div id="pdDetail">  
                    <?php
                    $NO = $_REQUEST["PRODUCT_NO"];
                    try {
                        require_once("../php/connectBD103G2.php");
                        $sql = "select * from PRODUCT where PRODUCT_NO = :NO";
                        $PRODUCT = $pdo->prepare($sql);
                        $PRODUCT->bindValue(":NO",$NO);
                        $PRODUCT->execute();
                        $PRODUCT = $PRODUCT->fetchAll(PDO::FETCH_ASSOC);
                    
                        foreach( $PRODUCT as $i=>$PRODUCT){
                    ?>
                    
                    <div class="product">
                    
                        <div class="left wow zoomIn">
                            <div class="bigPic">
                                <?php echo '<img src="',$PRODUCT["PRODUCT_COVER"],'" alt="',$PRODUCT["PRODUCT_NAME"],'">' ?>
                            </div>
                        </div>
                    
                        <div class="right">
                            
                            <div class="name wow zoomIn">
                                <?php echo $PRODUCT["PRODUCT_NAME"] ?>
                            </div>
                    
                            <div class="price wow zoomIn">
                                <?php echo '$',$PRODUCT["PRODUCT_PRICE"] ?>
                            </div>
                    
                            <div class="quantity wow zoomIn">
                                <form id='myform' method='POST' action='#'>
                                    <label for="">數量</label>
                                    <input type='button' value='-' class='qtyminus' field='quantity' />
                                    <input type='text' name='quantity' value='1' class='qty' />
                                    <input type='button' value='+' class='qtyplus' field='quantity' />
                                </form>
                            </div>
                            
                            <div id="pd<?php echo $PRODUCT["PRODUCT_NO"] ?>" class="buy wow zoomIn">
                                    <span  class="addButton cartBtn">
                                        加入購物車
                                        <input type="hidden" value="<?php echo $PRODUCT["PRODUCT_NAME"],'|',$PRODUCT["PRODUCT_COVER"],'|',$PRODUCT["PRODUCT_PRICE"],'|1' ?>">
                                    </span>
                    
                                    <!-- <a href="Cat_ShoppingStore_cart.html"> -->
                                        <a style="text-decoration:none" class="addButton" href="./Cat_ShoppingStore_cart.php">
                                            直接購買
                                            <input type="hidden" value="<?php echo $PRODUCT["PRODUCT_NAME"],'|',$PRODUCT["PRODUCT_COVER"],'|',$PRODUCT["PRODUCT_PRICE"],'|1' ?>">
                                        </a>
                                    <!-- </a> -->
                                        
                                    
                            </div>
                    
                        </div>
                    
                    </div>
                    
                    <hr>
                    
                    <div class="productDetail wow zoomIn">
                        
                        <img src="../img/detail1.jpg" alt="">
                    
                        <p>
                            產品規格<br>
                            <li class="spec">重量：<?php echo $PRODUCT["PRODUCT_WEIGHT"] ?></li>
                            <li class="spec">尺寸：<?php echo $PRODUCT["PRODUCT_SIZE"] ?></li>
                            <li class="spec">材質：<?php echo $PRODUCT["PRODUCT_MATERIAL"] ?></li>
                            <li class="spec">成分：<?php echo $PRODUCT["PRODUCT_COMPONENT"] ?></li>
                            <li class="spec">產地：<?php echo $PRODUCT["PRODUCT_LOC"] ?></li>
                        </p>
                    
                        <br>
                    
                        <img src="../img/detail3.jpg" alt=""> 
                    
                        <p>
                            產品敘述<br>
                            <?php echo $PRODUCT["PRODUCT_NARRATIVE"] ?>
                        </p>
                    
                        <br>
                    
                        <img src="../img/detail2.jpg" alt="">
                    
                    </div>
                    
                    <?php  
                        }
                    
                    } catch (PDOException $e) {
                    echo "錯誤原因 : " , $e->getMessage() , "<br>";
                    echo "錯誤行號 : " , $e->getLine() , "<br>";
                    }
                    ?>
                    
                    
            </div>  

        </div>
    </div>
<script>
    window.addEventListener('load', function(){
        let spec = document.querySelectorAll('.spec');
        for (let i = 0; i < spec.length; i++) {
            let splitspec = spec[i].textContent.split("：");
            if(splitspec[1] == ''){
                spec[i].style.display = "none";
            }
        }
        
    });
</script>


</body>

</html>