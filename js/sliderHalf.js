window.addEventListener('load', function () {

    function List(obj, len) {
        this.obj = obj;
        this.len = len;
        this.count = 0;
        this.moveL = ()=>{
            this.count--;
            if (this.count < 0) {
                this.count = this.len - 1;
            }
            $(this.obj).stop().animate({
                left: (this.count * -100) + '%'
            });
        }
        this.moveR = ()=>{
            this.count++;
            if (this.count >= this.len) {
                this.count = 0;
            }
            $(this.obj).stop().animate({
                left: (this.count * -100) + '%'
            });
        }
        $(this.obj).siblings('.arrowLeft').on('click', this.moveL);
        $(this.obj).siblings('.arrowRight').on('click', this.moveR);
    }
    let halfList = document.getElementById('half-list');
    let half = new List(halfList, $(halfList).children('li').length);
    let prodList = document.getElementById('prod-list');
    let prod = new List(prodList,$(prodList).children('li').length);
});