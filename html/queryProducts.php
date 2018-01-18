<?php
try {
    require_once("connectBook.php");
    $sql = "select * from PRODUCT where PRODUCT_PART = '1' limit 4 ";
    $PRODUCT = $pdo->prepare($sql);
    $PRODUCT->execute();
    $PRODUCT = $PRODUCT->fetchAll(PDO::FETCH_ASSOC);

    foreach( $PRODUCT as $i=>$PRODUCT){
?>

    <div class="product">
        <a href="#">
            <div class="pic  wow zoomIn">
            <?php echo '<img src="',$PRODUCT["PRODUCT_COVER"],'" alt="',$PRODUCT["PRODUCT_NAME"],'">' ?>
            </div>
        </a>

        <div class="text">
            <?php echo $PRODUCT["PRODUCT_NAME"] ?>
            <!-- Friskies
            <br>雞肉罐頭 -->
        </div>

        <div class="cost">
            <?php echo '$',$PRODUCT["PRODUCT_PRICE"] ?>
            <!-- $1000 -->
        </div>

        <span id="Friskies" class="addButton">
            加入購物車
            <input type="hidden" value="<?php echo $PRODUCT["PRODUCT_NAME"],'|',$PRODUCT["PRODUCT_COVER"],'|',$PRODUCT["PRODUCT_PRICE"] ?>">
        </span>

    </div>

<?php  
    }

} catch (PDOException $e) {
 echo "錯誤原因 : " , $e->getMessage() , "<br>";
 echo "錯誤行號 : " , $e->getLine() , "<br>";
}
?>

<!-- 2 喵喵待在家 -->
    <div class="allProduct">
        
        <div class="type1">
            
            <div class="typeName wow zoomIn">喵喵待在家</div>
            
            <div class="typeBanner typeBanner2 wow zoomIn">
                <a href="#">前往
                    <b>喵喵待在家</b> ｜ 46 項商品</a>
            </div>

        </div>

<?php
try {
    require_once("connectBook.php");
    $sql = "select * from PRODUCT where PRODUCT_PART = '2' limit 4 ";
    $PRODUCT = $pdo->prepare($sql);
    $PRODUCT->execute();
    $PRODUCT = $PRODUCT->fetchAll(PDO::FETCH_ASSOC);

    foreach( $PRODUCT as $i=>$PRODUCT){
?>
        
        <div class="type2">


            <div class="product">
                
                <a href="#">
                    <div class="pic  wow zoomIn">
                    <?php echo '<img src="',$PRODUCT["PRODUCT_COVER"],'" alt="',$PRODUCT["PRODUCT_NAME"],'">' ?>
                    </div>
                </a>

                <div class="text">
                    <?php echo $PRODUCT["PRODUCT_NAME"] ?>
                    <!-- Friskies
                    <br>雞肉罐頭 -->
                </div>

                <div class="cost">
                    <?php echo '$',$PRODUCT["PRODUCT_PRICE"] ?>
                    <!-- $1000 -->
                </div>

                <span id="Friskies" class="addButton">
                    加入購物車
                    <input type="hidden" value="<?php echo $PRODUCT["PRODUCT_NAME"],'|',$PRODUCT["PRODUCT_COVER"],'|',$PRODUCT["PRODUCT_PRICE"] ?>">
                </span>

            </div>
        </div>

<?php  
    }

} catch (PDOException $e) {
 echo "錯誤原因 : " , $e->getMessage() , "<br>";
 echo "錯誤行號 : " , $e->getLine() , "<br>";
}
?>

<!-- 3 精選喵草 -->

<div class="allProduct">
        
        <div class="type1">
            
            <div class="typeName wow zoomIn">精選喵草</div>
            
            <div class="typeBanner typeBanner3 wow zoomIn">
                <a href="#">前往
                    <b>精選喵草</b> ｜ 46 項商品</a>
            </div>

        </div>

<?php
try {
    require_once("connectBook.php");
    $sql = "select * from PRODUCT where PRODUCT_PART = '3' limit 4 ";
    $PRODUCT = $pdo->prepare($sql);
    $PRODUCT->execute();
    $PRODUCT = $PRODUCT->fetchAll(PDO::FETCH_ASSOC);

    foreach( $PRODUCT as $i=>$PRODUCT){
?>
        
        <div class="type2">


            <div class="product">
                
                <a href="#">
                    <div class="pic  wow zoomIn">
                    <?php echo '<img src="',$PRODUCT["PRODUCT_COVER"],'" alt="',$PRODUCT["PRODUCT_NAME"],'">' ?>
                    </div>
                </a>

                <div class="text">
                    <?php echo $PRODUCT["PRODUCT_NAME"] ?>
                    <!-- Friskies
                    <br>雞肉罐頭 -->
                </div>

                <div class="cost">
                    <?php echo '$',$PRODUCT["PRODUCT_PRICE"] ?>
                    <!-- $1000 -->
                </div>

                <span id="Friskies" class="addButton">
                    加入購物車
                    <input type="hidden" value="<?php echo $PRODUCT["PRODUCT_NAME"],'|',$PRODUCT["PRODUCT_COVER"],'|',$PRODUCT["PRODUCT_PRICE"] ?>">
                </span>

            </div>
        </div>

<?php  
    }

} catch (PDOException $e) {
 echo "錯誤原因 : " , $e->getMessage() , "<br>";
 echo "錯誤行號 : " , $e->getLine() , "<br>";
}
?>

<!-- 4 喵喵愛玩耍 -->

<div class="allProduct">
        
        <div class="type1">
            
            <div class="typeName wow zoomIn">喵喵愛玩耍</div>
            
            <div class="typeBanner typeBanner4 wow zoomIn">
                <a href="#">前往
                    <b>喵喵愛玩耍</b> ｜ 46 項商品</a>
            </div>

        </div>

<?php
try {
    require_once("connectBook.php");
    $sql = "select * from PRODUCT where PRODUCT_PART = '4' limit 4 ";
    $PRODUCT = $pdo->prepare($sql);
    $PRODUCT->execute();
    $PRODUCT = $PRODUCT->fetchAll(PDO::FETCH_ASSOC);

    foreach( $PRODUCT as $i=>$PRODUCT){
?>
        
        <div class="type2">


            <div class="product">
                
                <a href="#">
                    <div class="pic  wow zoomIn">
                    <?php echo '<img src="',$PRODUCT["PRODUCT_COVER"],'" alt="',$PRODUCT["PRODUCT_NAME"],'">' ?>
                    </div>
                </a>

                <div class="text">
                    <?php echo $PRODUCT["PRODUCT_NAME"] ?>
                    <!-- Friskies
                    <br>雞肉罐頭 -->
                </div>

                <div class="cost">
                    <?php echo '$',$PRODUCT["PRODUCT_PRICE"] ?>
                    <!-- $1000 -->
                </div>

                <span id="Friskies" class="addButton">
                    加入購物車
                    <input type="hidden" value="<?php echo $PRODUCT["PRODUCT_NAME"],'|',$PRODUCT["PRODUCT_COVER"],'|',$PRODUCT["PRODUCT_PRICE"] ?>">
                </span>

            </div>
        </div>

<?php  
    }

} catch (PDOException $e) {
 echo "錯誤原因 : " , $e->getMessage() , "<br>";
 echo "錯誤行號 : " , $e->getLine() , "<br>";
}
?>

