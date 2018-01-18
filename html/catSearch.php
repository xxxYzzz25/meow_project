<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/catSearch.css">
    <script src="../js/signIn.js"></script>
    <script src="../js/cat/advanceSearch_JQuery.js"></script>
    <script src="../js/cat/arrowSwitch.js"></script>
    <script src="../js/cat/like.js"></script>
	<title>尋喵</title>
</head>
<body>
	<div class="signUpLightboxBlack">
	</div>
	<div class="signUpLightbox" id="loginBox">
		<i class="fa fa-times cancel"></i>
		<div class="bgImg" id="bgImg"></div>
		<div id="formShape1" class="formShape formShape1">
			<div class="chioce">
				<button id="halfMember1">中途之家會員</button>
				<button id="member1" class="selected">一般會員</button>
			</div>
			<form action="#1" class="signUpForm" id="signInForm">
				<br>
				<br>
				<br>
				<br>
				<label for="userId">會員帳號
					<br>
					<small>請輸入您的電子郵件</small>
				</label>
				<input type="email" id="userIdIn" required>
				<br>
				<label for="userPsw">會員密碼
					<br>
					<small>請輸入6~10碼英數字</small>
				</label>
				<input type="password" id="userPswIn" required>
				<br>
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
			<form action="#1" id="signUpForm">
				<label for="userName">會員名稱
					<br>
					<small>不得多於8個中/英文字元</small>
				</label>
				<input type="text" id="userName" placeholder="請輸入您的名稱" required>
				<br>
				<label for="userId">會員帳號
					<br>
					<small>請輸入您的電子郵件</small>
				</label>
				<input type="email" id="userId" placeholder="請輸入您的電子郵件" required>
				<br>
				<label for="userPsw">會員密碼
					<br>
					<small>請輸入6~10碼英數字</small>
				</label>
				<input type="password" id="userPsw" placeholder="請輸入您的密碼" required>
				<br>
				<label for="userTel">聯絡電話
					<br>
				</label>
				<input type="tel" id="userTel" placeholder="請輸入您的手機號碼" required>
				<br>
				<label for="userBirth">會員生日
					<br>
				</label>
				<input type="text" id="userBirth" placeholder="ex:19900101" required>
				<br>
				<label for="userAddress">通訊地址
					<br>
				</label>
				<input type="text" id="userAddress" placeholder="請輸入您的地址" required>
				<br>
				<div class="chioce">
					<label for="userPhoto" class="formBtn" id="userPhotoLabel">
						點我上傳您的大頭貼
					</label>
					<input type="file" id="userPhoto" placeholder="您可以上傳您的檔案" value="file">
					<input type="submit" id="loginBoxSubmit" class="formBtn formSubmitBtn" value="確認註冊">
					<input type="reset" class="formBtn formSubmitBtn" value="清除重填">
				</div>
				<p class="signInUpPos">已經是會員了嗎?
					<span id="signUp2In">點此登入</span>
				</p>
			</form>
		</div>
	</div>
	<header>
		<div class="logo">
			<a href="../index.html" title="尋喵啟事">
				<h1>
					<img src="../images/logo_white.png" alt="尋喵啟事" title="前往首頁">
				</h1>
			</a>
		</div>
		<nav>
			<ul>
				<li>
					<a href="./catSearch.html" title="前往尋喵">尋喵</a>
				</li>
				<li>
					<a href="./halfway_house_search.html" title="前往中途之家">中途之家</a>
				</li>
				<li>
					<a href="./Cat_ShoppingStore.html" title="前往商城">商城</a>
				</li>
				<li>
					<a href="./forum.html" title="前往討論區">討論區</a>
				</li>
				<li>
					<a href="./member.html" title="前往會員專區">會員專區</a>
				</li>
			</ul>
		</nav>
		<div class="icons">
			<a href="#">
				<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
			</a>
			<a href="#">
				<i class="fa fa-user-circle-o fa-2x login" aria-hidden="true"></i>
			</a>
			<a href="#">
				<i class="fa fa-heart-o fa-2x" aria-hidden="true"></i>
				<span id="like">6</span>
			</a>
		</div>
    </header>
	<div class="right">
		<div class="container container1">
			<h2>尋喵
				<br>
				<small class="selectTitle">搜尋你的喵喵</small>
			</h2>
			<form method="POST" action="#" class='selectForm'>
				<div>
					<div class="formInsert">
						<input type="text" id="searchText" class="searchBar condition1" placeholder="你知道心儀喵喵的名字嗎？">
						<button type="submit" class="searchBtn defaultBtn">
							<i class="fa fa-search " aria-hidden="true"></i>
						</button>
					</div>
					<br>
				</div>
				<label class="advanceSearch" id="tableControl" for="advanced">進階搜尋
					<i class="fa fa-angle-down" id="arrowDown" aria-hidden="true"></i>
				</label>
				<input type="checkbox" id="advanced">
				<div class="advanceSearchItem">
					<div>
						<label class="selectTitle">毛色：</label>
						<div class="formInsert">
							<button type="button" class="condition condition1" data-name='color' data-val='1'>黑白</button>
							<button type="button" class="condition" data-name='color' data-val='2'>虎斑</button>
							<button type="button" class="condition" data-name='color' data-val='3'>橘白</button>
							<button type="button" class="condition" data-name='color' data-val='4'>橘色</button>
							<button type="button" class="condition" data-name='color' data-val='5'>黑色</button>
						</div>
					</div>
					<div>
						<label class="selectTitle toMiddle">地區：</label>
						<div class="formInsert">
							<button type="button" class="condition condition1" data-name='location' data-val='0'>臺北市</button>
							<button type="button" class="condition" data-name='location' data-val='1'>新北市</button>
							<button type="button" class="condition" data-name='location' data-val='2'>基隆市</button>
							<br class="forRWD">
							<button type="button" class="condition" data-name='location' data-val='3'>桃園市</button>
							<button type="button" class="condition" data-name='location' data-val='4'>新竹市</button>
							<br>
							<button type="button" class="condition condition1" data-name='location' data-val='5'>新竹縣</button>
							<button type="button" class="condition" data-name='location' data-val='6'>宜蘭縣</button>
							<button type="button" class="condition" data-name='location' data-val='7'>苗栗縣</button>
							<br class="forRWD">
							<button type="button" class="condition" data-name='location' data-val='8'>台中市</button>
							<button type="button" class="condition" data-name='location' data-val='9'>彰化縣</button>
							<br>
							<button type="button" class="condition condition1" data-name='location' data-val='10'>南投縣</button>
							<button type="button" class="condition" data-name='location' data-val='11'>雲林縣</button>
							<button type="button" class="condition" data-name='location' data-val='12'>嘉義縣</button>
							<br class="forRWD">
							<button type="button" class="condition" data-name='location' data-val='13'>嘉義市</button>
							<button type="button" class="condition" data-name='location' data-val='14'>台南市</button>
							<br>
							<button type="button" class="condition condition1" data-name='location' data-val='15'>高雄市</button>
							<button type="button" class="condition" data-name='location' data-val='16'>屏東縣</button>
							<button type="button" class="condition" data-name='location' data-val='17'>花蓮縣</button>
							<br class="forRWD">
							<button type="button" class="condition" data-name='location' data-val='18'>台東縣</button>
							<button type="button" class="condition" data-name='location' data-val='19'>離島</button>
						</div>
					</div>
					<div>
						<label class="selectTitle">性別：</label>
						<div class="formInsert">
							<button type="button" class="condition condition1" data-name='gender' data-val='0'>男孩</button>
							<button type="button" class="condition" data-name='gender' data-val='1'>女孩</button>
						</div>
					</div>
				</div>
				<div class='S_checkbox' style='display:none;'></div>
			</form>
			<select name="sortCat" id="sortCat">
				<?
				isset($_GET['sort'])?$sort = $_GET['sort']:$sort = 1;
				if( $sort == 2 ){
					echo "<option value='1'>刊登日期從新到舊</option>
						<option value='2' selected>刊登日期從舊到新</option>";
				}else{
					echo "<option value='1' selected>刊登日期從新到舊</option>
						<option value='2'>刊登日期從舊到新</option>";
				}
				?>
				
				
			</select>
            <div class="catPic" id="content">
			<?php
				$searchCon = isset($_GET['sort'])? 'sort='.$_GET['sort'].'&':'';
				$searchCon .= isset($_GET['searchText'])? 'searchText='.$_GET['searchText']:'';
				
        		require_once("../php/connectBD103G2.php");
				if ( $sort == 2 ) {
					$desc = '';
				}else if( $sort == 1 ){
					$desc = 'desc';
				}
				
				$sql = "select count(1) from cat where `ADOPT_STATUS` = 0";	// 計算資料筆數
                $total = $pdo->query($sql);
                $rownum = $total->fetchcolumn(); 		                    // 總共欄位數
                $perPage = 9;                                               // 每頁顯示筆數
                $totalpage = ceil($rownum / $perPage);	                    // 計算總頁數
                $pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
                                                                            // 若無當前頁數則進入第一頁 若有則進入該頁
                $start = ($pageNo - 1)* $perPage;		                    // 計算起始頁數
                $sql="select * from cat where `ADOPT_STATUS` = 0 order by CAT_NO $desc limit $start, $perPage";
                                                                            // 設定每頁呈現內容
                $cat = $pdo -> query( $sql );
                $catRow = $cat->fetchAll(PDO::FETCH_ASSOC);
                if ($rownum == 0) {
                    echo "這裡已經沒有需要認養的喵喵了~~";
                }else{
                    try {
                        foreach( $catRow as $i => $cat_Row ){
            ?>
				<picture class="catItem catItem_<?echo $i+1?>">
					<i class="fa fa-heart-o favorite" aria-hidden="true"></i>
					<div class="catContent">
						<a href="catContent.php?catNo=<?echo $cat_Row['CAT_NO'] ?>" title="瀏覽<?echo $cat_Row['CAT_NAME']?>">
							<div class="img">
								<img src="<?echo $cat_Row['CAT_COVER']?>" alt="<?echo $cat_Row['CAT_NAME']?>">
							</div>
						</a>
						<button type="button" class="quickView">
							Quick View
						</button>
					</div>
					<figure>
						<h3><?echo $cat_Row['CAT_NAME']?></h3>
						<br><?echo $cat_Row['CAT_LOCATION']?>
						<br>約<?echo $cat_Row['CAT_DATE']?>出生
                        <br><?
                                if ($cat_Row['CAT_SEX'] == 1) {
                                    echo '女生<i class="fa fa-venus" aria-hidden="true"></i>';
                                }else if($cat_Row['CAT_SEX'] == 0){
                                    echo '男生<i class="fa fa-mars" aria-hidden="true"></i>';
                                }
                            ?>
						<br><?echo $cat_Row['CAT_NARRATIVE']?>
					</figure>
                </picture>
                <?
                }
                ?>
				<div class="page">
				<?
					for($i=1;$i<=$totalpage;$i++){
						echo "<a href='?pageNo=$i&$searchCon' class='pageNo defaultBtn'>".$i."</a>";
					}
				?>
				</div>
			</div>
		</div>
    </div>
    <?php
        }catch( PDOException $e){
            echo "行號: ",$e->getLine(), "<br>";
            echo "訊息: ",$e->getMessage() , "<br>";
        }}
    ?>
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
	<script>
		window.addEventListener('load',() => {
			function getData(info) {
				let xhr = new XMLHttpRequest()
				xhr.onload = function () {
					if (xhr.status == 200) {
						let content = document.getElementById('content')
						content.innerHTML = this.responseText
						like()
					} else {
						alert(xhr.status)
					}
				}
				let url = '../php/catSearch.php?' + info
				xhr.open("get", url, true)
				// xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
				xhr.send()
			}
			function ajaxData(e){
				let searchText = document.getElementById('searchText').value
				let sort = document.getElementById('sortCat').value
				if( searchText !== '' ){
					if( sort == 2 ){
						getData('sort=2&searchText=' + searchText)
					}else{
						getData('sort=1&searchText=' + searchText)
					}
				}else{
					if ( sort == 2 ) {
						getData('sort=2')
					}
					else{
						getData('sort=1')
					}
				}
			}
			function like() {
				let heart = document.getElementsByClassName('favorite');
				for (let i = 0, len = heart.length; i < len; i++) {
					heart[i].addEventListener('click', () => {
						if (heart[i].className.match('fa-heart-o')) {
							heart[i].className =
								heart[i].className.replace
									('fa-heart-o', 'fa-heart')
						} else {
							heart[i].className =
								heart[i].className.replace
									('fa-heart', 'fa-heart-o')
						}
					})
				}
			}
			let searchInput = document.getElementById('searchText')
			searchInput.addEventListener('input', ajaxData)
			let sort = document.getElementById('sortCat')
			sort.addEventListener('change', ajaxData)
			like()
		});
	</script>
</body>

</html>