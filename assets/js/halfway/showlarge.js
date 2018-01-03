let pic = document.getElementsByClassName('picture');
for (let i = 0, len = pic.length; i < len; i++) {
    pic[i].addEventListener('click', function (e) {
        let banner = document.getElementsByClassName('banner')[0];
        banner.style.backgroundImage = "url(" + e.target.src + ")";
    });
}