window.addEventListener('load', () => {
    let heart = document.getElementsByClassName('favorite');
    for (let i = 0, len = heart.length; i < len; i++) {
        heart[i].addEventListener('click', () => {
            if (heart[i].className.match('fa-heart-o')) {
                heart[i].className =
                    heart[i].className.replace('fa-heart-o', 'fa-heart')
                heart[i].setAttribute('data-boolean', 1)
            } else {
                heart[i].className =
                    heart[i].className.replace('fa-heart', 'fa-heart-o')
                heart[i].setAttribute('data-boolean', 0)
            }
        })
    }
})