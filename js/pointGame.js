window.addEventListener('load', function () {
    let count = 1; //第幾題
    let subject = {
        questions: [{
                question: '第一題',
                option: ['A','B'],
                answer: 1
            }, {
                question: '第二題',
                option: ['A','B'],
                answer: 2
            }, {
                question: '第三題',
                option: ['A','B'],
                answer: 2
            },
            {
                question: '第四題',
                option: ['A','B'],
                answer: 1
            }, {
                question: '第五題',
                option: ['A','B'],
                answer: 2
            }, {
                question: '第六題',
                option: ['A','B'],
                answer: 2
            }, {
                question: '第七題',
                option: ['A','B'],
                answer: 1
            }, {
                question: '第八題',
                option: ['A','B'],
                answer: 1
            }
        ],
    };

    function showData(obj) {
        obj.questions[count - 1].question;//問題
        obj.questions[count - 1].option[0];//選項一
        obj.questions[count - 1].option[1];//選項二
        obj.questions[count - 1].answer;//答案
        count++;
    }
    showData(subject);
});