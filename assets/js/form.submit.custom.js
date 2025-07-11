
jQuery(document).ready(function(){

    let $ajaxUrl = 'submitted_ajax_process.php';

    /*******
     * this is only select one checkbox using this class  ".only-single-select-checkbox"
     */
    jQuery(document).on('click', '.only-single-select-checkbox input[type="checkbox"]', function() {
        jQuery('input[type="checkbox"]').not(this).prop('checked', false);
    });





    /**********************
     * select only one for prefession selection
     */
    $(document).on('change', 'input[name=\'professions[]\']', function() {
        //$('input[name=\'professions[]\']').parent().removeClass('make-inactive-class');
        //$('input[name=\'professions[]\']').not(this).prop('checked', false).parent().addClass('make-inactive-class');

        $('input[name=\'professions[]\']').not(this).prop('checked', false);
        var checkSelected = $('input[name=\'professions[]\']').is(':checked');
        //alert(checkSelected);
        if(checkSelected){
            jQuery('.aus-button-container').find('.button-disable-click').removeClass('button-disable-click');
        }else{
            jQuery('.aus-button-container').find('a').addClass('button-disable-click');
        }
    });



    /**********************
     * select only one for common checkbox selection
     */
    $(document).on('change', '.common-selectbox-checkboxs input[type=checkbox]', function() {

        var $inputname = jQuery('#get-form-data input[type=checkbox]').attr('name');

        //$("input[name='"+$inputname+"']").not(this).prop('checked', false);

        var checkSelected = $("input[name='"+$inputname+"']").is(':checked');

        // this is reset the datepicker date
        $('#datepicker').datepicker('update','');

        //alert(checkSelected);
        if(checkSelected){
            jQuery('.aus-button-container').find('.button-disable-click').removeClass('button-disable-click');
        }else{
            jQuery('.aus-button-container').find('a').addClass('button-disable-click');
        }


    });



    /*******************
     * this is index Start page selection
     */
    $(".card-links").click(function(){
        var $dlink = $(this).find('.card').data('link');
        var $title = $(this).find('a').data('title');
        var $type = $(this).find('a').data('type');
        var $formSteps = $("#formsteps").val();

        $.ajax({
            type: "POST",
            url: $ajaxUrl,
            data: {
                formsteps: $formSteps,
                jobtitle: $title,
                type: $type
            },
            cache: false,
            before: function (data){
                //alert(data);
                //return false;
            },
            success: function(data) {
                //alert(data);
                window.location.href = $dlink;
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
        return false;
    });



    /*********************
     * this click for the steps 1
     */
    jQuery(document).on('click', '.button-select-profession', function() {

        var $formSteps = $("#formsteps").val();
        var $nextLink = $(this).attr('href');
        var selectedprofession = []; // New array
        $("input[name='professions[]']:checked").each( function () {
            //var getData = jQuery('input[name=\'professions[]\']').is('checked');
            selectedprofession.push(this.value);
        });

        var professionsextra = [];
        $("input[name='professionsextra[]']:checked").each( function () {
            professionsextra.push(this.value);
        });

        var isChecked1 = $('input[name=\'professions[]\']').is(':checked');

        //alert($(this).attr('href'));

        if(isChecked1){

            $.ajax({
                type: "POST",
                url: $ajaxUrl,
                data: {
                    formsteps: $formSteps,
                    professions: selectedprofession,
                    professionsextra: professionsextra
                },
                cache: false,
                success: function(data) {
                    //alert(data);
                    //console.log(data);
                   window.location.href = $nextLink;
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });

        }   // end check if its clicked or not

        return false;

    });


    /*********************
     * this click for the steps 1
     */
    jQuery(document).on('click', '.button-select-common', function() {

        var $formSteps = $("#formsteps").val();
        var $nextLink = $(this).attr('href');
        var selctcheckbox = []; // New array
        $("input[type=checkbox]:checked").each( function () {
            //var getData = jQuery('input[name=\'professions[]\']').is('checked');
            selctcheckbox.push(this.value);
        });

        var $getDate = jQuery('#date').val();

        //alert($getDate);
        var isChecked1 = $('input[type=checkbox]').is(':checked');


        if( (isChecked1 == true) && ($formSteps != 's-4') ){

            // get all the data from a form
            var data = $('#get-form-data').serialize();

            $.ajax({
                type: "POST",
                url: $ajaxUrl,
                data: data,
                cache: false,
                success: function(data) {
                    //alert(data);
                    window.location.href = $nextLink;
                    //console.log(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });

        }   // end check if its clicked or not



        // this is only for the step 4 with calendar included.
        if( ($formSteps == 's-4') && ((isChecked1 == true) || ($getDate)) ){

            // get all the data from a form
            var data = $('#get-form-data').serialize();

            $.ajax({
                type: "POST",
                url: $ajaxUrl,
                data: data,
                cache: false,
                success: function(data) {
                    //alert(data);
                    window.location.href = $nextLink;
                    //console.log(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });

        }   // end check if its clicked or not

        return false;

    });



});