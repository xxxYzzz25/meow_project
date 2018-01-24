<?php
 ob_start();
 session_start();
 isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
?>
<!DOCTYPE html>
<html lang="tw">
<head>
	<meta charset="UTF-8">
	<title>討論區--分頁</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
	<link rel="stylesheet" type="text/css" href="../css/forum-p1.css">
	<script src="https://use.fontawesome.com/533f4a82f0.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="../js/signIn.js"></script>
	<script src="../js/hb.js"></script>
</head>
<body>
	<div class="signUpLightboxBlack" style="display:none;"></div>
    <div class="signUpLightbox" id="loginBox" style="display:none;">
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
	
	<header class="header">
		<div class="logo">
			<a href="../index.php">
				<h1>
					<img src="../images/logo_white.png" alt="尋喵啟事">
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
					<a href="Cat_ShoppingStore.php">商城</a>
				</li>
				<li class="active">
					<a href="./forum.php">討論區</a>
				</li>
				<li>
					<a href="./member.php">會員專區</a>
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
	<!--  -->
	<div class="m-box">
		<h1>飼養討論區</h1>
		<div class="container pobox">
			<?php 
				try {
					require_once("../php/connectBD103G2.php");
					$ARTICLE_NO = $_REQUEST["ARTICLE_NO"];
					$sql = "select a.ARTICLE_TITLE,a.ARTICLE_CONTENT,a.ARTICLE_TIME,m.MEM_NAME,h.HALF_HEAD
							from article a
							left join MEMBER m on a.MEM_NO = m.MEM_NO
							left join HALFWAY_MEMBER h on a.HALF_NO = h.HALF_NO
							where ARTICLE_NO=:ARTICLE_NO";
					$data = $pdo->prepare( $sql );
					$data -> bindParam(":ARTICLE_NO",$ARTICLE_NO);
					$data->execute();
					$dataRow = $data->fetchObject();
				?>
			<div class="post-header">
				<h2><?php echo $dataRow -> ARTICLE_TITLE ?></h2>
				<div class="post-ab">
					<span><?php echo is_null($dataRow->HALF_HEAD) ? $dataRow->MEM_NAME : $dataRow->HALF_HEAD ?></span>
					<span><?php echo $dataRow -> ARTICLE_TIME ?></span>
				</div>
			</div>
			<div class="post-body">
				<?php echo $dataRow -> ARTICLE_CONTENT ?>
			</div>

			<?php 
				} catch (PDOException $e) {
  					echo "錯誤行號 : ", $e->getLine(), "<br>";
  					echo "錯誤訊息 : ", $e->getMessage(), "<br>";		
				}
				?>
			<div class="post-ft">
				<form action="../php/forum-report.php" method="post">
					<input type="hidden" name="ARTICLE_NO" value="<?php echo $ARTICLE_NO ?>">
					<button type="submit" class="defaultBtn reportBtns">檢舉</button>
				</form>
			</div>
		</div>
		<!-- ============================ -->
		<?php 
			try{
				require_once("../php/connectBD103G2.php");
				$sql = "select me.MESSAGE_NO,m.MEM_NO,h.HALF_NO,me.MESSAGE_TIME,me.MESSAGE_CONTENT,m.MEM_NAME,h.HALF_HEAD
						from MESSAGE me
						left join MEMBER m on m.MEM_NO = me.MEM_NO
						left join HALFWAY_MEMBER h on h.HALF_NO = me.HALF_NO
						where me.ARTICLE_NO=$ARTICLE_NO
						order by me.MESSAGE_TIME";
				$data = $pdo -> prepare($sql);
				$data -> execute();
				while ($dataRow = $data -> fetchObject()) {
		?>	
		<div class="container rebox">
			<div class="post-ab">
				<span><?php echo is_null($dataRow->HALF_HEAD) ? $dataRow->MEM_NAME : $dataRow->HALF_HEAD ?></span>
				<span><?php echo $dataRow -> MESSAGE_TIME ?></span>
			</div>
			<div class="post-body">
				<?php echo $dataRow -> MESSAGE_CONTENT ?>
			</div>
			<div class="post-ft">
				<form action="../php/forum-report.php" method="post">
					<input type="hidden" name="MESSAGE_NO" value="<?php echo $dataRow -> MESSAGE_NO ?>">
					<button class="defaultBtn reportBtns">檢舉</button>
				</form>
			</div>
		</div>
		<!--  -->
		<?php
		}
			}catch (PDOException $e) {
				echo "錯誤行號 : ", $e->getLine(), "<br>";
				echo "錯誤訊息 : ", $e->getMessage(), "<br>";	
			}
		?>
		<div class="postfrom">
			<form method="post" action="../php/forum-rp2.php">
			<input type="hidden" id="no" name="" value="">
			<input type="hidden" name="ARTICLE_NO" value="<?php echo $ARTICLE_NO ?>">
			<p>回覆文章</p>
			<div class="text-tar">
				<textarea id="textArea" name="MESSAGE_CONTENT" placeholder="請輸入內容..." rows="7" cols="7" required></textarea>
			</div>
			<div class="btns">
				<button type="reset" class="defaultBtn">
					清除內容
				</button>
				<button type="submit" class="defaultBtn">
					回覆文章
				</button>
			</div>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		window.addEventListener('load',()=>{

			function qq(){
				let no = document.getElementById('no');
				if(localStorage.getItem('memNo')){
					no.name = 'memNo';
					no.value = localStorage.getItem('memNo');
				}else if(localStorage.getItem('halfNo')){
					no.name = 'halfNo';
					no.value = localStorage.getItem('halfNo');
				}
				else{
					$('.signUpLightboxBlack').css({
						'display': 'block', 'top': '0' 
					}); 
					$('#loginBox').css('display', 'block'); 
				}
			}
			let textArea = document.getElementById('textArea');
			let reports = document.querySelectorAll('.reportBtns');
			for (const i of reports) {
				i.addEventListener('submit',()=>{
					alert('請先登入');
					if(localStorage.getItem('halfNo') || localStorage.getItem('halfNo')){
						alert('請先登入');
						qq();
					}
				});
			}
			textArea.addEventListener('focus',qq);
		})


	</script>

</body>
</html>