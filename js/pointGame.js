window.addEventListener('load', function () {
    let option = [];
    option.push(document.getElementById('optionA'));
    option.push(document.getElementById('optionB'));
    let questNumber = document.getElementById('QuestNumber');
    let cloudQuest = document.getElementById('cloudQuest');
    let hint = document.getElementById('hint');
    let questionsBlock = document.getElementById('questions');
    let know = document.getElementById('i-know');
    let count = 1; //第幾題
    let tempAnswer = '';
    let combon = document.getElementById('combon');
    let windowWidth = document.body.clientWidth;
    let subject = {
        questions: [{
                question: '您有過敏嗎?',
                hint: '即使是短毛貓也會掉毛，尤其是在換毛季節的掉毛量是很可怕的，如果有過敏又無法勤於打掃，領養喵喵前恐怕必須得考慮一下。',
                answer: 1
            }, {
                question: '您成年了嗎?',
                hint: '若您未成年，我們需要您的家長同意簽訂切結書。喵喵是一個小小生命，我們鼓勵您從與他一起成長中學習，但不希望您對於生命只是三分鐘熱度喔！',
                answer: 0
            }, {
                question: '您有潔癖嗎?',
                hint: '絕大多數的喵喵是很愛乾淨的，但喵喵在用完貓砂後他的小腳常常會夾著細碎的貓砂，可能會讓你家灰塵滿天飛喔！',
                answer: 1
            },
            {
                question: '您是情侶一起養嗎?',
                hint: '有些情侶談戀愛時甜蜜蜜，就想養寵物為感情加溫，但是否有先考慮過，萬一有天分手，寵物誰要養？「分手後把貓咪接回來養會觸景傷情。」「貓咪比較喜歡對方，我才不要養他。」如果會有這些想法，那還是不要養比較好。',
                answer: 1
            }, {
                question: '您會長期出國或遠行嗎?',
                hint: '如果出國時間很長，實在難以托付朋友，因為托付以後，朋友對貓也會有感情的，而且，大多數的喵喵都是很怕生的，到了全新的環境，喵喵都要克服極大的壓力才能熟悉新環境。',
                answer: 1
            }, {
                question: '您有經濟能力嗎?',
                hint: '生病的喵喵需要您付出大量的時間、金錢跟陪伴。就跟人一樣，喵喵也會生病，但喵喵沒有健保，而且市面的獸醫師良莠不齊，您可能需要找到更好的醫師來保證喵喵的健康。',
                answer: 0
            }, {
                question: '您能忍受貓的破壞力嗎?',
                hint: '大多數的喵喵都是破壞狂，有的愛咬塑膠袋、有的愛咬椅子、有的愛抓傢俱。假設，如果你的重要帳單或重要文件被貓破壞以後，你能心平氣和接受這個事實嗎？如果要養貓務必把東西收好，如果沒收好就請在災難發生以後，學會寬容以對。',
                answer: 0
            }, {
                question: '您能送走他最後一程嗎?',
                hint: '那應該不是一件愉快的事，但生命都有生老病死。您能在最後一刻陪伴著喵喵，不僅僅是對您的愛貓負責，也是對生命的重視。',
                answer: 0
            }
        ],
    };

    function showData(obj) {
        if (count <= 8) {
            hint.textContent = obj.questions[count - 1].hint;
            questNumber.src = '../images/cloud1_Q' + count + '.png';
            cloudQuest.src = '../images/cloud2_Q' + count + '.png';
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
        tempAnswer = this.dataset.answer;
        if (count > 8 && bingo >= 5) {
            know.textContent = '及格！現在去領養';
            know.addEventListener('click', function () {
                document.location.href = "../html/catSearch.html";
            });
        } else if (count > 8 && bingo < 5) {
            know.textContent = '失敗..再來一次?';
            know.addEventListener('click', reset);
        }
        know.parentNode.style.display = '';
        know.parentNode.style.opacity = '1';
        know.parentNode.style.zIndex = '6';
    }
    // =========================
    function hoverImg(e) {
        if (e.target.id === 'optionA') {
            e.target.style.backgroundImage = 'url(../images/yes_hover.png)';
        } else if (e.target.id === 'optionB') {
            e.target.style.backgroundImage = 'url(../images/no_hover.png)';
        }
    }

    function iKnow(e) {
        this.parentNode.style.display = 'none';
        this.parentNode.style.opacity = '0';
        this.parentNode.style.zIndex = '0';
        if (tempAnswer === 'true') {
            correct();
        } else {
            err();
        }
        showData(subject);
    }

    function reset() {
        count = 1;
        tempAnswer = '';
        bingo = 1;
        know.textContent = '我知道了!';
        know.removeEventListener('click', reset);
        showData(subject);
    }

    option[0].addEventListener('click', adjudge);
    option[1].addEventListener('click', adjudge);
    option[0].addEventListener('mouseenter', hoverImg);
    option[0].addEventListener('mouseleave', function (e) {
        e.target.style.backgroundImage = '';
    });
    option[1].addEventListener('mouseenter', hoverImg);
    option[1].addEventListener('mouseleave', function (e) {
        e.target.style.backgroundImage = '';
    });
    know.addEventListener('click', iKnow);

    let moveArea = document.getElementById('gamePointBottom');
    let people = document.getElementById('people');
    let hug = document.getElementById('hug');
    let gameCount = document.getElementById('game-qty');
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

    if (document.body.clientWidth <= 375) {
        combon.style.display = 'none';
    }

    window.addEventListener('resize', function () {
        windowWidth = document.body.clientWidth;
        res = window.getComputedStyle(moveArea).width.replace('px', '');
        res = Math.floor(res);
        qq();
        if (windowWidth <= 375) {
            combon.style.display = 'none';
        } else {
            combon.style.display = '';
        }
    });

    function correct() {
        switch (bingo) {
            case 1:
                Object.assign(people, {
                    src: '../images/runningBoy_1357.png'
                });
                Object.assign(hug, {
                    src: '../images/runningCat_1357.png'
                });
                break;
            case 2:
                Object.assign(people, {
                    src: '../images/runningBoy_246.png'
                });
                Object.assign(hug, {
                    src: '../images/runningCat_246.png'
                });
                break;
            case 3:
                Object.assign(people, {
                    src: '../images/runningBoy_1357.png'
                });
                Object.assign(hug, {
                    src: '../images/runningCat_1357.png'
                });
                break;
            case 4:
                Object.assign(people, {
                    src: '../images/runningBoy_246.png'
                });
                Object.assign(hug, {
                    src: '../images/runningCat_246.png'
                });
                break;
            case 5:
                Object.assign(people, {
                    src: '../images/runningBoy_1357.png'
                });
                Object.assign(hug, {
                    src: '../images/runningCat_1357.png'
                });
                break;
            case 6:
                Object.assign(people, {
                    src: '../images/runningBoy_246.png'
                });
                Object.assign(hug, {
                    src: '../images/runningCat_246.png'
                });
                break;
            case 7:
                Object.assign(people, {
                    src: '../images/runningBoy_1357.png'
                });
                Object.assign(hug, {
                    src: '../images/runningCat_1357.png'
                });
                break;
            case 8:
                Object.assign(people, {
                    src: '../images/runningBoy_8.png'
                });
                Object.assign(hug, {
                    src: '../images/runningCat_8.png'
                });
                break;
        }
        if (bingo > 8)
            bingo = 8;
        bingo++;
        Object.assign(hug, {
            style: 'right:' + ((width * bingo) - (peopleWidth)) + 'px;'
        });

        Object.assign(people, {
            style: 'left:' + ((width * bingo) - (peopleWidth)) + 'px;'
        });
    }


    function err() {
        bingo--;
        if (bingo <= 0) {
            bingo = 1;
        } else {
            if (windowWidth <= 768) {
                Object.assign(people, {
                    style: 'left:' + (width * bingo) + 'px;transform'
                });
                Object.assign(hug, {
                    style: 'right:' + (width * bingo) + 'px;'
                });
            } else if(windowWidth > 768){
                Object.assign(people, {
                    style: 'left:' + ((width * bingo) - (peopleWidth)) + 'px;transform'
                });
                Object.assign(hug, {
                    style: 'right:' + ((width * bingo) - (peopleWidth)) + 'px;'
                });
            }
        }
    }
});