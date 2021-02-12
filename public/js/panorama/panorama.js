gsap.set('#panorama', {perspective:1200}); //lower number exagerates the 'spheriness'
// var zoom = 0,
var stageH = gsap.getProperty('#panorama', 'height'),
    mouse = {x:0.5, y:0.5}, // not pixels! these track position as a percentage of stage width/height
    pov = { x:0.5, y:0.5, speed: $(window).width() > 1024 ? 0.05 : 1 },
    auto = true;

const   n = 16, //number of divs
        c = $('#panorama');

for (var i=0;i<n;i++) {
    var b = document.createElement('div');
    b.classList.add('box');
    c.append(b);
    gsap.set(b, {
        left:'50%',
        top:'50%',
        xPercent:-50,
        yPercent:-50,
        color:'#fff',
        z:1300,
        width:235,
        height:1400,
        scaleX:-1, //flip horizontally
        rotationY:-89+i/n*-360+90,
        transformOrigin:String("50% 50% -585%"), //adjust 3rd percentage to remove space between divs
        backgroundImage:'url(/'+window.room+')',
        backgroundPosition:i*-235+'px 0px' //offset should match width
    });
}

$(window).resize(function() {
    stageH = gsap.getProperty('#panorama', 'height');
    pov.speed = $(window).width() > 1024 ? 0.05 : 1;
    gsap.to('.box', {y:0});
});

c.mousemove(function (e) {
    auto = false;
    gsap.killTweensOf(mouse);
    mouse.x = e.clientX/window.innerWidth;
    mouse.y = e.clientY/window.innerHeight;
}).mouseleave(function () {
    auto = true;
// }).bind('click',function (e) {
    // if (zoom > 0) zoom = 0;
    // gsap.to('.box', {duration:0.4, z:[1300,1500,1700][0]});
}).bind('touchmove',function (e) {
    // console.log(e.originalEvent.touches[0].pageX);
    auto = false;
    gsap.killTweensOf(mouse);
    mouse.x = e.originalEvent.touches[0].pageX/window.innerWidth;
    mouse.y = e.originalEvent.touches[0].pageY/window.innerHeight;
}).bind('touchend',function () {
    auto = true;
});

setAutoX();
function setAutoX() {
    if (auto) gsap.to(mouse, {duration:5, x:gsap.utils.random(0.45,1), ease:'sine.in'});
    gsap.delayedCall(gsap.utils.random(1,5), setAutoX);
}

setAutoY();
function setAutoY() {
    if (auto) gsap.to(mouse, {duration:6, y:gsap.utils.random(0,1), ease:'sine.in'});
    gsap.delayedCall(gsap.utils.random(4,6), setAutoY);
}

gsap.ticker.add(function () {
    pov.x += (mouse.x - pov.x) * pov.speed;
    pov.y += (mouse.y - pov.y) * pov.speed;
    gsap.set('.box', {
        rotationY: function (i) {return -89+i/n*-360+180*pov.x;},
        y: (Math.abs(1000-stageH)/2)-(Math.abs(1000-stageH))*pov.y
    });
});

$(document).ready(function () {
    var rooms = $('#rooms');
    // rooms.css('bottom',under);
    $('.icon').click(function () {
        var icon = $(this),
            rooms = $('#rooms');

        if ($(this).hasClass('icon-arrow-up15')) {
            rooms.css({
                'top': 'auto',
                'bottom': 0
            });
            icon.removeClass('icon-arrow-up15').addClass('icon-arrow-down15');
        } else {
            rooms.css({
                'top': 'calc(100% - 20px)',
                'bottom': 'auto'
            });
            icon.removeClass('icon-arrow-down15').addClass('icon-arrow-up15');
        }
    });
});