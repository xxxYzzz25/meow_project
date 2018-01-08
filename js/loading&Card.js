let  createCard = function() {
    let find = document.getElementById('find');
    let wait = document.getElementById('wait');
    let findQty = '678';
    let waitQty = '769';
    findQty = findQty.split('');
    waitQty = waitQty.split('');
    findQty.reverse();
    waitQty.reverse();
    function createNumber(obj, qty) { //stage > content > (ul)icon > (li)stage-1-icon-$ > (span*2)stage-1-icon-top&bottom
        let stage = document.createElement('div');
        let content = document.createElement('div');
        let icon = document.createElement('ul');
        let time = .1;
        Object.assign(stage, {
            id: 'stage-1',
            className: 'stage stage-state-default',
        });
        Object.assign(content, {
            className: 'stage-content'
        });
        Object.assign(icon, {
            className: 'stage-1-icon'
        });
        for (let i = 0; i <= qty; i++) {
            let li = document.createElement('li');
            let top = document.createElement('span');
            let bottom = document.createElement('span');
            Object.assign(li, {
                className: 'stage-1-icon-' + i,
            });
            if (i == qty) {
                Object.assign(top, {
                    className: 'stage-1-icon-top'
                });
                top.style.webkitAnimationPlayState = "paused";
                Object.assign(bottom, {
                    className: 'stage-1-icon-bottom'
                });
            } else {
                Object.assign(top, {
                    className: 'stage-1-icon-top'
                });
                Object.assign(bottom, {
                    className: 'stage-1-icon-bottom'
                });
            }
            time += 0.2;
            li.appendChild(top);
            li.appendChild(bottom);
            icon.appendChild(li);
        }
        content.appendChild(icon);
        stage.appendChild(content);
        obj.insertBefore(stage,obj.firstChild);
    }
    for (const iterator of findQty) {
        createNumber(find, iterator);
    }
    for (const iterator of waitQty) {
        createNumber(wait, iterator);
    }
}
window.addEventListener('load', function () {
    $('#fullpages').fullpage({
        'navigation': true,
        'anchors': ['page1', 'page2', 'page3', 'page4', 'page5', 'page6', 'page7'],
    });
    window.setTimeout(function () {
        let loading = document.getElementById('loading');
        Object.assign(loading, {
            'style': 'opacity:0;z-index:-1;'
        });
        createCard();
    }, 300);
});