
// const wrapToBox = () => {
//     const items = $('.insert-page');

//     items.wrapAll('<div id="box"></div>');
// };

// $(document).ready(() => {
//     wrapToBox();

//     const container = $('#box');

//     const $body = $('html, body');
//     const actualSection = 0;
//     const totalSections = 5;
//     const speed = 500;
//     const isScrolling = false;
//     const clicking = false;
//     const friction = 100;
//     let scrollingTimer;
//     let startY;

//     $('body').swipe({
//         swipe: function(event,direction) {
//             if(direction == 'up') {
//                 moveScroll('down');
//             } else if(direction == 'down') {
//                 moveScroll('up');
//             }
//         }
//     });
//     $('body, a, iframe').on('touchmove',function(e){
//         e.stopPropagation();
//         e.preventDefault();
//     });
//     $('a, iframe').on('mouseenter',function(e){
//         e.stopPropagation();
//         e.preventDefault();
//     });
//     $.browserSwipe({
//         up: function(){
//             moveScroll('up');
//         },
//         down: function(){
//             moveScroll('down');
//         }
//     });

//     var resizeTimeout;
//     $(window).on('resize' , function() {
//         clearTimeout(resizeTimeout);
//         resizeTimeout = setTimeout(function() {
//             moveScroll();
//         }, 600);
//     });

//     var moveScroll = function(dir){

//         if ($body.is(':animated') == false) {
//             isScrolling = true;
//             clearTimeout(scrollingTimer);

//             if (dir == 'up') {
//                 actualSection = actualSection <= 0 ? 0 : actualSection - 1;
//             } else if (dir == 'down') {
//                 actualSection = actualSection >= totalSections - 1 ? totalSections - 1 : actualSection + 1;
//             }

//             $('#scroll').css({transform: 'translateY(-' + actualSection * $(window).height() +'px)'}, speed);

//             scrollingTimer = setTimeout(function(){
//                 isScrolling = false;
//                 clicking = false;
//             }, speed + 10);
//         }
//     }
// });

