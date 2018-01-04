window.addEventListener('load', function () {
    let list = document.getElementById('kit-list');
    let len = $(list).children('li').length;
    $('.left-arrow').on('click', moveL);
    $('.right-arrow').on('click', moveR);
    let count = 0;

    function moveL() {
        count--;
        if (count < 0) {
            count = len - 3;
        }
        $(list).stop().animate({
            left: (count * -33.333333) + '%'
        });
    }

    function moveR() {
        count++;
        if (count >= len - 2) {
            count = 0;
        }
        $(list).stop().animate({
            left: (count * -33.333333) + '%'
        });
    }
});