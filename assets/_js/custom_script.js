
$(document).ready(function(){
    $(".card-links").click(function(){
        var $dlink = $(this).find('.card').data('link');
        window.location.href = $dlink;
    });

    // function
    $.fn.equalHeights = function(){
        let maxHeight = 0;
        $(this).each(function(){
            maxHeight = Math.max($(this).height(), maxHeight);
        });

        $(this).each(function(){
            $(this).height(maxHeight);
        });
    };

    // usage
    $('.box-question-wrapper').each(function() {
        $(this).find('li label').equalHeights()

    })

});



