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
        xhr.send()
    }
    function getDataJson(json) {
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
        let xxx = JSON.stringify(json);
        let url = '../php/catSearch.php'
        xhr.open("post", url, true)
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(xxx)
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
        var advancedSearch = document.getElementsByClassName('condition')
        var color = new Array
        var location = new Array
        var gender = new Array

        for (let i = 0, len = advancedSearch.length; i < len; i++) {
            advancedSearch[i].addEventListener('click', () => {
                var name = advancedSearch[i].getAttribute('data-name')
                var val = advancedSearch[i].getAttribute('data-val')
                if (advancedSearch[i].getAttribute('data-name') == 'color') {
                    switch (val) {
                        case "0": {
                            val = "黑白";
                            break;
                        }
                        case "1": {
                            val = "虎斑";
                            break;
                        }
                        case "2": {
                            val = "橘白";
                            break;
                        }
                        case "3": {
                            val = "橘";
                            break;
                        }
                        case "4": {
                            val = "黑";
                            break;
                        }
                    }
                } else if (advancedSearch[i].getAttribute('data-name') == 'location') {
                    switch (val) {
                        case "0": {
                            val = "台北市";
                            break;
                        }
                        case "1": {
                            val = "新北市";
                            break;
                        }
                        case "2": {
                            val = "基隆市";
                            break;
                        }
                        case "3": {
                            val = "桃園市";
                            break;
                        }
                        case "4": {
                            val = "新竹市";
                            break;
                        }
                        case "5": {
                            val = "新竹縣";
                            break;
                        }
                        case "6": {
                            val = "宜蘭縣";
                            break;
                        }
                        case "7": {
                            val = "苗栗縣";
                            break;
                        }
                        case "8": {
                            val = "台中市";
                            break;
                        }
                        case "9": {
                            val = "彰化市";
                            break;
                        }
                        case "10": {
                            val = "南投市";
                            break;
                        }
                        case "11": {
                            val = "雲林市";
                            break;
                        }
                        case "12": {
                            val = "新竹市";
                            break;
                        }
                        case "13": {
                            val = "嘉義縣";
                            break;
                        }
                        case "14": {
                            val = "嘉義市";
                            break;
                        }
                        case "15": {
                            val = "台南市";
                            break;
                        }
                        case "16": {
                            val = "高雄市";
                            break;
                        }
                        case "17": {
                            val = "屏東市";
                            break;
                        }
                        case "18": {
                            val = "花蓮縣";
                            break;
                        }
                        case "19": {
                            val = "台東縣";
                            break;
                        }
                        case "20": {
                            val = "離島";
                            break;
                        }
                    }
                }
                if (advancedSearch[i].className.match('conditionSelected')) {
                    if (advancedSearch[i].getAttribute('data-name') == 'color') {
                        removeByValue(color, val)
                        console.log(color);
                        
                    } else if (advancedSearch[i].getAttribute('data-name') == 'location') {
                        removeByValue(location, val)
                    } else if (advancedSearch[i].getAttribute('data-name') == 'gender') {
                        removeByValue(gender, val)
                    }
                } else {
                    if (advancedSearch[i].getAttribute('data-name') == 'color') {
                        color.push(val)
                        console.log(color);
                    } else if (advancedSearch[i].getAttribute('data-name') == 'location') {
                        location.push(val)
                    } else if (advancedSearch[i].getAttribute('data-name') == 'gender') {
                        gender.push(val)
                    }
                }
                var obj = new Object
                obj.color = color
                obj.location = location
                obj.gender = gender
                getDataJson(obj);
            })
        }
        
        // getDataJson(obj)
        
    }

    function removeByValue(arr, val) {
        for (var i = 0; i < arr.length; i++) {
            if (arr[i] == val) {
                arr.splice(i, 1);
                break;
            }
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