<?php
require("packages/securimage/securimage.php");  
// We need the session to check the phrase after submitting
session_start();

require_once("includes/class.database.php");
require_once("includes/all.class.functions.php");
require_once("header_footer/header.php");
$resultCleanData = wb_mm_orderData_beforeInsert($_SESSION['applicant_data']);


?> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3 col-md-2">
            <img src="<?php echo $step_6; ?>" alt="Kontaktdaten" />
        </div><!-- col-3 -->
        <div class="col-12 col-sm-11 col-md-12 text-center">
            <div class="top-bottom-space">
                <p><span>Datenangabe zur Kontaktaufnahme </span></p>
                <h2>Damit wir uns bei Ihnen melden können, lassen Sie uns bitte wissen, wie Sie am besten zu erreichen
                    sind!</h2>
            </div>
        </div>
    </div>
</div><!-- container-reset-width -->


<div class="container">
    <div class="row">
        <div class="col-12">

            <div id="contact-popup" class="white-popup mfp-with-anim cutomPopUpContant">
                    <form action="" method="post" id="popUpContactForm" novalidate="novalidate">
                        <input type="hidden" id="formsteps" name="formsteps" value="s-6">
                        <div class="rowPupUp">
                            <div class="popUpCol-12"><br>
                                <h3 class="text-upperClass h3-newsize text-center">Ihre Kontaktdaten</h3>

                                <h6 class="h6-new-size thanskPage text-center">Thank you for your message. We will contact you
                                    as soon as possible.</h6>
                                <p class="text-center thanskPage text-center" style="color: #575F65; padding: 20px 0 30px 0;"><i
                                            class="fa fa-check fa-3x fa-3x-space" aria-hidden="true"></i> <i class="fa fa-paper-plane-o fa-3x fa-3x-space" aria-hidden="true"></i> <i class="fa fa-smile-o fa-3x fa-3x-space" aria-hidden="true"></i></p>
                            </div><!-- popUpCol-6 -->
                        </div><!-- rowPupUp -->
                        <div id="onlyFormWrap">
                            <div class="rowPupUp">
                                <div class="popUpCol-12"><br>
                                    <div class="error customerrorText"><span></span></div><br>
                                </div><!-- popUpCol-6 -->
                            </div><!-- rowPupUp -->
                            <div class="rowPupUp">
                                <div class="popUpCol-6">
                                    <span class="input input--manami">
                                        <input class="input__field input__field--manami" type="text" id="firstname" name="firstname">
                                        <label class="input__label input__label--manami" for="input-32">
                                            <span class="input__label-content input__label-content--manami
                                            errormessage">Vorname*</span>
                                        </label>
                                    </span>
                                </div><!-- popUpCol-6 -->
                                <div class="popUpCol-6">
                                    <span class="input input--manami">
                                        <input class="input__field input__field--manami" type="text" id="surname" name="surname">
                                        <label class="input__label input__label--manami" for="input-32">
                                            <span class="input__label-content input__label-content--manami
                                            errormessage">Nachname*</span>
                                        </label>
                                    </span>
                                </div><!-- popUpCol-6 -->
                                <div class="popUpCol-6">
                                    <span class="input input--manami">
                                        <input class="input__field input__field--manami" type="email" name="youremail" id="youremail">
                                        <label class="input__label input__label--manami" for="input-32">
                                            <span class="input__label-content input__label-content--manami
                                            errormessage">E-Mail*</span>
                                        </label>
                                    </span>
                                </div><!-- popUpCol-6 -->


                                <div class="popUpCol-6">
                                    <span class="input input--manami">
                                        <input class="input__field input__field--manami" type="text" id="yourtelephone" name="yourtelephone">
                                        <label class="input__label input__label--manami" for="input-32">
                                            <span class="input__label-content
                                            input__label-content--manami">Telefonnummer</span>
                                        </label>
                                    </span>
                                </div><!-- popUpCol-6 -->

                                <div class="popUpCol-12">
                                    <textarea class="onlyTextarea" id="yourmessage" name="yourmessage" style="height:
                                     100px; background: white; width: 100%; margin-bottom: 30px;"
                                              placeholder="Ihre Nachricht"></textarea>
                                    <span class="errormessage"></span>
                                </div><!-- popUpCol-6 -->

                                <div class="popUpCol-12">
                                    <p style="font-size: 22px;"><br>Nach dem Absenden Ihrer Kontaktdaten, setzen wir uns in
                                        Kürze mit Ihnen in Verbindung.
                                        <br><br>Viele Grüße,
                                        <br><span style="color: black;">Ihr FOCKE HR-Team</span><br><br>
                                    </p>
                                </div><!-- popUpCol-12 -->


                                <div class="popUpCol-12">
                                    <p>
                                        Informationen zum Datenschutz finden Sie <a href="<?php echo
                                        current_global_path(); ?>datenschutzerklarung.php"
                                           target="_blank">hier</a>.
                                    </p>
                                </div><!-- popUpCol-12 -->
                                <div class="popUpCol-12" style="padding-top: 20px;">
                                    <div class="captcha-holder">
                                        <?php
                                        echo Securimage::getCaptchaHtml();
                                        ?>
                                    </div>

                                </div><!-- popUpCol-12 -->
                                <div class="popUpCol-6 text-right">
                                    <button type="submit" id="submitData" name="submitData" class="formBtn
                                    formBtn-md">SENDEN</button>
                                </div><!-- popUpCol-6 -->
                                <div class="popUpCol-6 text-right make-pflicfeld-right">
                                    * Pflichtfelder
                                </div><!-- popUpCol-6 -->
                            </div><!-- rowPupUp -->
                        </div><!-- onlyFormWrap -->
                    </form>
            </div><!-- contact-popup -->


        </div><!-- col-12 -->
    </div><!-- row -->
</div><!-- container -->

<?php
require_once("header_footer/footer.php"); ?>
