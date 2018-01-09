window.addEventListener('load', function () {
    // in2up
    let in2up = document.getElementById('signIn2Up')
    let up2in = document.getElementById('signUp2In')
    let signIn = document.getElementById('formShape1')
    let signUp = document.getElementById('formShape2')
    let img = document.getElementById('bgImg')

    in2up.addEventListener('click', () => {
        signIn.style.display = 'none'
        signUp.style.display = 'block'
        img.style.backgroundImage = "url('../images/memberBG2.jpg')"        
    })

    up2in.addEventListener('click', () => {
        signUp.style.display = 'none'
        signIn.style.display = 'block'
        img.style.backgroundImage = "url('../images/memberBG.jpg')"
    })

    let mem1 = document.getElementById('member1')
    let halfMem1 = document.getElementById('halfMember1')
    let signInForm = document.getElementById('signInForm')
    mem1.addEventListener('click', ()=>{
        mem1.classList.add('selected')
        halfMem1.classList.remove('selected')
        signInForm.childNodes[9].innerHTML = "會員帳號<br><small>請輸入您的電子郵件</small>"
        signInForm.childNodes[15].innerHTML = "會員密碼<br><small>請輸入6~10碼英數字</small>"
    })
    halfMem1.addEventListener('click', () => {
        halfMem1.classList.add('selected')
        mem1.classList.remove('selected')
        signInForm.childNodes[9].innerHTML = "中途帳號<br><small>請輸入您的電子郵件</small>"
        signInForm.childNodes[15].innerHTML = "中途密碼<br><small>請輸入6~10碼英數字</small>"
    })

    // 以下是切換form action/signUpBox變更
    let mem2 = document.getElementById('member2')
    let halfMem2 = document.getElementById('halfMember2')
    let signUpForm = document.getElementById('signUpForm')
    let userPhotoLabel = document.getElementById('userPhotoLabel')

    mem2.addEventListener('click', function toggleAction() {
        mem2.classList.add('selected')
        halfMem2.classList.remove('selected')
        signUpForm.action = "#123"
        userPhotoLabel.innerHTML = '點我上傳您的大頭貼'
        let memNameLabel = userPhotoLabel.parentNode.parentNode.childNodes[1]
        let memIdLabel = userPhotoLabel.parentNode.parentNode.childNodes[7]
        let memPswLabel = userPhotoLabel.parentNode.parentNode.childNodes[13]
        let memBirthLabel = userPhotoLabel.parentNode.parentNode.childNodes[25]
        let memBirthInput = userPhotoLabel.parentNode.parentNode.childNodes[27]
        let memAddLabel = userPhotoLabel.parentNode.parentNode.childNodes[31]
        memNameLabel.innerHTML = "會員名稱<br><small>不得多於8個中/英文字元</small>"
        memIdLabel.innerHTML = "會員帳號<br><small>請輸入您的電子郵件</small>"
        memPswLabel.innerHTML = "會員密碼<br><small>請輸入6~10碼英數字</small>"
        memBirthLabel.innerHTML = "會員生日<br>"
        memBirthInput.setAttribute("placeholder", "ex:19910101")
        memAddLabel.innerHTML = "通訊地址"
    })
    halfMem2.addEventListener('click', function toggleAction2() {
        halfMem2.classList.add('selected')
        mem2.classList.remove('selected')
        signUpForm.action = "#321"
        userPhotoLabel.innerHTML = '點我上傳您的封面照片'
        let memNameLabel = userPhotoLabel.parentNode.parentNode.childNodes[1]
        let memIdLabel = userPhotoLabel.parentNode.parentNode.childNodes[7]
        let memPswLabel = userPhotoLabel.parentNode.parentNode.childNodes[13]
        let memHeadLabel = userPhotoLabel.parentNode.parentNode.childNodes[25]
        let memHeadInput = userPhotoLabel.parentNode.parentNode.childNodes[27]
        let memAddLabel = userPhotoLabel.parentNode.parentNode.childNodes[31]
        memNameLabel.innerHTML = '中途之家名稱<br><small>不得多於8個中/英文字元</small>'
        memIdLabel.innerHTML = "中途帳號<br><small>請輸入您的電子郵件</small>"
        memPswLabel.innerHTML = "中途密碼<br><small>請輸入6~10碼英數字</small>"
        memHeadLabel.innerHTML = "中途負責人名稱<br>"
        memHeadInput.setAttribute("placeholder", "請輸入您的負責人姓名")
        memAddLabel.innerHTML = "中途店址"
    })


})
$(document).ready(function () {
    // 以下是燈箱置中
    moveCenter();
    $(window).resize(function () {
        moveCenter();
    });
    function moveCenter() {
        winWidth = $(window).width();
        winHeight = $(window).height();
        divWidth = $('#loginBox').width();
        divHeight = $('#loginBox').height();

        $('#loginBox').css({
            left: (winWidth - divWidth) / 2,
            top: (winHeight - divHeight) / 2
        });
        $('#signUpBox').css({
            left: (winWidth - divWidth) / 2,
            top: (winHeight - divHeight) / 2
        });
    }

    // 以下是燈箱出現與隱藏
    $('.login').click(function (e) {
        e.preventDefault();
        $('.signUpLightboxBlack').css({ 'display': 'block', 'top': '0' });
        $('#loginBox').css('display', 'block');
    });
    $('.signUpLightboxBlack').click(function () {
        $('.signUpLightboxBlack').css('display', 'none');
        $('#loginBox').css('display', 'none');
        $('#menuControl').prop("checked", false);
    });
    $('.cancel').click(function () {
        $('.signUpLightboxBlack').css('display', 'none');
        $('#loginBox').css('display', 'none');
    });
    $('#signUpForm').submit(function () {
        $('.signUpLightboxBlack').css('display', 'none');
        $('#loginBox').css('display', 'none');
    });
});