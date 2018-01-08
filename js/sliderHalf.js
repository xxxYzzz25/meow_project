window.addEventListener('load', function () {
    let list = document.getElementById('half-list');
    let len = $(list).children('li').length;
    let count = 0;
    let width = $(window).width();
    $('').on('click', moveL);
    $('').on('click', moveR);
    $(window).on('resize', function () {
        width = $('body').width();
    });

    function moveL() {
        count--;
        if (count < 0) {
            count = len - 3;
        }
        $(list).stop().animate({
            left: (count * -100) + '%'
        });

    }

    function moveR() {
        count++;
        if (count >= len - 2) {
            count = 0;
        }
        $(list).stop().animate({
            left: (count * -100) + '%'
        });

    }
});