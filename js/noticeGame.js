function doFirst() {
    let image = document.querySelectorAll('[draggable="true"]');
    image.forEach(image => {
        image.addEventListener('dragstart', startDrag);
        // image.addEventListener('dragend', endDrag);
    })

    let box = document.querySelectorAll('[data-role="drag-drop-container"]')
    box.forEach(box => {
        box.addEventListener('drop', dropped)
        box.addEventListener('dragenter', function (e) {
            e.preventDefault();
        })
        box.addEventListener('dragover', function (e) {
            e.preventDefault();
        })
    })
    let temp = '';
    let obj = {
        correct: ['banana', 'egg', 'watermelon'],
        error: ['cookie', 'milk'],
        hint: {
            banana: '111',
            egg: '222',
            watermelon: '222',
            cookie: '222',
            milk: '222'
        }
    };
    let hinttext = document.getElementById('hinttext');
    let hintbox = document.getElementById('hintbox');
    let know = document.getElementById('know');

    function startDrag(e) {
        let data = '<img src="' + e.target.src + '">';
        e.dataTransfer.setData('image/jpeg', data);
        temp = e.target;
    }

    // function endDrag(e) {
    //     e.target.style.visibility = 'hidden';
    // }

    function dropped(e) {
        temp.style.visibility = 'hidden';
        let data = e.dataTransfer.getData('image/jpeg');
        let arr = [];

        e.target.innerHTML = data;
        e.preventDefault();
        arr = data.split('/');
        arr = arr[arr.length - 1];
        arr = arr.slice(0, length - 6);

        if (e.target.dataset.box === 'left') {
            if (obj.correct.indexOf(arr) !== -1) {
                show(arr);
            } else {
                err();
            }
        } else if (e.target.dataset.box === 'right') {
            if (obj.error.indexOf(arr) !== -1) {
                show(arr);
            } else {
                err();
            }
        }
    }

    function show(str) {
        hinttext.textContent = obj.hint[str];
        hintbox.style.opacity = '1';
        hintbox.style.zIndex = '10';
    }

    function err() {
        hinttext.textContent = "答錯囉!再試一次吧!";
        hintbox.style.opacity = '1';
        hintbox.style.zIndex = '10';
        temp.style.visibility = 'visible';
    }

    know.addEventListener('click',function know() {
        hintbox.style.opacity = '0';
        hintbox.style.zIndex = '-1';
    })
}
window.addEventListener('load', doFirst);