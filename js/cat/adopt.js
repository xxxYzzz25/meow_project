window.addEventListener('load', ()=>{
    let adopt = document.getElementById('adoptThis')
    adopt.addEventListener('click', ()=>{
        console.log(adopt.getAttribute('data-val'))
        let url = "../php/adopt2db.php?" + "CATNO=" + adopt.getAttribute('data-val')
        console.log(url)
        
        location.href = url        
    })
})