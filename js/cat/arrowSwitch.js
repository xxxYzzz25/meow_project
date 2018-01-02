window.addEventListener('load', function () {
    let searchCheck = document.getElementById('advanced');
    let arrow = document.getElementById('arrowDown');
    searchCheck.addEventListener('change', function arrowSwitch() {
        if (arrow.className.match('fa-angle-down')) {
            arrow.className =
                arrow.className.replace
                    ('fa-angle-down', 'fa-angle-up')
        } else {
            arrow.className =
                arrow.className.replace
                    ('fa-angle-up', 'fa-angle-down')
        }
    })
});