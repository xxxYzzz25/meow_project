window.addEventListener('load', () => {
    function getData(info) {
        let xhr = new XMLHttpRequest()
        xhr.onload = function () {
            if (xhr.status == 200) {
                let content = document.getElementById('content')
                content.innerHTML = this.responseText
                like()
                quickView()
            } else {
                alert(xhr.status)
            }
        }
        let url = '../php/catSearch.php?' + info
        xhr.open("get", url, true)
        // xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhr.send()
    }
    function ajaxData(e) {
        let searchText = document.getElementById('searchText').value
        let sort = document.getElementById('sortCat').value
        if (searchText !== '') {
            if (sort == 2) {
                getData('sort=2&searchText=' + searchText)
            } else {
                getData('sort=1&searchText=' + searchText)
            }
        } else {
            if (sort == 2) {
                getData('sort=2')
            }
            else {
                getData('sort=1')
            }
        }
    }
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
                        quickView()
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
    function quickView() {
        let qkV = document.getElementsByClassName('quickView')
        for (let i = 0, len = qkV.length; i < len; i++) {
            qkV[i].addEventListener('click', () => {
                let xhr = new XMLHttpRequest()
                xhr.onload = function () {
                    if (xhr.status == 200) {
                        let black = document.getElementById('black')
                        black.style.display = 'block'
                        let content = document.getElementById('quickViewArea')
                        content.style.display = 'block'
                        content.innerHTML = this.responseText
                        off()
                    } else {
                        alert(xhr.status)
                    }
                }
                let url = '../php/catQuickView.php'
                xhr.open("post", url, true)
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                xhr.send('CAT_NO=' + qkV[i].getAttribute('data-val'))
            })
        }
    }
    function advancedSearch() {
        let advancedSearch = document.getElementsByClassName('condition')
        for (let i = 0, len = advancedSearch.length; i < len; i++) {
            advancedSearch[i].addEventListener('click', ()=>{
                console.log(advancedSearch[i].getAttribute('data-name'));
                console.log(advancedSearch[i].getAttribute('data-val'));
                let 
                
            })
        }
        
    }
    function off() {
        let black = document.getElementById('black')
        let content = document.getElementById('quickViewArea')
        let cancelQkv = document.getElementById('cancelQkv')
        black.addEventListener('click', () => {
            black.style.display = 'none'
            content.style.display = 'none'
        })
        cancelQkv.addEventListener('click', () => {
            black.style.display = 'none'
            content.style.display = 'none'
        })
    }
    $(document).ready(function () {
        // 以下是燈箱置中
        moveCenter();
        $(window).resize(function () {
            moveCenter();
        });
        function moveCenter() {
            winWidth = $(window).width();
            winHeight = $(window).height();
            divWidth = $('#quickViewArea').width();
            divHeight = $('#quickViewArea').height();

            $('#quickViewArea').css({
                left: (winWidth - divWidth) / 2,
                top: (winHeight - divHeight) / 2
            });
        }
    });
    let searchInput = document.getElementById('searchText')
    searchInput.addEventListener('input', ajaxData)
    let sort = document.getElementById('sortCat')
    sort.addEventListener('change', ajaxData)

    advancedSearch()
    like()
    quickView()
});