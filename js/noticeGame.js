function doFirst() {
    let x = $(window).width();
    $(window).on('resize', function () {
        x = $(window).width();
    })
    if (x > 991) {
        desk();
    } else {
        small();
    }

    function desk() {
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

        let num = 0;
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
                    num++;
                } else {
                    err();
                }
            } else if (e.target.dataset.box === 'right') {
                if (obj.error.indexOf(arr) !== -1) {
                    show(arr);
                    num++;
                } else {
                    err();
                }
            }
            if (num == 5) {
                if (localStorage.getItem('memNo')) {
                    know.textContent = '恭喜您~全部答對囉!(獎品只能拿一次喔!)';
                    know.addEventListener('click', function () {
                        window.location.href = '../html/Cat_ShoppingStore.php';
                    });
                } else {
                    know.textContent = '恭喜您~全部答對囉! 您可以獲得50元商城首購優惠 現在馬上前往商城購物吧!';
                    know.addEventListener('click', function () {
                        e.preventDefault;
                        if (localStorage.getItem('memNo')) {
                            // 叫php寫入分數後轉址
                            let memNo = localStorage.getItem('memNo');
                            window.location.href = `./php/discount.php?memNo=${memNo}&discount=${discount}`;

                        } else if (localStorage.getItem('halfNo')) {

                            let halfNo = localStorage.getItem('halfNo');
                            window.location.href = `./php/discount.php?halfNo=${halfNo}&discount=${discount}`;

                        } else {
                            alert('請登入會員')
                            localStorage.setItem('discount', 1);
                            document.getElementById('discount').value = 1;
                            showLogin();
                        }
                    });
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

        know.addEventListener('click', function know() {
            hintbox.style.opacity = '0';
            hintbox.style.zIndex = '-1';
        })
    }

    function small() {
        let left = document.getElementById('left'); //左
        let right = document.getElementById('right'); //右
        let hinttext = document.getElementById('hinttext');
        let hintbox = document.getElementById('hintbox');
        let know = document.getElementById('know');
        let imgbox = document.getElementById('imgbox');
        let num = 0;
        let count = 1;
        let obj = {
            questions: [{
                question: 'banana',
                hint: '香蕉是無毒性的水果，貓咪可以少量食用。過量可能會引起貓咪腹瀉、嘔吐、肚子疼。',
                answer: 'left'
            }, {
                question: 'egg',
                hint: '生雞蛋中可能含有沙門氏菌，極容易造成貓咪急性胃腸炎，給貓咪造成不小的痛苦。生雞蛋中含有天然的蛋白質抗生物素蛋白，貓咪過度吸收素蛋白會妨礙生物素（又名維生素B7或H）的吸收及功能發揮，偏偏生物素對於脂肪的新陳代謝、細胞生長和二氧化碳轉移方面的功能無可替代。',
                answer: 'right'
            }, {
                question: 'watermelon',
                hint: '貓咪是可以吃一點西瓜的，但是貓咪吃西瓜是不吸收的。貓是肉食動物，吃水果是吸收不了的。別給吃太多就行了，還有剛從冰箱裡拿出來的東西別立刻給，一定要在外面放一會，要是涼的該拉肚子啦!',
                answer: 'left'
            }, {
                question: 'cookie',
                hint: '巧克力中含有大量的甲基黃嘌呤鹼類，主要以可可鹼與咖啡因為主。若是貓狗過量攝取，會造成急性的腸胃道、神經、及心臟方面的中毒症狀。',
                answer: 'right'
            }, {
                question: 'milk',
                hint: '很多貓咪在喝了牛奶或乳製品後造成下痢（腹瀉），原因是缺乏乳糖消化脢和乳糖酵素，以致於牛奶中的乳糖不能在腸道中發酵，無法被身體消化所致，而這些無法消化的乳糖又會造成細菌的繁殖，反而會吸收水份造成下痢，這樣的情況，跟人類的乳糖不耐症很類似。',
                answer: 'left'
            }],
        };

        left.addEventListener('click', leftfood);
        right.addEventListener('click', rightfood);


        function leftfood() {
            let id = this.id; //盒子名字
            if (obj.questions[count - 1].answer == id) {
                show();
                num++;
                count++;
            } else {
                err();
            }
            if (num == 5) {
                if (localStorage.getItem('memNo')) {
                    know.textContent = '恭喜您~全部答對囉!(獎品只能拿一次喔!)';
                    know.addEventListener('click', function () {
                        window.location.href = '../html/Cat_ShoppingStore.php';
                    });
                } else {
                    know.textContent = '恭喜您~全部答對囉! 您可以獲得50元商城首購優惠 現在馬上前往商城購物吧!';
                    know.addEventListener('click', function () {
                        if (localStorage.getItem('memNo')) {
                            // 叫php寫入分數後轉址
                            let memNo = localStorage.getItem('memNo');
                            window.location.href = `./php/discount.php?memNo=${memNo}&discount=${discount}`;

                        } else if (localStorage.getItem('halfNo')) {

                            let halfNo = localStorage.getItem('halfNo');
                            window.location.href = `./php/discount.php?halfNo=${halfNo}&discount=${discount}`;

                        } else {
                            alert('請登入會員')
                            localStorage.setItem('discount', 1);
                            document.getElementById('discount').value = 1;
                            showLogin();
                        }
                    });
                }
            }
        }

        function rightfood() {
            let id = this.id; //盒子名字
            if (obj.questions[count - 1].answer == id) {
                show();
                num++;
                count++;
            } else {
                err();
            }
        }

        function show() {
            hinttext.textContent = obj.questions[count - 1].hint;
            hintbox.style.opacity = '1';
            hintbox.style.zIndex = '10';
        }

        function err() {
            hinttext.textContent = "答錯囉!再試一次吧!";
            hintbox.style.opacity = '1';
            hintbox.style.zIndex = '10';
        }

        function changepic() {
            let center = document.getElementById('center'); //中間圖片
            let arr = center.childNodes[1].src.split('/');
            arr = arr[arr.length - 1];
            arr = arr.slice(0, length - 4); //圖片名字

            center.childNodes[1].setAttribute('src', 'images/noticeGame/' + obj.questions[count - 1].question + '.png');
            console.log(center.childNodes[1]);
        }

        know.addEventListener('click', function know() {
            hintbox.style.opacity = '0';
            hintbox.style.zIndex = '-1';
            changepic();
        })
    }
}
window.addEventListener('load', doFirst);