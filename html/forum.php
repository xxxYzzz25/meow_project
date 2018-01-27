<?php
 ob_start();
 session_start();
 isset($_SESSION['HALF_NO']) ? $_SESSION['HALF_NO'] = $_SESSION['HALF_NO'] : $_SESSION['HALF_NO'] = null;
isset($_SESSION['MEM_NO']) ? $_SESSION['MEM_NO'] = $_SESSION['MEM_NO'] : $_SESSION['MEM_NO'] = null;
?>
<!DOCTYPE html>
<html lang="tw">

<head>
	<meta charset="UTF-8">
	<title>討論區</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
	<link rel="stylesheet" type="text/css" href="../css/forum.css">
    <link rel="icon" type="image/png" href="../images/logo_icon.png" />
	<script src="https://use.fontawesome.com/533f4a82f0.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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

	<header class="header">
		<div class="logo">
			<a href="../homepage.php">
				<h1>
					<img src="../images/logo_white.png" alt="尋喵啟事">
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
                    if($_SESSION['MEM_NO'] == null && $_SESSION['HALF_NO'] == null){
                        echo "<a href='#' class='login'>會員專區</a>";
                    }else{
                        if($_SESSION['HALF_NO'] == null){
                            echo "<a href='member.php'>會員專區</a>";
                        }
                        else{
                            echo "<a href='halfMem.php'>中途會員專區</a>";
                        }
                    }
                    ?>
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
		<div class="container ">
			<h1 class="forum-title test" id="f-1">討 論 區</h1>
			<ul class="forum-list">
				<li id="f-2" class="test">
					<h2>飼養討論</h2>
				</li>
				<li id="f-3" class="test">
					<h2>商品討論</h2>
				</li>
				<li id="f-4" class="test">
					<h2>中途討論</h2>
				</li>
			</ul>
		</div>
		<!--  -->
		<div class="container fbox s-active test2" id="c-1">
			<div class="row">
				<div class="col cat-img">
					<img class="rwd-img" src="../img/cat-food.jpg" alt="飼養討論">
				</div>
				<div class="col post-list">
					<div class="post-header">
						飼養討論
					</div>
					<ul>

			<?php 
				try {
					require_once("../php/connectBD103G2.php");
					$sql = "SELECT * FROM `article` where ARTICLE_PART=1 ORDER BY `article`.`ARTICLE_TIME` DESC  limit 4";
					$products = $pdo->prepare( $sql );
					$products->execute();
					while( $prodRow = $products->fetchObject()){
					?>
						<li>
							<a href="forum-rp.php?<?php echo "ARTICLE_NO=".$prodRow->ARTICLE_NO ?>">
								<?php echo  $prodRow->ARTICLE_TITLE ?>
							</a>
						</li>
				<?php 
						}
				} catch (PDOException $e) {
  					echo "錯誤行號 : ", $e->getLine(), "<br>";
  					echo "錯誤訊息 : ", $e->getMessage(), "<br>";		
				  }
				?>
						<li>
							<button class="defaultBtn" id="b-1">more</button>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col cat-img">
					<img class="rwd-img" src="../img/cute-kitten.jpg" alt="商品討論">
				</div>
				<div class="col post-list">
					<div class="post-header">
						商品討論
					</div>
					<ul>
			<?php 
				try {
					require_once("../php/connectBD103G2.php");
					$sql = "SELECT * FROM `article` where ARTICLE_PART=2 ORDER BY `article`.`ARTICLE_TIME` DESC  limit 4";
					$products = $pdo->prepare( $sql );
					$products->execute();
					while( $prodRow = $products->fetchObject()){
					?>
						<li>
							<a href="forum-rp.php?<?php echo "ARTICLE_NO=".$prodRow->ARTICLE_NO ?>">
								<?php echo  $prodRow->ARTICLE_TITLE ?>
							</a>
						</li>
				<?php 
						}
				} catch (PDOException $e) {
  					echo "錯誤行號 : ", $e->getLine(), "<br>";
  					echo "錯誤訊息 : ", $e->getMessage(), "<br>";		
				  }
				?>
						<li>
							<button class="defaultBtn" id="b-2">more</button>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col cat-img">
					<img class="rwd-img" src="../img/catzonia-lobby.jpg" alt="中途討論">
				</div>
				<div class="col post-list">
					<div class="post-header">
						中途討論
					</div>
					<ul>
			<?php 
				try {
					require_once("../php/connectBD103G2.php");
					$sql = "SELECT * FROM `article` where ARTICLE_PART=3 ORDER BY `article`.`ARTICLE_TIME` DESC  limit 4";
					$products = $pdo->prepare( $sql );
					$products->execute();
					while( $prodRow = $products->fetchObject()){
					?>
						<li>
							<a href="forum-rp.php?<?php echo "ARTICLE_NO=".$prodRow->ARTICLE_NO ?>">
								<?php echo  $prodRow->ARTICLE_TITLE ?>
							</a>
						</li>
				<?php 
						}
				} catch (PDOException $e) {
  					echo "錯誤行號 : ", $e->getLine(), "<br>";
  					echo "錯誤訊息 : ", $e->getMessage(), "<br>";		
				  }
				?>
						<li>
							<button class="defaultBtn" id="b-3">more</button>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--  -->
		<div class="container pbox test2" id="c-2">
			<?php 
				try {
					require_once("../php/connectBD103G2.php");
					$sql = "select a.ARTICLE_NO,  a.ARTICLE_TITLE,a.ARTICLE_TIME,a.ARTICLE_PART,m.MEM_NAME,h.HALF_HEAD
						from article a
						left join MEMBER m on a.MEM_NO = m.MEM_NO
						left join HALFWAY_MEMBER h on a.HALF_NO = h.HALF_NO 
						where ARTICLE_PART=1 
						ORDER BY a.ARTICLE_TIME DESC
						";
					$products = $pdo->prepare( $sql );
					$products->execute();
					while( $prodRow = $products->fetchObject()){
				?>
			<div class="po-list">
				<div class="po-title">
					<span></span>
					<h3>
						<a href="forum-rp.php?<?php echo "ARTICLE_NO=".$prodRow->ARTICLE_NO ?>">
							<?php echo  $prodRow->ARTICLE_TITLE ?></a>
					</h3>
				</div>
				<div class="po-time">
					<!-- echo is_null($prodRow->HALF_HEAD) ? $prodRow->MEM_NAME : $prodRow->HALF_HEAD -->
					<span><?php echo $prodRow->MEM_NAME ?> </span>
					<span><?php echo  $prodRow->ARTICLE_TIME ?></span>
				</div>
			</div>
				<?php 
						}
				} catch (PDOException $e) {
  					echo "錯誤行號 : ", $e->getLine(), "<br>";
  					echo "錯誤訊息 : ", $e->getMessage(), "<br>";		
				  }
				?>
		</div>
		<div class="container pbox test2" id="c-3">
			<?php 
				try {
					require_once("../php/connectBD103G2.php");
					$sql = "select a.ARTICLE_NO,
						a.ARTICLE_TITLE,a.ARTICLE_TIME,a.ARTICLE_PART,m.MEM_NAME,h.HALF_HEAD
						from article a
						left join MEMBER m on a.MEM_NO = m.MEM_NO
						left join HALFWAY_MEMBER h on a.HALF_NO = h.HALF_NO 
						where ARTICLE_PART=2 
						ORDER BY a.ARTICLE_TIME DESC
						";
					$products = $pdo->prepare( $sql );
					// $products->bindValue(":price" , 100);
					$products->execute();
					while( $prodRow = $products->fetchObject()){
				?>
			<div class="po-list">
				<div class="po-title">
					<span></span>
					<h3>
						<a href="forum-rp.php?<?php echo "ARTICLE_NO=".$prodRow->ARTICLE_NO ?>">
							<?php echo  $prodRow->ARTICLE_TITLE ?></a>
					</h3>
				</div>
				<div class="po-time">
					<span><?php echo $prodRow->MEM_NAME ?> </span>
					<span><?php echo  $prodRow->ARTICLE_TIME ?></span>
				</div>
			</div>
				<?php 
						}
				} catch (PDOException $e) {
  					echo "錯誤行號 : ", $e->getLine(), "<br>";
  					echo "錯誤訊息 : ", $e->getMessage(), "<br>";		
				  }
				?>
		</div>
		<div class="container pbox test2" id="c-4">
			<?php 
				try {
					require_once("../php/connectBD103G2.php");
					$sql = "select a.ARTICLE_NO,  a.ARTICLE_TITLE,a.ARTICLE_TIME,a.ARTICLE_PART,m.MEM_NAME,h.HALF_HEAD
						from article a
						left join MEMBER m on a.MEM_NO = m.MEM_NO
						left join HALFWAY_MEMBER h on a.HALF_NO = h.HALF_NO 
						where ARTICLE_PART=3 
						ORDER BY a.ARTICLE_TIME DESC
						";
					$products = $pdo->prepare( $sql );
					// $products->bindValue(":price" , 100);
					$products->execute();
					while( $prodRow = $products->fetchObject()){
				?>
			<div class="po-list">
				<div class="po-title">
					<span></span>
					<h3>
						<a href="forum-rp.php?<?php echo "ARTICLE_NO=".$prodRow->ARTICLE_NO ?>">
							<?php echo  $prodRow->ARTICLE_TITLE ?></a>
					</h3>
				</div>
				<div class="po-time">
					<!-- echo is_null($prodRow->HALF_HEAD) ? $prodRow->MEM_NAME : $prodRow->HALF_HEAD -->
					<span><?php echo $prodRow->HALF_HEAD ?> </span>
					<span><?php echo  $prodRow->ARTICLE_TIME ?></span>
				</div>
			</div>
				<?php 
						}
				} catch (PDOException $e) {
  					echo "錯誤行號 : ", $e->getLine(), "<br>";
  					echo "錯誤訊息 : ", $e->getMessage(), "<br>";		
				  }
				?>
		</div>
		<div class="container containerLast">
			<div class="postfrom">
				<p>快速發文</p>
				<form action="../php/forum-post.php" method="post" accept-charset="utf-8">
					<input type="hidden" id="no" name="" value="">
				<div class="post-select" id="post-select">
					<select name="ARTICLE_PART" required>
						<option>選擇討論區</option>
						<option value="1">飼養討論</option>
						<option value="2">商品討論</option>
						<option value="3">中途討論</option>
					</select>
					<input type="text" name="ARTICLE_TITLE" value="" placeholder="請輸入標題" required>
				</div>
				<div class="text-tar">
					<textarea id="textArea" name="ARTICLE_CONTENT" placeholder="請輸入內容..." rows="7" cols="7" required></textarea>
				</div>
				<div class="btns">
					<button type="reset" class="defaultBtn">
						清除內容
					</button>
					<button type="submit" class="defaultBtn">
						發表文章
					</button>
				</div>

				</form>	
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
	
	
	<script src="../js/forum.js"></script>
	<!--  -->
	<script type="text/javascript">
		window.addEventListener('load',()=>{
			
			function qq(){
				let no = document.getElementById('no');
				
				if(localStorage.getItem('memNo') !== null){
					no.name = 'memNo';
					no.value = localStorage.getItem('memNo');
				}else if(localStorage.getItem('halfNo') !== null){
					no.name = 'halfNo';
					no.value = localStorage.getItem('halfNo');
				}else{
					$('.signUpLightboxBlack').css({
						'display': 'block', 'top': '0' 
					}); 
					$('#loginBox').css('display', 'block'); 
				}
			}
			let selector = document.getElementById('post-select');
			selector.addEventListener('change',qq);
			
		});
	</script>
	<script src="../js/signIn.js"></script>
</body>

</html>