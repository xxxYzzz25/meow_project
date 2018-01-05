window.addEventListener('load', function () {
    let heart = document.getElementsByClassName('favorite');
    for (let i = 0, len = heart.length; i < len; i++) {
        heart[i].addEventListener('click', function like() {
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
});