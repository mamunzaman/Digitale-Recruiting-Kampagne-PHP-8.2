<?php
require_once("includes/all.class.functions.php");
require_once("header_footer/header.php");

/***********
 * this is to get the specific job title
 */
$get_session_data = $_SESSION['applicant_data'];
$profession_sub_name = '';
$status_button = 'button-disable-click';

foreach ($get_session_data['s-1'] as $key => $value):
    if( ($key == 'professions') && ($value != null) ){
        $check = $value != null  ? "checked" : "unchecked";
        $profession_sub_name = $value;
        $status_button = '';
    }

endforeach;

/**********
 * this is only for the button next active or not.
 */
$professionsextra = $get_session_data['s-1']['professions'];
$class_name = '';
if($professionsextra){
    $class_name = checkAtLeastOneChecked($professionsextra);
} 

?>

<div class="container">
    <div class="row text-center">
        <div class="col-12 col-md-12 responsive-column-padding-20">
            <div class="top-bottom-space-half" style="padding-bottom: 0;">
                <p class="job-totle">
                    <span>
                        In Verden (ab sofort)</br>
                        <strong>Elektroniker AT/Mechatroniker (m/w/d)</strong></br>
                        – Bereich Montage –
                    </span>
                <p>
                    <span style="font-family: 'RegularFOCKEBold';">Frage 1 von 5</span>
                </p>
                </p>
            </div>
        </div><!-- col -->
    </div><!-- row -->
    <div class="justify-content-center row">
        <div class="col-3 col-md-2">
            <img src="<?php echo $step_1; ?>" alt="Qualifikationen" />
        </div><!-- col-3 -->
        <div class="col-12 col-md-12 text-center responsive-column-padding-20">
            <div class="top-bottom-space-half" style="padding-top: 0;">
                <h2 class="responsive-margin-t30">Welche Qualifikationen bringen Sie mit?</h2>
            </div><!-- top-bottom-space-half -->
        </div><!-- col-12 -->

    </div><!-- row -->
</div><!-- container-reset-width -->


<div class="container">
    <div class="justify-content-center row">
        <div class="col-12 col-md-12 text-center responsive-column-padding-20">
            <div>
                <p><span><?php echo $form_mandet_text; ?></span></p>
            </div><!-- top-bottom-space-half -->
        </div><!-- col-12 -->
    </div><!-- row -->
    <form id="get-form-data">
        <input type="hidden" id="formsteps" name="formsteps" value="s-1">
        <div class="box-question-wrapper">
            <div class="justify-content-center row">
                <div class="col-12 col-md-6 text-left responsive-column-padding-20">
                    <div class="">
                        <ul class="ks-cboxtags professions">
                            <li>
                                <input type="checkbox"
                                       name="professions[]"
                                       id="c1"
                                       data-typeextra = "s2-1"
                                       value="Abgeschlossene Ausbildung als Elektroniker für
                                       Automatisierungstechnik (m/w/d)"
                                        <?php
                                        echo mmCheckboxStatus(
                                            'Abgeschlossene Ausbildung als Elektroniker für Automatisierungstechnik (m/w/d)',
                                            $get_session_data['s-1']['professionsextra']);
                                        ?>
                                >
                                <label for="c1">
                                    <p>Abgeschlossene Ausbildung als <br>Elektroniker für Automatisierungstechnik
                                        (m/w/d)</p>
                                </label>
                            </li>
                        </ul>
                    </div><!-- top-bottom-space-half -->
                </div><!-- col-6 -->
                <div class="col-12 col-md-6 text-left responsive-column-padding-20">
                    <div class="">
                        <ul class="ks-cboxtags professions">
                            <li>
                                <input type="checkbox"
                                       name="professionsextra[]"
                                       id="a2"
                                       value="Weiterbildung zum Meister (m/w/d)"
                                        <?php
                                        echo mmCheckboxStatus(
                                                'Weiterbildung zum Meister (m/w/d)',
                                                $get_session_data['s-1']['professionsextra']);
                                         ?>
                                >
                                <label for="a2">
                                    <p>Weiterbildung zum Meister (m/w/d)</p>
                                </label>
                            </li>
                        </ul>
                    </div><!-- top-bottom-space-half -->
                </div><!-- col-6 -->
            </div><!-- row -->
            <div class="justify-content-center row">
                <div class="col-12 col-md-6 text-left responsive-column-padding-20">
                    <div class="">
                        <ul class="ks-cboxtags">
                            <li>
                                <input type="checkbox"
                                       class="professions"
                                       name="professions[]"
                                       id="c2"
                                       data-typeextra = "s2-2"
                                       value="Abgeschlossene Ausbildung als Mechatroniker (m/w/d)"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'Abgeschlossene Ausbildung als Mechatroniker (m/w/d)',
                                        $get_session_data['s-1']['professionsextra']);
                                    ?>
                                >
                                <label for="c2">
                                    <p>Abgeschlossene Ausbildung als Mechatroniker (m/w/d)</p>
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
                                       class="professionsextra"
                                       name="professionsextra[]"
                                       id="a1"
                                       value="Weiterbildung zum Techniker (m/w/d)"
                                        <?php
                                        echo mmCheckboxStatus(
                                            'Weiterbildung zum Techniker (m/w/d)',
                                            $get_session_data['s-1']['professionsextra']);
                                        ?>
                                >
                                <label for="a1">
                                    <p>Weiterbildung zum Techniker (m/w/d)</p>
                                </label>
                            </li>
                        </ul>
                    </div><!-- top-bottom-space-half -->
                </div><!-- col-6 -->
            </div><!-- row -->
        </div><!-- box-question-wrapper -->
        <div class="justify-content-center row row-top-margin-m30">
            <div class="col-12 col-md-5 text-center responsive-column-padding-20">
                <div class="">
                    <div class="aus-button-container">
                        <a href="iem-steps-2.php" class="button-download <?php echo $class_name; ?>
                        button-select-profession">Weiter
                            zur nächsten
                            Frage</a>
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
    </form><!-- form wrapper -->

</div><!-- container-reset-width -->




<?php
require_once("header_footer/footer.php"); ?>
