<?php
require_once("includes/all.class.functions.php");
require_once("header_footer/header.php");

$get_session_data = $_SESSION['applicant_data'];
$data = $get_session_data['s-4']['starten'];
$currentDate = '';
foreach ($get_session_data['s-4']['starten'] as $val):
    $currentDate = $val;
endforeach;
$currentDate = checkStringDate($currentDate); 
$starten = $get_session_data['s-4']['starten'];

/**********
 * this is only for the button next active or not.
 */
$class_name = '';
$class_name = checkAtLeastOneChecked($starten);
?>


<div class="container">
    <div class="row text-center">
        <div class="col-12 col-md-12 top-bottom-space">
            <p>
                <span>Frage 4 von 5</span>
            </p>
        </div><!-- col -->
    </div><!-- row -->
    <div class="justify-content-center row">
        <div class="col-3 col-md-2">
            <img src="<?php echo $step_4; ?>" alt="starten" />
        </div><!-- col-3 -->
        <div class="col-12 col-md-12 text-center responsive-column-padding-20">
            <div class="top-bottom-space-half" style="padding-top: 0;">
                <h2 class="responsive-margin-t30">Ab wann können Sie starten?</h2>
            </div><!-- top-bottom-space-half -->
        </div><!-- col-12 -->

    </div><!-- row -->
</div><!-- container-reset-width -->


<div class="container">
    <form id="get-form-data" class="common-selectbox-checkboxs">
        <input type="hidden" id="formsteps" name="formsteps" value="s-4">
    <div class="box-question-wrapper only-single-select-checkbox">
        <div class="justify-content-center row">
            <div class="col-12 col-md-6 text-left responsive-column-padding-20">
                <div class="">
                    <ul class="ks-cboxtags">
                        <li>
                            <input type="checkbox"
                                   name="starten[]"
                                   id="c1"
                                   value="Ab sofort"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'Ab sofort',
                                        $get_session_data['s-4']['starten']);
                                    ?>
                            >
                            <label for="c1">
                                <p>Ab sofort
                                </p>
                            </label>
                        </li>
                    </ul>
                </div><!-- top-bottom-space-half -->
            </div><!-- col-6 -->
            <div class="col-12 col-md-6 text-left responsive-column-padding-20">
                <div class="">
                    <ul class="ks-cboxtags">
                        <li>
                            <input type="checkbox"
                                   name="starten[]"
                                   id="c2"
                                   value="In einem Monat"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'In einem Monat',
                                        $get_session_data['s-4']['starten']);
                                    ?>
                            >
                            <label for="c2">
                                <p>In einem Monat</p>
                            </label>
                        </li>
                    </ul>
                </div><!-- top-bottom-space-half -->
            </div><!-- col-6 -->
        </div><!-- row -->
        <div class="row">
            <div class="col-12 col-md-6 text-left responsive-column-padding-20">
                <div class="">
                    <ul class="ks-cboxtags">
                        <li>
                            <input type="checkbox"
                                   name="starten[]"
                                   id="c3"
                                   value="In zwei Monaten"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'In zwei Monaten',
                                        $get_session_data['s-4']['starten']);
                                    ?>
                            >
                            <label for="c3">
                                <p>In zwei Monaten</p>
                            </label>
                        </li>
                    </ul>
                </div><!-- top-bottom-space-half -->
            </div><!-- col-6 -->
            <div class="col-12 col-md-6 text-left responsive-column-padding-20">
                <div class="">
                    <ul class="ks-cboxtags">
                        <li>
                            <input type="checkbox"
                                   name="starten[]"
                                   id="c4"
                                   value="Ich weiß es noch nicht genau"
                                    <?php
                                        echo mmCheckboxStatus(
                                            'Ich weiß es noch nicht genau',
                                            $get_session_data['s-4']['starten']);
                                    ?>
                            >
                            <label for="c4">
                                <p>Ich weiß es noch nicht genau</p>
                            </label>
                        </li>
                    </ul>
                </div><!-- top-bottom-space-half -->
            </div><!-- col-6 -->
            <div class="col-12 col-md-6 text-left responsive-column-padding-20">
                <div class="input-group date" id="datepicker" style="padding: 20px; background-color: #eff0f1;
    border: 1px solid rgba(0, 0, 0, 0.1);">

                    <p class="samefornt-like-checkbox">Bitte geben Sie hier Ihr mögliches Startdatum an:</p>



                    <input type="text"
                           name="starten[]"
                           id="date"
                           class="datepicker" 
                           value="<?php echo $currentDate; ?>"
                            style="background: transparent; border: 1px solid rgba
                    (255,255,255,0
                    .5); border-width: 0px 0px 1px 0px;"/>
                </div>
            </div><!-- col-6 -->
        </div><!-- row -->
    </div><!-- box-question-wrapper -->
    <div class="justify-content-center row row-top-margin-m30">
        <div class="col-12 col-md-5 text-center responsive-column-padding-20">
            <div class="">
                <div class="aus-button-container">
                    <a href="steps-5.php" class="button-download <?php echo $class_name; ?> button-select-common">Weiter zur nächsten Frage</a>
                </div>
            </div>
        </div><!-- col -->
        <div class="col-12 col-md-12 text-center responsive-column-padding-20">
            <div class="top-bottom-space-half10">
                <div class="aus-button-container">
                    <p><i class="bi bi-boxes bi-custom-logo-extra"></i><span>
                            <?php echo $next_button_infos; ?>
                            </span><i class="bi bi-boxes bi-custom-logo-extra bi-custom-logo-extra-2"></i></p>
                </div>
            </div>
        </div><!-- col -->
    </div><!-- row -->
    </form><!-- form -->
</div><!-- container-reset-width -->




<?php
require_once("header_footer/footer.php"); ?>
