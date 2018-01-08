window.addEventListener('load', function () {
    let list = document.getElementById('half-list');
    let len = $(list).children('li').length;
    let count = 0;
    $('#arrowLeft').on('click', moveL);
    $('#arrowRight').on('click', moveR);

    function moveL() {
        count--;
        if (count < 0) {
            count = len-1;
        }
        $(list).stop().animate({
            left: (count * -100) + '%'
        });

    }

    function moveR() {
        count++;
        if (count >= len) {
            count = 0;
        }
        $(list).stop().animate({
            left: (count * -100) + '%'
        });

    }
});