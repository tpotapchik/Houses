$(function () {
    $('.slider').slick({
        dots: false
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

    $('.more-btn').click(function () {
        var $this = $(this);
        $this.closest('.main-text-block-wrap').find('.news-body').slideToggle();

        if ($this.hasClass('opened')) {
            $this.text('Читать полностью');
        } else {
            $this.text('Свернуть');
        }
        $this.toggleClass('opened');

    });

    $(".fancybox").fancybox({
        nextEffect:'fade',
        prevEffect:'fade'
    });

    $(window).on('scroll', function () {
        if ($(document).scrollTop() >= 900) {
            $('.back-top').fadeIn();
        }
        else {
            $('.back-top').fadeOut();
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
        console.log(event, 'my handler');
        $form = $(event.target);
        var popup = $('.order-call');
        var message = popup.find('.message');
        $.ajax({
            url: $form.attr('action'),
            type: "POST",
            data: $form.serialize(),
            success: function (data) {
                if (data.error) {
                    alert('Произошла ошибка');
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
            success: function (data) {
                if (data.error) {
                    alert('Произошла ошибка');
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

