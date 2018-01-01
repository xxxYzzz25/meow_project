$(function () {

   //第一個物件
   TweenMax.staggerFromTo(".box", 0.5, {
       x: 0,
       // opacity: 1
   }, {
       x: 120,
       // opacity: 0,
       // scale : 2,
       // rotationY : 360,
       transformOrigin: '100px  20px', //定位點
       ease: Bounce.easeOut,
       //autoAlpha: 0, //自動消失
       // yoyo : true,
       // repeat : 1,
       // repeatDelay : 2
   }, 1);


   //第二個物件

   // TweenMax.to([".section_02 .box1" , ".section_02 .box3"], 1, {
   //     x: 110,
   //     opacity: 1,
   //     className : 'boxer' ,
   //     className : '+=boxer' 


   // });
   var tl = new TimelineMax({
       repeat: -1,
       repeatDelay: 1,
       duration: 2
   });

   tl.add(TweenMax.to(".section_02 .box1", 2, {
       bezier: {
           curviness: 1.25,
           values: [{
               x: 100,
               y: 39
           }, {
               x: 25,
               y: 259
           }, {
               x: 40,
               y: 50
           }, {
               x: 360,
               y: 150
           }, {
               x: 0,
               y: 0
           }],
           //  autoRotate:true
       }
   }))



   tl.add(TweenMax.to(".section_02 .box2", 2, {
       bezier: {
           curviness: 1.25,
           values: [{
               x: 100,
               y: 200
           }, {
               x: 250,
               y: 20
           }, {
               x: 400,
               y: 100
           }, {
               x: 560,
               y: 150
           }, {
               x: 0,
               y: 0
           }],
           //  autoRotate:true
       }
   }));

   tl.add(TweenMax.to(".section_02 .box3", 2, {
       bezier: {
           curviness: 1.25,
           values: [{
               x: 100,
               y: 39
           }, {
               x: 250,
               y: 250
           }, {
               x: 200,
               y: 500
           }, {
               x: 360,
               y: 150
           }, {
               x: 0,
               y: 0
           }],
           //  autoRotate:true
       }
   }))
})

//scroll 觸發事件



$(function () {
   var controller = new ScrollMagic.Controller();
   //
   var tween01 = TweenMax.to(".section_03 .box1", 2, {
       bezier: {
           curviness: 1.25,
           values: [{
               x: 100,
               y: 39
           }, {
               x: 25,
               y: 259
           }, {
               x: 40,
               y: 50
           }, {
               x: 360,
               y: 150
           }, {
               x: 0,
               y: 0
           }],
           //  autoRotate:true
       }
   });

   console.log('scroll ok');

   //scroll 處發點

   var scene = new ScrollMagic.Scene({
           triggerElement: "#trigger1",
       })
       .setTween(tween01)
       .addIndicators()
       .addTo(controller)


	//場景二
	var tween02 =TweenMax.to('.boxso' ,1 ,{
  		x: 100
		})



	var scene2 = new ScrollMagic.Scene({
	    triggerElement: "#trigger2",
	    offset : '100px',
	    duration: '300',
	    reverse: true
	})
	.setClassToggle('.boxers' , 'fadein')
	.setTween(tween02)
	.addIndicators()
	.addTo(controller)
	console.log('scroll_04 ok');


	var scene = document.getElementById('parallax_box');
    var parallax = new Parallax(scene);

});