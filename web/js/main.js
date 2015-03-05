$(function () {
    $('.slider').slick({
        dots: false,
        autoplay: true,
        autoplaySpeed: 5000
    });
    $('.partners').slick({
        dots: false,
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 300
    });

    $('.medium-select').chosen({
        disable_search: true,
        inherit_select_classes: true,
        width: "200px"
    });
    $('.small-select').chosen({
        disable_search: true,
        inherit_select_classes: true,
        width: "100px"
    });


    //$('.more-btn').click(function () {
    //    var $this = $(this);
    //    $this.closest('.main-text-block-wrap').find('.news-body').slideToggle();
    //
    //    if ($this.hasClass('opened')) {
    //        $this.text('Читать полностью');
    //    } else {
    //        $this.text('Свернуть');
    //    }
    //    $this.toggleClass('opened');
    //
    //});

    $(".fancybox").fancybox({
        nextEffect:'fade',
        prevEffect:'fade',
        scrollOutside: false,
        helpers	: {
            thumbs	: {
                width	: 150,
                height	: 150
            },
            overlay: {
                locked: false
            }
        },
        beforeShow : function() {
            var alt = this.element.find('img').attr('alt');

            this.inner.find('img').attr('alt', alt);

            this.title = alt;
        }
    });


    var $document = $(document);
    var scrollTopNew = $document.scrollTop();
    var sidebar = $('.right-block');
    var PanelPosition = sidebar.offset().top;
    

    $(window).on('scroll', function () {
        if ($(document).scrollTop() >= 900) {
            $('.back-top').fadeIn();
        }
        else {
            $('.back-top').fadeOut();
        }

        if (scrollTopNew >= PanelPosition + 56) {
            sidebar.addClass('fixed-sidebar');
            //productSliderStickHeight = sidebar.outerHeight();
        } else {
            sidebar.removeClass('fixed-sidebar');
        }

    });

    $('.back-top').click(function () {
        $('body,html').animate({
            'scrollTop': 0
        }, 400)
    });

    $(".popup").fancybox();

    $('.order-call form').find('input').focus(function () {
        $(this).removeClass('error');
    });

    beforeSubmit = function(event) {
        $form = $(event.target);
        var popup = $('.order-call');
        var message = popup.find('.message');
        $.ajax({
            url: $form.attr('action'),
            type: "POST",
            data: $form.serialize(),
            beforeSend: function(){
                popup.find('.order-call-btn').attr('disabled','disabled').text('Отправляется...').addClass('disabled');
            },
            complete: function (){
                popup.find('.order-call-btn').removeAttr('disabled').text('ЗАКАЗАТЬ ЗВОНОК').removeClass('disabled');
            },
            success: function (data) {
                if (data.error) {
                    alert('Произошла ошибка. Попробуйте еще раз.');
                } else {
                    message.slideDown();

                    setTimeout(function () {
                        $.fancybox.close();
                        $form[0].reset();
                        message.hide();
                    }, 5000);
                }
            },
            error: function () {
                alert('Произошла ошибка. Попробуйте еще раз.');
            }
        });
        return false;
    };

    $('#callUsForm').on('beforeSubmit', beforeSubmit);


    //feedback
    beforeSubmit = function(event) {
        console.log(event, 'my handler');
        $form = $(event.target);
        var popup = $('.feedback-block');
        var message = popup.find('.message');
        $.ajax({
            url: $form.attr('action'),
            type: "POST",
            data: $form.serialize(),
            beforeSend: function(){
                popup.find('.order-call-btn').attr('disabled','disabled').text('Отправляется...').addClass('disabled');
            },
            complete: function (){
                popup.find('.order-call-btn').removeAttr('disabled').text('ОТПРАВИТЬ').removeClass('disabled');
            },
            success: function (data) {
                if (data.error) {
                    alert('Произошла ошибка. Попробуйте еще раз.');
                } else {
                    message.slideDown();

                    setTimeout(function () {
                        $form[0].reset();
                        message.hide();
                    }, 5000);
                }
            },
            error: function () {
                alert('Произошла ошибка. Попробуйте еще раз.');
            }
        });
        return false;
    };
    $('#feedbackForm').on('beforeSubmit', beforeSubmit);

});

