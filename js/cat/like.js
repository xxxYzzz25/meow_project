window.addEventListener('load',()=>{
    function like() {

        let heart = document.getElementsByClassName('favorite')[0];
        let login = document.querySelector('#loginBtn')

            heart.addEventListener('click', () => {
                
                if (heart.className.match('fa-heart-o')) {
                    heart.className = heart.className.replace('fa-heart-o', 'fa-heart')
                    heart.setAttribute('data-boolean', 1)
                } else {
                    heart.className = heart.className.replace('fa-heart', 'fa-heart-o')
                    heart.setAttribute('data-boolean', 0)
                }
                if (!login.className.match('login123')) {
                let xhr = new XMLHttpRequest()
                xhr.onload = function () {
                    if (xhr.status == 200) {
                        // like()
                        // quickView()
                    } else {
                        alert(xhr.status)
                    }
                }
                let url = '../php/catFavor.php'
                xhr.open("post", url, true)
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                xhr.send('LIKE_NO=' + heart.getAttribute('data-val') + '&' + 'LIKE=' + heart.getAttribute('data-boolean'))
                }
            })
        }
    
    like();
});