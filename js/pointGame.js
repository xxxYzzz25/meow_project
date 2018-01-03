window.addEventListener('load', function () {
    let count = 1; //第幾題
    let subject = {
        questions: [{
                question: '第一題',
                option: ['A', 'B'],
                answer: 1
            }, {
                question: '第二題',
                option: ['A', 'B'],
                answer: 2
            }, {
                question: '第三題',
                option: ['A', 'B'],
                answer: 2
            },
            {
                question: '第四題',
                option: ['A', 'B'],
                answer: 1
            }, {
                question: '第五題',
                option: ['A', 'B'],
                answer: 2
            }, {
                question: '第六題',
                option: ['A', 'B'],
                answer: 2
            }, {
                question: '第七題',
                option: ['A', 'B'],
                answer: 1
            }, {
                question: '第八題',
                option: ['A', 'B'],
                answer: 1
            }
        ],
    };

    function showData(obj) {
        obj.questions[count - 1].question; //問題
        obj.questions[count - 1].option[0]; //選項一
        obj.questions[count - 1].option[1]; //選項二
        obj.questions[count - 1].answer; //答案
        count++;
    }
    showData(subject);
});


window.addEventListener('load', function () {
    document.getElementById('correct').addEventListener('click', correct);
    document.getElementById('err').addEventListener('click', err);

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
        if(bingo > 8){
            Object.assign(hug, {
                style: 'right:' + ((width * bingo) - (peopleWidth / 2)) + 'px;transform: rotate(-35deg) translateY(-15px);'
            });
        }else{
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