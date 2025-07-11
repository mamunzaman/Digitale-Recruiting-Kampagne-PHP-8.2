<?php
require_once("includes/all.class.functions.php");
require_once("header_footer/header.php");
session_destroy();
?>

<div class="container">
    <div class="row">
        <div class="col col-md-12 text-center">
            <div class="top-bottom-space">
                <h1>Sie möchten in einem der weltweit führenden
                    Unternehmen im Maschinenbau mitarbeiten?</h1>
                <p><small>Bewerben Sie sich auf Ihren neuen Job - ganz ohne Anschreiben in nur 3 Minuten!</small></p>

            </div>
        </div>
    </div>
</div><!-- container-reset-width -->


<div class="container">
    <form method="post" id="get-the-data">
    <input type="hidden" id="formsteps" name="formsteps" value="s-0">
    <div class="justify-content-center row" style="margin-bottom: 30px;">
        <div class="col-12">
            <h2 class="text-center" style="margin-bottom: 30px;">Welche Stelle möchten Sie besetzen?</h2>
        </div><!-- col-12-->
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 card-links">
            <div class="text-center card card-custom-bg" data-link="sft-survey.php">
                <a href="#" data-title="Software-Inbetriebnehmer (m/w/d)" data-type="s1"><img
                            src="assets/images/Key-visuals-software.jpg" class="img-fluid" alt="" /></a>
                <div class="card-footer survey-card-box">
                    <span class="text-white">Software-Inbetriebnehmer</br>(m/w/d)</span>
                </div>
            </div>
        </div><!-- col-3 -->

        <div class="col-6 col-sm-6 col-md-6 col-lg-6 card-links">
            <div class="text-center card card-custom-bg" data-link="iem-survey.php">
                <a href="#" data-title="Elektroniker AT/Mechatroniker (m/w/d)" data-type="s2">
                    <img src="assets/images/Key-visuals-electro.jpg" class="img-fluid" alt="" /></a>
                <div class="card-footer survey-card-box">
                    <span class="text-white">Elektroniker AT/Mechatroniker
                        </br>(m/w/d)</span>
                </div>
            </div>
        </div><!-- col-3 -->
    </div><!-- row -->
    </form><!-- form container -->
</div><!-- container-reset-width -->




<?php
require_once("header_footer/footer.php"); ?>
