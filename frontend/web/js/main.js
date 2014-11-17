$(function () {
    $('input[type="text"], input[type="email"], input[type="tel"], textarea').focus(function () {
        if ($(this).val() == $(this).attr("title")) {
            $(this).val("");
        }
    }).blur(function () {
                if ($(this).val() == "") {
                    $(this).val($(this).attr("title"));
                }
            });

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

    $('#js-submit').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        var popup = $('.order-call');
        var message = popup.find('.message');
        var $form = popup.find('form');
        var $inputName = $form.find('input[type="text"]');
        var $inputTel = $form.find('input[type="tel"]');

        if ($inputName.val() == '') {
            $inputName.addClass('error');

        } else if ($inputTel.val() == '') {
            $inputTel.addClass('error');

        } else if (!validatePhone($inputTel.val())) {
            $inputTel.addClass('error');

        } else {
            $this.attr('disabled', 'disabled');
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
                            $this.removeAttr('disabled');
                        }, 5000);
                    }
                },
                error: function () {
                    alert('Произошла ошибка. Попробуйте еще раз.');
                }
            });
        }
    });

    $('.order-call form').find('input').focus(function () {
        $(this).removeClass('error');
    })


});

function validatePhone(phone) {
    var reg = /^[0-9\s\-\(\)\+]+$/;
    return reg.test(phone);
}

