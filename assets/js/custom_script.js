
$(document).ready(function(){
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




    "use strict";

    var fullHeight = function() {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function(){
            $('.js-fullheight').css('height', $(window).height());
        });

    };
    fullHeight();

    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });



    /*******************
     * this is admin login ajax submit to check goto admin or not.
     */
    var frm = $('.signin-form');
    frm.submit(function(e){
        e.preventDefault(); // avoid to execute the actual submit of the form.

        // get all the data from a form
        var data = frm.serialize();

        $.ajax({
            type: frm.attr('method'),
            url: 'login-ajax.php',
            dataType: 'JSON',
            data: frm.serialize(),
            cache: false,
            before: function (data){
                //alert(data.status);
                if(data.status === 0){
                    window.location.href = data.url;
                }
                console.log(data);
                //return false;
            },
            success: function(data) {
                //alert(data.status);
                if(data.status === 1){
                    window.location.href = data.url;
                }
                console.log(data);
                //return false;
                //alert(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });




});





