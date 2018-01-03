let star = document.getElementsByClassName('fa');
for (let i = 0, len = star.length; i < len; i++) {
    star[i].addEventListener('mouseover', function () {
        star[i].className =
            star[i].className.replace('fa-star-o', 'fa-star')
    });
    star[i].addEventListener('mouseleave', function () {
        star[i].className =
            star[i].className.replace('fa-star', 'fa-star-o')
    });
}