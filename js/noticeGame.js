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
            banana: '香蕉是無毒性的水果，貓咪可以少量食用。過量可能會引起貓咪腹瀉、嘔吐、肚子疼。',
            egg: '生雞蛋中可能含有沙門氏菌，極容易造成貓咪急性胃腸炎，給貓咪造成不小的痛苦。生雞蛋中含有天然的蛋白質抗生物素蛋白，貓咪過度吸收素蛋白會妨礙生物素（又名維生素B7或H）的吸收及功能發揮，偏偏生物素對於脂肪的新陳代謝、細胞生長和二氧化碳轉移方面的功能無可替代。',
            watermelon: '貓咪是可以吃一點西瓜的，但是貓咪吃西瓜是不吸收的。貓是肉食動物，吃水果是吸收不了的。別給吃太多就行了，還有剛從冰箱裡拿出來的東西別立刻給，一定要在外面放一會，要是涼的該拉肚子啦!',
            cookie: '巧克力中含有大量的甲基黃嘌呤鹼類，主要以可可鹼與咖啡因為主。若是貓狗過量攝取，會造成急性的腸胃道、神經、及心臟方面的中毒症狀。',
            milk: '很多貓咪在喝了牛奶或乳製品後造成下痢（腹瀉），原因是缺乏乳糖消化脢和乳糖酵素，以致於牛奶中的乳糖不能在腸道中發酵，無法被身體消化所致，而這些無法消化的乳糖又會造成細菌的繁殖，反而會吸收水份造成下痢，這樣的情況，跟人類的乳糖不耐症很類似。'
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