window.addEventListener('load', function () {
    let option = [];
    option.push(document.getElementById('optionA'));
    option.push(document.getElementById('optionB'));
    let questionsBlock = document.getElementById('questions');
    let count = 1; //第幾題
    let subject = {
        questions: [{
                question: '第一題',
                choice: ['第一題A', '第一題B'],
                answer: 0
            }, {
                question: '第二題',
                choice: ['第二題A', '第二題B'],
                answer: 1
            }, {
                question: '第三題',
                choice: ['第三題A', '第三題B'],
                answer: 1
            },
            {
                question: '第四題',
                choice: ['第四題A', '第四題B'],
                answer: 0
            }, {
                question: '第五題',
                choice: ['第五題A', '第五題B'],
                answer: 1
            }, {
                question: '第六題',
                choice: ['第六題A', '第六題B'],
                answer: 1
            }, {
                question: '第七題',
                choice: ['第七題A', '第七題B'],
                answer: 0
            }, {
                question: '第八題',
                choice: ['第八題A', '第八題B'],
                answer: 0
            }
        ],
    };

    function showData(obj) {
        if (count <= 8) {
            questionsBlock.textContent = obj.questions[count - 1].question; //問題
            option[0].textContent = obj.questions[count - 1].choice[0]; //選項一
            option[1].textContent = obj.questions[count - 1].choice[1]; //選項二
            if (obj.questions[count - 1].answer === 0) { //答案
                option[0].dataset.answer = 'true';
                option[1].dataset.answer = '';
            } else {
                option[0].dataset.answer = '';
                option[1].dataset.answer = 'true';
            }
            count++;
        } else {
            count = 1;
        }
    }
    showData(subject);

    function adjudge() {
        if (this.dataset.answer === 'true') {
            correct();
        } else {
            err();
        }
        showData(subject);
    }
    // =========================
    option[0].addEventListener('click', adjudge);
    option[1].addEventListener('click', adjudge);

    let moveArea = document.getElementById('gamePointBottom');
    let people = document.getElementById('people');
    let hug = document.getElementById('hug');
    let bingo = 1;
    let width;
    let peopleWidth = window.getComputedStyle(people).width.replace('px', '');
    let hugWidth = window.getComputedStyle(hug).width.replace('px', '');

    peopleWidth = Math.floor(peopleWidth);
    hugWidth = Math.floor(hugWidth);

    let res = window.getComputedStyle(moveArea).width.replace('px', '');
    res = Math.floor(res);

    let qq = function () {
        res /= 2;
        width = Math.ceil(res / 9);
    }
    qq();
    window.addEventListener('resize', function () {
        res = window.getComputedStyle(moveArea).width.replace('px', '');
        res = Math.floor(res);
        qq();
    });

    function correct() {
        bingo++;
        if (bingo % 2 === 1) {
            if (bingo > 8) {
                Object.assign(people, {
                    style: 'left:' + ((width * bingo) - (peopleWidth)) + 'px;transform: rotate(0)'
                });
            } else {
                Object.assign(people, {
                    style: 'left:' + ((width * bingo) - (peopleWidth / 2)) + 'px;transform: rotate(-25deg)'
                });
            }
        } else if (bingo > 8) {
            Object.assign(people, {
                style: 'left:' + ((width * bingo) - (peopleWidth)) + 'px;transform: rotate(0)'
            });
        } else {
            Object.assign(people, {
                style: 'left:' + ((width * bingo) - (peopleWidth / 2)) + 'px;transform: rotate(0)'
            });
        }
        if (bingo > 8) {
            Object.assign(hug, {
                style: 'right:' + ((width * bingo) - (peopleWidth / 2)) + 'px;transform: rotate(-35deg) translateY(-15px);'
            });
        } else {
            Object.assign(hug, {
                style: 'right:' + ((width * bingo) - (peopleWidth / 2)) + 'px;'
            });
        }
    }

    function err() {
        bingo--;
        if (bingo <= 0) {
            bingo = 1;
        } else {
            Object.assign(people, {
                style: 'left:' + ((width * bingo) - (peopleWidth / 2)) + 'px;transform'
            });
            Object.assign(hug, {
                style: 'right:' + ((width * bingo) - (peopleWidth / 2)) + 'px;'
            });
        }
    }
});