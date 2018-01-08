window.addEventListener('load', function () {
    let list = document.getElementById('kit-list');
    let len = $(list).children('li').length;
    let count = 0;
    let width = $(window).width();
    $('.left-arrow').on('click', moveL);
    $('.right-arrow').on('click', moveR);
    $(window).on('resize', function () {
        width = $('body').width();
    });

    function moveL() {
        count--;
        if (count < 0) {
            count = len - 3;
        }
        if (width >= 768) {
            $(list).stop().animate({
                left: (count * -33.333333) + '%'
            });
        } else if (width < 768) {
            $(list).stop().animate({
                left: (count * -100) + '%'
            });
        }
    }

    function moveR() {
        count++;
        if (count >= len - 2) {
            count = 0;
        }
        if (width >= 768) {
            $(list).stop().animate({
                left: (count * -33.333333) + '%'
            });
        } else if (width < 768) {
            $(list).stop().animate({
                left: (count * -100) + '%'
            });
        }
    }
});