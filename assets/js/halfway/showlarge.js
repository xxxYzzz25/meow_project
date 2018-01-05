let pic = document.getElementsByClassName('picture');
for (let i = 0, len = pic.length; i < len; i++) {
    pic[i].addEventListener('click', function (e) {
        let bigpic = document.getElementsByClassName('bigpic')[0];
        bigpic.style.backgroundImage = "url(" + e.target.src + ")";
    });
}