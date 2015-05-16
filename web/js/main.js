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



    $(window).on('scroll', function () {
        var scrollTop = $(document).scrollTop();

        if (scrollTop >= 900) {
            $('.back-top').fadeIn();
        }
        else {
            $('.back-top').fadeOut();
        }
    });
    $(window).on('scroll', function () {
        var scrollTop = $(document).scrollTop();

        if (scrollTop >= 380) {
            $('.social-help').fadeIn();
        }
        else {
            $('.social-help').fadeOut();
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

