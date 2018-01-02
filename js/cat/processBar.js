window.addEventListener('load', function () {
    /* by www.geekwen.com */
    var canvas = document.getElementById("canvas"),
        ctx = canvas.getContext("2d"),
        percent = (1800 / 2750) * 100, // 最终百分比
        circleX = canvas.width / 2, // 中心x坐标
        circleY = canvas.height / 2, // 中心y坐标
        radius = 100, // 圆环半径
        lineWidth = 20, // 圆形线条的宽度
        fontSize = 30; // 字体大小

    // 画圆
    function circle(cx, cy, r) {
        ctx.beginPath();
        ctx.moveTo(cx + r, cy);
        ctx.lineWidth = lineWidth;
        ctx.strokeStyle = '#fef0f0';
        ctx.arc(cx, cy, r, 0, Math.PI * 2);
        ctx.closePath();
        ctx.stroke();
    }

    // 画弧线
    function sector(cx, cy, r, startAngle, endAngle, anti) {
        ctx.beginPath();
        ctx.moveTo(cx, cy + r); // 从圆形底部开始画
        ctx.lineWidth = lineWidth;

        // 渐变色 - 可自定义
        var linGrad = ctx.createLinearGradient(
            circleX, circleY - radius - lineWidth, circleX, circleY + radius + lineWidth
        );
        linGrad.addColorStop(0.0, '#ffa163');
        linGrad.addColorStop(1.0, '#ffe6cf');
        ctx.strokeStyle = linGrad;

        // 圆弧两端的样式
        ctx.lineCap = 'round';

        // 圆弧
        ctx.arc(
            cx, cy, r,
            startAngle * (Math.PI / 180.0) + (Math.PI / 2),
            endAngle * (Math.PI / 180.0) + (Math.PI / 2),
            anti
        );
        ctx.stroke();
    }

    // 刷新
    function loading() {
        if (process >= percent) {
            clearInterval(circleLoading);
        }

        // 清除canvas内容
        ctx.clearRect(0, 0, circleX * 2, circleY * 2);

        // 中间的字
        ctx.font = fontSize + 'px April';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillStyle = '#999';
        ctx.fillText(parseFloat(process).toFixed(1) + '%', circleX, circleY);

        // 圆形
        circle(circleX, circleY, radius);

        // 圆弧
        sector(circleX, circleY, radius, 0, process / 100 * 360);

        // 控制结束时动画的速度
        if (process / percent > 0.90) {
            process += 0.30;
        } else if (process / percent > 0.80) {
            process += 0.55;
        } else if (process / percent > 0.70) {
            process += 0.75;
        } else {
            process += 1.0;
        }
    }

    var process = 0.0; // 进度
    var circleLoading = window.setInterval(function () {
        loading();
    }, 16);
});