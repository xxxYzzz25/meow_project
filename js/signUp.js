window.addEventListener('load', function () {
    let mem = document.getElementById('member');
    let halfMem = document.getElementById('halfMember');
    let signUpForm = document.getElementById('signUpForm');
    mem.addEventListener('click', function toggleAction() {
        mem.classList.add('selected');
        halfMem.classList.remove('selected');
        signUpForm.action = "#123";
    })
    halfMem.addEventListener('click', function toggleAction2() {
        halfMem.classList.add('selected');
        mem.classList.remove('selected');
        signUpForm.action = "#321";
    })
});
$(document).ready(function () {
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
    }
    $('.login').click(function (e) {
        e.preventDefault();
        $('.signUpLightboxBlack').css('display', 'block');
    });
    // $('.signUpLightboxBlack').click(function () {
        // $('.signUpLightboxBlack').css('display', 'none');
        // $('#loginBox').css('display', 'none');
        // $('#menuControl').prop("checked", false);
    // });
    $('.cancel').click(function () {
        $('.signUpLightboxBlack').css('display', 'none');
    });
    $('#signUpForm').submit(function () {
        $('.signUpLightboxBlack').css('display', 'none');
    });
});