window.addEventListener('load', function () {
    var canvas = document.getElementById("canvas"),
        ctx = canvas.getContext("2d"),
        percent = (totalDonate / 2750) * 100, // 最終百分比
        circleX = canvas.width / 2, // x座標
        circleY = canvas.height / 2, // y座標
        radius = 100, // 圓環半徑
        lineWidth = 20, // 圓形寬度
        fontSize = 30; // 字體大小

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
        ctx.moveTo(cx, cy + r);
        ctx.lineWidth = lineWidth;

        // 渐变色 - 可自定义
        var linGrad = ctx.createLinearGradient(
            circleX, circleY - radius - lineWidth, circleX, circleY + radius + lineWidth
        );
        linGrad.addColorStop(0.0, '#ffa163');
        linGrad.addColorStop(1.0, '#ffe6cf');
        ctx.strokeStyle = linGrad;

        // 圓兩端的樣式
        ctx.lineCap = 'round';

        // 圓
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

        // 中間的字
        ctx.font = fontSize + 'px April';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillStyle = '#333';
        ctx.fillText(parseFloat(process).toFixed(1) + '%', circleX, circleY);

        // 圓形
        circle(circleX, circleY, radius);

        // 圓弧
        sector(circleX, circleY, radius, 0, process / 100 * 360);

        // 控制結束時動畫的速度
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

    var process = 0.0; // 進度
    var circleLoading = window.setInterval(function () {
        loading();
    }, 16);
});