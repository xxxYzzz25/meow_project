<?php
    ob_start();
    session_start();
	isset($_SESSION['MEM_NO']) ? $_SESSION['MEM_NO'] = $_SESSION['MEM_NO'] : $_SESSION['MEM_NO'] = null;
	isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/533f4a82f0.js"></script>
    <script src="../js/signIn.js"></script>
    <script src="../js/halfway/halfSearch.js"></script>
    <link rel="stylesheet" href="../css/halfway_house_search.css">
    <title>搜尋中途之家</title>
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
            <a href="../index.php">
                <h1>
                    <img src="../images/logo_white.png" alt="尋喵啟事" title="回首頁">
                </h1>
            </a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="catSearch.php">尋喵</a>
                </li>
                <li>
                    <a href="halfway_house_search.php">中途之家</a>
                </li>
                <li>
                    <a href="Cat_ShoppingStore.php" title="前往商城">商城</a>
                </li>
                <li>
                    <a href="forum.php">討論區</a>
                </li>
                <li>
                    <?php
                    if($_SESSION['MEM_NO'] == null && $_SESSION['HALF_NO'] == null){
                        echo "<a href='#' class='login'>會員專區</a>";
                    }else{
                        if($_SESSION['HALF_NO'] == null){
                            echo "<a href='member.html'>會員專區</a>";
                        }
                        else{
                            echo "<a href='halfMem.html'>中途會員專區</a>";
                        }
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
                        echo "<a href='../php/memberLogOut.php' id='loginBtn'>
                            <i class='fa fa-sign-out fa-2x' aria-hidden='true'></i>
                            </a>";
                    }else{
                        echo "<a href='#' class='login' id='loginBtn'>
                            <i class='fa fa-user-circle-o fa-2x' aria-hidden='true'></i>
                            </a>";
                    }
            ?>
            <a href="#" id="likeBox">
                <i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
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

</html>