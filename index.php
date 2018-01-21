<?php
 ob_start();
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>尋喵啟事</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="plugin/jquery.fullPage.css">
    <link rel="stylesheet" href="css/number.css">
    <script src="https://use.fontawesome.com/533f4a82f0.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    <script src="plugin/jquery.fullPage.js"></script>
    <script src="js/loading&Card.js"></script>
    <script src="js/pointGame.js"></script>
    <script src="js/noticeGame.js"></script>
    <script src="js/signIn.js"></script>
</head>
<body>
    <?php
        try{
            require_once("php/connectBD103G2.php");
            $sql = "select count(ADOPT_STATUS) COUNT from CAT where ADOPT_STATUS = 2 or  ADOPT_STATUS = 1";//總共幾隻貓被領養
            $data = $pdo -> query($sql);
            $dataObj = $data -> fetchObject();
            echo "<script>var findQty='".$dataObj->COUNT."';</script>";

            $sql = "select count(ADOPT_STATUS) COUNT from CAT where ADOPT_STATUS = 0";//還有幾隻貓待領養
            $data = $pdo -> query($sql);
            $dataObj = $data -> fetchObject();
            echo "<script>var waitQty='".$dataObj->COUNT."';</script>";
            //取出登記日期最早的六筆資料
            $sql = "select C.CAT_NAME catName,C.CAT_DATE catDate,H.HALF_ADDRESS halfAddress,H.HALF_NAME halfName,C.CAT_COVER catPic from CAT C join HALFWAY_MEMBER H on C.HALF_NO = H.HALF_NO order by CAT_DATE limit 6";
            $data = $pdo -> query($sql);
    ?>
    <div id="loading">
        <img src="images/loading.svg" id="loadingCat" alt="loading">
    </div>
    <div class="signUpLightboxBlack"></div>
    <div class="signUpLightbox" id="loginBox">
        <i class="fa fa-times cancel"></i>
        <div class="bgImg" id="bgImg"></div>
        <div id="formShape1" class="formShape formShape1">
            <div class="chioce">
                <button id="halfMember1">中途之家會員</button>
                <button id="member1" class="selected">一般會員</button>
            </div>
            <form action="php/signIn2Member.php" class="signUpForm" id="signInForm" method="post" autocomplete="off">
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
    <!-- header -->
    <header>
        <div class="logo">
            <a href="index.php">
                <h1>
                    <img src="images/logo_white.png" alt="尋喵啟事" title="回首頁">
                </h1>
            </a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="html/catSearch.html">尋喵</a>
                </li>
                <li>
                    <a href="html/halfway_house_search.html">中途之家</a>
                </li>
                <li>
                    <a href="html/Cat_ShoppingStore.html" title="前往商城">商城</a>
                </li>
                <li>
                    <a href="html/forum.html">討論區</a>
                </li>
                <li>
                    <?php
                        if($_SESSION['HALF_NO'] == null){
                            echo "<a href='member.html'>會員專區</a>";
                        }
                        else{
                            echo "<a href='halfMem.html'>中途會員專區</a>";
                        }
                    ?>
                </li>
            </ul>
        </nav>
        <div class="icons">
            <a href="#">
                <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
            </a><?php
                    if(isset($_SESSION["MEM_NO"]) || isset($_SESSION["HALF_NO"])){

                        echo "<a href='php/memberLogOut.php'>
                            <i class='fa fa-sign-out fa-2x' aria-hidden='true'></i>
                            </a>";
                    }else{
                        echo "<a href='#' class='login'>
                            <i class='fa fa-user-circle-o fa-2x' aria-hidden='true'></i>
                            </a>";
                    }
            ?>
            <a href="#">
                <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
                <span id="like">6</span>
            </a>
        </div>
        <div class="hb">
        <div class="hamburger" id="hamburger-6">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </div>
    </header>
    <div id="fullpages">
        <div class="margin-200">
            <div class="section">
                <!-- banner -->
                <div class="banner">
                    <div class="container">
                        <div class="findBox">
                            <div class="find" id="find">
                            </div>
                            <span>隻喵喵已經找到牠的主人</span>
                        </div>
                        <div class="waitBox">
                            <div class="wait" id="wait">
                            </div>
                            <span>隻喵喵還在等待牠的主人</span>
                        </div>
                        <hr>
                        <h2>尋找您未來的喵喵</h2>
                        <div class="search">
                            <select name="searchColor" id="searchColor">
                                <option value="">毛色</option>
                                <option value="">虎斑</option>
                                <option value="">豹紋</option>
                                <option value="">三花</option>
                                <option value="">玳瑁</option>
                                <option value="">純色</option>
                            </select>
                            <select name="searchGender" id="searchGender">
                                <option value="">性別</option>
                                <option value="">男孩</option>
                                <option value="">女孩</option>
                            </select>
                            <select name="searchLoc" id="searchLoc">
                                <option value="">地區</option>
                                <option value="">北部</option>
                                <option value="">中部</option>
                                <option value="">南部</option>
                                <option value="">東部</option>
                                <option value="">離島</option>
                            </select>
                            <div class="go">
                                <input type="text" placeholder="或輸入喵喵的名字">
                                <a href="#">
                                    <i class="fa fa-search fa-lg" title="跳轉至搜尋結果" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="scroll-down">
                            領養前先於下頁完成小測驗看看自己適不適合領養!
                            <br>
                            <small>Scroll Down</small>
                            <br>
                            <a href="#page2"><i class="fa fa-angle-down fa-3x" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <!-- 分數遊戲 -->
                <div class="door-start" id="doorStart">
                    <div class="door-start-text">
                        領養前先過關此遊戲
                        <br> 對五題以上開放領養
                    </div>
                    <div class="door-start-btn btn-more" id="door-start-btn">開始!</div>
                </div>
                <div class="door-left" id="doorLeft"></div>
                <div class="door-right" id="doorRight"></div>
                <div class="game-point" id="game-point">
                    <div class="game-point-title">
                        <h2>適合養喵小孩嗎?</h2>
                        <h3>Precautions</h3>
                    </div>
                    <div class="game-point-top">
                        <div class="game-qty-box">
                            <!-- <span id="game-qty"></span> -->
                            <img src="images/cloud1_Q1.png" alt="Quest Number" id="QuestNumber">
                        </div>
                        <div class="askBox">
                            <!-- <span id="questions"></span> -->
                            <img src="images/cloud2_Q1.png" alt="cloud Quest" id="cloudQuest">
                        </div>
                    </div>
                    <div class="game-point-bottom" id="gamePointBottom">
                        <div class="hint-box">
                            <div class="hint" id="hint"></div>
                            <img src="images/answer.png" alt="answer cat" id="combon">
                            <button id="i-know">我知道了!</button>
                        </div>
                        <img class="people" id="people" src="images/runningBoy.png" alt="cat ask people">
                        <div class="option-area option-area-a" id="optionA">
                        </div>
                        <div class="option-area option-area-b" id="optionB">
                        </div>
                        <img class="hug" id="hug" src="images/runningCat.png" alt="hug cat">
                    </div>
                </div>
                <div class="game-point-bgimg"></div>
            </div>
            <div class="section">
                <!-- 尋喵 -->
                <div class="pick-kit">
                    <div class="pick-title">
                        <h2>尋喵</h2>
                        <h3>Pick Up My Kittens</h3>
                    </div>
                    <div class="left-arrow arrow">
                        <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
                    </div>
                    <div class="right-arrow arrow">
                        <i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i>
                    </div>
                    <ul id="kit-list">
                        <?php
                            while ($dataObj = $data -> fetchObject()) {
                        ?>
                        <li>
                            <div class="cat_list_bg">
                                <a href="html/catContent.html">
                                    <div class="cat_list" style="background-image: url(<?php echo mb_substr( $dataObj -> catPic , 3 , mb_strlen($dataObj -> catPic)-1 ); ?>);">
                                        <div class="bubble">
                                            <span class="kit-name"><?php echo $dataObj -> catName ?></span>
                                            <span class="kit-age"><?php echo $dataObj -> catDate."出生" ?></span>
                                            <span class="kit-address"><?php echo $dataObj -> halfAddress ?></span>
                                            <span class="kit-home"><?php echo $dataObj -> halfName ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <div class="more">
                        <a href="html/catSearch.html" class="btn-more">More</a>
                    </div>
                </div>
            </div>
            <div class="section">
                <!-- 這裡44444第二ㄍ遊戲 -->
                <div class="noticegame">
                    <div class="game-point-title">
                        <h2>注意</h2>
                        <h3>Notices</h3>
                    </div>
                    <div class="ask">
                        <img src="images/noticeGame/cat_speak.png" alt="">
                    </div>
                    <div class="boxcontainer">

                        <div id="leftbox">
                            <img src="images/noticeGame/refrigerator.png" alt="" data-box="left" data-role="drag-drop-container">
                        </div>
                        <div class="centerbox">
                            <img src="images/noticeGame/cat_cat.png" alt="">
                        </div>
                        <div id="rightbox">
                            <img src="images/noticeGame/garbage.png" alt="" data-box="right" data-role="drag-drop-container">
                        </div>
                    </div>
                    <div class="imgbox">
                        <img src="images/noticeGame/banana.png" draggable="true">
                        <img src="images/noticeGame/cookie.png" draggable="true">
                        <img src="images/noticeGame/egg.png" draggable="true">
                        <img src="images/noticeGame/milk.png" draggable="true">
                        <img src="images/noticeGame/watermelon.png" draggable="true">
                    </div>
                    <div class="hintbox" id="hintbox">
                        <div class="hinttext" id="hinttext"></div>
                        <img src="images/answer.png" alt="answer cat">
                        <button id="know">我知道了!</button>
                    </div>
                    <div class="smallbox">
                        手機版不提供此功能喔!抱歉~~~
                    </div>
                </div>
            </div>
            <div class="section">
                <!-- 中途之家 -->
                <div class="half">
                    <div class="arrowLeft">
                        <i class="fa fa-arrow-left fa-2x" aria-hclassden="true"></i>
                    </div>
                    <div class="arrowRight">
                        <i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i>
                    </div>
                    <div class="half-title">
                        <h2>中途之家</h2>
                        <h3>Animal Shelter</h3>
                    </div>
                    <ul class="half-list" id="half-list">
                        <?php
                            $sql = "select h.HALF_NO halfNo,h.HALF_NAME halfName,h.HALF_ADDRESS halfAddress,h.HALF_TEL halfTel,h.HALF_OPEN halfTime,h.HALF_COVER halfPic,count(c.HALF_NO) count,avg(e.EVALUATION_STARS) stars
                            from HALFWAY_MEMBER h 
                            join CAT c 
                            on h.HALF_NO = c.HALF_NO
                            join EVALUATION e 
                            on c.HALF_NO = e.HALF_NO
                            group by c.HALF_NO 
                            order by avg(e.EVALUATION_STARS) desc
                            limit 3";
                            $data = $pdo -> query($sql);
                            $pdo2 = new PDO( $dsn, $user,$psw, $options );
                            
                            // <!--待養,圖片,名稱,地址,電話,營業時間,評價排列 1.HALFWAY_MEMBER 2.CAT 3.HALF_PIC-->
                            
                            while ($dataObj = $data -> fetchObject()) {
                                
                        ?>
                        <li>
                            <div class="half-item">
                                <div class="half-qty">
                        <?php
                            $sql2 = "select count(*) count from CAT where HALF_NO = ".$dataObj -> halfNo;
                            $data2 = $pdo2 -> query($sql2);
                            while ($dataObj2 = $data2 -> fetchObject()) { 
                                    $str = $dataObj2 -> count;
                                    $str = str_split($str,1);
                                    foreach ($str as $key => $value) {
                                        # code...
                                    
                        ?>
                                    <img src="images/number<?php echo $value ?>.png" alt="<?php echo $value ?>">
                                    <?php
                                    }
                                }
                        ?>
                                    <span>隻喵喵待領養</span>
                                </div>
                                </a>
                                <div class="half-pic" style="background-image: url(<?php echo mb_substr( $dataObj -> halfPic , 3 , mb_strlen($dataObj -> halfPic)-1 ); ?>);"></div>
                                <div class="half-text">
                                    <a href="html/halfway_house_detail.php?halfno=<?php echo $dataObj -> halfNo ?>">
                                        <span class="half-name"><?php echo $dataObj -> halfName ?></span>
                                    </a>
                                    <span class="half-address"><?php echo $dataObj -> halfAddress ?></span>
                                    <span class="half-tel"><?php echo $dataObj -> halfTel ?></span>
                                    <span class="half-time"><?php echo $dataObj -> halfTime ?></span>
                                    <a href="html/halfway_house_detail.php?halfno=<?php echo $dataObj -> halfNo ?>" class="read-more">前往領養</a>
                                </div>
                            </div>
                        </li>
                        <?php
                        }
                            }catch(PDOException $e){
                                echo $e -> getLine();
                                echo $e -> getMessage();
                            }
                        ?>
                    </ul>
                    <div class="more">
                        <a href="html/halfway_house_search.html" class="btn-more">More</a>
                    </div>
                </div>
            </div>
            <div class="section">
                <!-- 商城 -->
                <div class="shop">
                    <div class="shop-title">
                        <h2>商城</h2>
                        <h3>Shopping Store</h3>
                    </div>
                    <div class="prod">
                        <div class="arrowLeft">
                            <i class="fa fa-arrow-left fa-2x" aria-hclassden="true"></i>
                        </div>
                        <div class="arrowRight">
                            <i class="fa fa-arrow-right fa-2x" aria-hclassden="true"></i>
                        </div>

                        <ul class="prod-list" id="prod-list">
                            <li class="prod-item">
                                <a href="#">
                                    <div class="front">
                                        <div class="prod-content"></div>
                                        <div class="prod-text">
                                            <h4>喵喵肚子餓</h4>
                                            <div class="statement">Lorem ipsum dolor sit amet consectetur.</div>
                                        </div>
                                    </div>
                                    <div class="backed"></div>
                                </a>
                            </li>
                            <li class="prod-item">
                                <a href="#">
                                    <div class="front">
                                        <div class="prod-content"></div>
                                        <div class="prod-text">
                                            <h4>喵喵待在家</h4>
                                            <div class="statement">Lorem ipsum dolor sit amet consectetur.</div>
                                        </div>
                                    </div>
                                    <div class="backed"></div>
                                </a>
                            </li>
                            <li class="prod-item">
                                <a href="#">
                                    <div class="front">
                                        <div class="prod-content"></div>
                                        <div class="prod-text">
                                            <h4>精選喵草</h4>
                                            <div class="statement">Lorem ipsum dolor sit amet consectetur.</div>
                                        </div>
                                    </div>
                                    <div class="backed"></div>
                                </a>
                            </li>
                            <li class="prod-item">
                                <a href="#">
                                    <div class="front">
                                        <div class="prod-content"></div>
                                        <div class="prod-text">
                                            <h4>喵喵愛玩耍</h4>
                                            <div class="statement">Lorem ipsum dolor sit amet consectetur.</div>
                                        </div>
                                    </div>
                                    <div class="backed"></div>
                                </a>
                            </li>
                        </ul>
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
                </div>
            </div>
        </div>

        <script src="js/sliderKit.js"></script>
        <script src="js/sliderHalf.js"></script>
        <script>
            $(document).ready(function () {
                $(".hamburger").click(function () {
                    $(this).toggleClass("is-active");
                    $('header').toggleClass("active");
                });
                $('#door-start-btn').on('click', function () {
                    $(this).closest('#doorStart').fadeOut();
                    $('#doorLeft').addClass('doorLeft');
                    $('#doorRight').addClass('doorRight');
                    $('#people').attr({
                        src: 'images/runningBoy.gif'
                    });
                    $('#hug').attr({
                        src: 'images/runningCat.gif'
                    });
                });
            });
        </script>
</body>

</html>