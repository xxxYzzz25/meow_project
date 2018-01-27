

window.addEventListener('load',()=>{

    function showLike(){
    
        
        let dataInfo = `pathName=${pathName}`;
        let url = pathName === 'homepage.php' ? './php/showLikeData.php' : '../php/showLikeData.php';
        let xhr = new XMLHttpRequest();
        xhr.open('post',url);
        xhr.onload = function(){
            likeBox.innerHTML = this.responseText;
            Object.assign(likeBox,{style: 'display: block;'});
            Object.assign(likeBoxBack,{style: 'display: block;'});
        }
        xhr.setRequestHeader('Content-Type',  'application/x-www-form-urlencoded');
        xhr.send(dataInfo);

    }
    let likeBox = document.getElementById('likeBox');
    let likeBoxBack = document.getElementById('likeBoxBack');
    let pathName = location.pathname.split('/');
    let likeBoxBtn;
    if(document.getElementById('likeBoxBtn')){
        likeBoxBtn = document.getElementById('likeBoxBtn');
        likeBoxBtn.addEventListener('click',showLike);
    }
    pathName = pathName[pathName.length-1];
    likeBoxBack.addEventListener('click',(e)=>{
        if(e.target !=likeBox){
            Object.assign(likeBox,{style: 'display: none;'});
            Object.assign(likeBoxBack,{style: 'display: none;'});
        }
        
    });
    
});