<?php
if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
    if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) { // direct access denied
        header("Location: /403");
        exit;
    }
}

//session_start();
$form_mandet_text = '(Mehrfachauswahl möglich)';
$next_button_infos = 'Durch Klick auf den Button zur nächsten Frage';
$next_button_infos1 = 'Durch Klick zu Ihren Kontaktdaten';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FOCKE || FOCKE Bewerbung Dashboard</title>

    <!-- all basic CSS add here -->
    <link href="assets/css/fontawesome/all.css" rel="stylesheet">
    <!-- BOOTSTRAP BASE CSS -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" >
    <link href="assets/bootstrap/css/bootstrap-icons.css" rel="stylesheet" >

    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" >
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" >



    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Ends all CSS add here -->

    <!--
        all basic JS add here
     -->
    <script src="assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>

    <!-- BOOTSTRAP BASE JS -->
    <script src="assets/bootstrap/js/bootstrap.js"></script>


    <script src="assets/js/popper.js"></script>
    <!--
        Ends all basic JS add here
    -->



    <!-- ALL CUSTOM JS -->
    <script src="assets/js/custom_script.js" type="text/javascript"></script>
    

</head>
<!--<body class="img js-fullheight" style="background-image: url(assets/images/bg.jpg);">-->
<body class="img js-fullheight">