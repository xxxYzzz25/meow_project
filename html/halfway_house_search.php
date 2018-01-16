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
    <!-- "php.executablePath": "D:/xampp/php/php.exe",
    "php.validate.executablePath": "D:/xampp/php/php.exe",
    "phpfmt.php_bin": "D:/xampp/php/php.exe",
    "phpfmt.format_on_save": true,
    "phpfmt.indent_with_space": 4,
    "phpfmt.enable_auto_align": true,
    "phpfmt.visibility_order": true,
    "phpfmt.passes": [],
    "phpfmt.smart_linebreak_after_curly": true,
    // Enable per-language
    "[php]": {
        "editor.formatOnSave": true
    } -->
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
                    <a href="../catSearch.html">尋喵</a>
                </li>
                <li>
                    <a href="../halfway_house_search.php">中途之家</a>
                </li>
                <li>
                    <a href="../Cat_ShoppingStore.html" title="前往商城">商城</a>
                </li>
                <li>
                    <a href="../forum.html">討論區</a>
                </li>
                <li>
                    <a href="../member.html">會員專區</a>
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
                    <select name="searchLoc" class="select defaultBtn">
                        <option value="">地區</option>
                        <option value="">北部</option>
                        <option value="">中部</option>
                        <option value="">南部</option>
                        <option value="">東部</option>
                        <option value="">離島</option>
                    </select>
                    <input type="text" class="searchBar condition1" placeholder="喜歡的中途之家的名字">
                    <button type="submit" class="searchBtn defaultBtn">
                        <i class="fa fa-search " aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>



        <div class="result">
            <div class="container">
<?php

try {
    require_once "../php/connectBD103G2.php";

    $sql     = "select * from halfway_member";
    $halfway = $pdo->prepare($sql);
    $halfway->bindColumn("HALF_NO", $NO);
    $halfway->bindColumn("HALF_NAME", $NAME);
    $halfway->bindColumn("HALF_ADDRESS", $ADDRESS);
    $halfway->bindColumn("HALF_TEL", $TEL);
    $halfway->bindColumn("HALF_OPEN", $OPEN);
    $halfway->bindColumn("HALF_COVER", $COVER);
    $halfway->execute();
    while ($row = $halfway->fetchObject()) {
        ?>
            <div class="item">
                <div class="pic">
                    <img src="<?php echo $COVER ?>" alt="halfway">
                </div>
                <div class="text tx1">
                    <h3><?php echo $NAME ?></h3>
                    <p>ADD：<?php echo $ADDRESS ?></p>
                    <p>TEL：<?php echo $TEL ?></p>
                    <p>TIME：<?php echo $OPEN ?></p>
                    <form action="halfway_house_detail.php">
                        <input type="hidden" name="halfno" value="<?php echo $NO ?>">
                        <button type="submit" id="btn">see more</button>
                        <!-- <a href="./halfway_house_detail.php">see more</a> -->
                    </form>
                </div>
                <div class="bg color<?php echo $NO ?>"></div>
            </div>

<?php
}

} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "<br>";
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    // echo "getCode : " , $e->getCode() , "<br>";
    // echo "異動失敗,請聯絡系統維護人員";
}
?>
            <!--  <div class="item">
                    <div class="pic">
                        <img src="../images/halfdetail2.jpg" alt="halfway">
                    </div>
                    <div class="text tx2">
                        <h3>野喵中途咖啡</h3>
                        <p>ADD：新北市三重區集英路65號</p>
                        <p>TEL：02-2857-8282</p>
                        <p>TIME：12:00～21:00（周一公休）</p>
                        <a href="./halfway_house_detail.html">see more</a>
                    </div>
                    <div class="bg bg2"></div>
                </div>
                <div class="item">
                    <div class="pic">
                        <img src="../images/halfdetail3.jpg" alt="halfway">
                    </div>
                    <div class="text tx3">
                        <h3>野喵中途咖啡</h3>
                        <p>ADD：新北市三重區集英路65號</p>
                        <p>TEL：02-2857-8282</p>
                        <p>TIME：12:00～21:00（周一公休）</p>
                        <a href="./halfway_house_detail.html">see more</a>
                    </div>
                    <div class="bg bg3"></div>
                </div> -->
            </div>
        </div>



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

</html>