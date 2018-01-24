window.addEventListener('load', ()=>{
    let adopt = document.getElementById('adoptThis')
    adopt.addEventListener('click', ()=>{
        let url = "../php/adopt2db.php?" + "CATNO=" + adopt.getAttribute('data-val')
        
        location.href = url        
    })
})