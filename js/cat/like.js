window.addEventListener('load', ()=>{
    function like() {
        let heart = document.getElementsByClassName('favorite')
        for (let i = 0, len = heart.length; i < len; i++) {
            heart[i].addEventListener('click', () => {
                if (heart[i].className.match('fa-heart-o')) {
                    heart[i].className =
                        heart[i].className.replace
                            ('fa-heart-o', 'fa-heart')
                    heart[i].setAttribute('data-boolean', 1)
                } else {
                    heart[i].className =
                        heart[i].className.replace
                            ('fa-heart', 'fa-heart-o')
                    heart[i].setAttribute('data-boolean', 0)
                }
                let xhr = new XMLHttpRequest()
                xhr.onload = function () {
                    if (xhr.status == 200) {
                        like()
                    } else {
                        alert(xhr.status)
                    }
                }
                let url = '../php/catFavor.php'
                xhr.open("post", url, true)
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                xhr.send('LIKE_NO=' + heart[i].getAttribute('data-val') + '&' + 'LIKE=' + heart[i].getAttribute('data-boolean'))
            })
        }
    }
    like()
})
