window.addEventListener('load', function () {
    function upDateLike() {//更新追蹤數量
        let likeText = document.getElementById('like');
        let likeList = sessionStorage.getItem('likeList').split('.');//分割字串為陣列 長度為追蹤數量
        likeText.textContent = likeList.length;
    }
});