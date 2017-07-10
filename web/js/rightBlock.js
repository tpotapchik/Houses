///**
// * Created by coxa on 17.03.15.
// */
//$(function() {
//    var $block = $('.right-block');
//    var $stopBlock = $('.stop-element');
//    var fixedOffset, stopPosition;
//    setTimeout(function () {
//        fixedOffset = $block.offset().top;
//        stopPosition = $stopBlock.offset().top - $block.height();
//    }, 500);
//
//    $(window).on('scroll', function () {
//        var scrollTop = $(document).scrollTop();
//
//        //fixed right col
//        if (scrollTop >= fixedOffset && scrollTop < stopPosition) {
//            $block.css({position: 'fixed', top: '0', marginLeft: '744px'})
//        } else {
//            $block.css({position: 'static', marginLeft: '0'});
//        }
//    });
//});