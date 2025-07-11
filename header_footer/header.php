<?php session_start();

$form_mandet_text = '(Mehrfachauswahl möglich)';
$next_button_infos = 'Durch Klick auf den Button zur nächsten Frage';
$next_button_infos1 = 'Durch Klick zu Ihren Kontaktdaten';


/******************
 * this is only the icon and all
 */
$icon_url = 'assets/images/all-icons/';
$step_1 = $icon_url . 'FOCKE_join_Icon_Frage_1_Qualification.svg';
$step_2 = $icon_url . 'FOCKE_join_Icon_Frage_2_Erfahrung.svg';
$step_3 = $icon_url . 'FOCKE_join_Icon_Frage_3_Arbeitsweise.svg';
$step_4 = $icon_url . 'FOCKE_join_Icon_Frage_4_Starten.svg';
$step_5 = $icon_url . 'FOCKE_join_Icon_Frage_5_Eigenschaften.svg';
$step_6 = $icon_url . 'FOCKE_join_Icon_Frage_Last_Nachricht.svg';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <META HTTP-EQUIV="content-type" CONTENT="text/html; charset=utf-8">
    <?php //header('Content-Type: text/html; charset=utf-8'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FOCKE || FOCKE Bewerbung</title>

    <!-- all basic CSS add here -->
    <link href="assets/css/fontawesome/all.css" rel="stylesheet">
    <!-- BOOTSTRAP BASE CSS -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" >
    <link href="assets/bootstrap/css/bootstrap-icons.css" rel="stylesheet" >
    <link href="assets/datepicker/css/bootstrap-datepicker3.standalone.css" rel="stylesheet" >

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="assets/magnific-popup/magnific-popup.css">

    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Ends all CSS add here -->

    <!--
        all basic JS add here
     -->
    <script src="assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>

    <!-- Magnific Popup core JS file -->
    <script src="assets/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- BOOTSTRAP BASE JS -->
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/datepicker/locales/bootstrap-datepicker.de.min.js"></script>

    <!-- AJAX AND FORM SUBMISSIONS JS -->
    <script src="assets/js/form.submit.custom.js" type="text/javascript"></script>

    <script type="text/javascript">
        /*******************************
         * this is to uncheck all the checkbox when you select the datepicker
         * INFO: MAIN CALENDER IS ADDED ON HEADER:PHP
         */
        jQuery(document).ready(function(){
            jQuery('.datepicker').datepicker({
                autoclose:true,
                assumeNearbyYear:true,
                format: 'dd.mm.yyyy',
                language: 'de',
                todayHighlight: true
            }).on('changeDate', function (ev) {
                //alert('Date Changed');
                $('input[name=\'starten[]\']').not(this).prop('checked', false);

                var $getDate = jQuery('#date').val();
                if($getDate != ''){
                    jQuery('.aus-button-container').find('.button-disable-click').removeClass('button-disable-click');
                }else{
                    jQuery('.aus-button-container').find('a').addClass('button-disable-click');
                }

            });
        });
    </script>
    <!--
        Ends all basic JS add here
    --> 
</head>
<style>

</style>

<body>


    <nav class="navbar container-fluid focke-technokolor">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="margin: 0; padding: 0; text-align: center">
                <img src="assets/images/base/focke-logo-black.png" alt="" class="d-inline-block brand-logo-responsive
                align-text-top">
            </a>
        </div>
    </nav>
