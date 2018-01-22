window.addEventListener('load', () => {
    function getData(info) {
        let xhr = new XMLHttpRequest();
        xhr.onload = function () {
            if (xhr.status == 200) {
                //modify here
                let content = document.getElementById('content');
                content.innerHTML = this.responseText;
            } else {
                alert(xhr.status);
            }
        }
        let url = '../php/halfSearch.php';
        let dataInfo = info;
        xhr.open("post", url, true);
        xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhr.send(dataInfo);
    }
    function ajaxData(e) {

        let searchLoc = document.getElementById('searchLoc').value;
        let searchName = document.getElementById('searchName').value;

        if (searchLoc !== '地區' || searchName !== '') {
            if (searchLoc === '地區') {
                getData('searchName=' + searchName);
            } else if (searchName === '') {
                getData('searchLoc=' + searchLoc);
            } else {
                getData('searchLoc=' + searchLoc + '&' + 'searchName=' + searchName);
            }
        }
    }

    let searchBtn = document.getElementById('searchBtn');
    searchBtn.addEventListener('click', ajaxData);

    getData();
});