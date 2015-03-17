/**
 * Created by coxa on 17.03.15.
 */
$(function(){
    var FancyOptions = {
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
    };

    var openGallery = function(){
        FancyOptions.index = $(this).data('imgIndex');
        $.fancybox($('a[rel=gallery2]'), FancyOptions);
    };

    $('a.openGallery').each(function(index, link){
        link = $(link);
        var classType = link.data('index');

        var imagesCollection = $('.fancybox');
        for(var i=0; imagesCollection.length > i; i++)
        {
            if ($(imagesCollection[i]).hasClass(classType)){
                break;
            }
        }

        link.data('imgIndex', i);

    }).on('click', openGallery);
});