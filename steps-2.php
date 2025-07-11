<?php
require_once("includes/all.class.functions.php");
require_once("header_footer/header.php");

$get_session_data = $_SESSION['applicant_data'];
/***********
 * this is to get the specific job title
 */
$profession_sub_name = '';
foreach ($get_session_data['s-1']['professions'] as $key => $get_prof):
    if($get_prof) $profession_sub_name = $get_prof;
endforeach;

$status_button = '';
foreach ($get_session_data['s-1'] as $key => $value):
    if($key == 'professions'){
        //$profession_sub_name = $value;
        $status_button = 'button-disable-click';
    }

endforeach;

/**********
 * this is only for the button next active or not.
 */
$berufserfahrung = $get_session_data['s-2']['berufserfahrung'];
$class_name = '';
$class_name = checkAtLeastOneChecked($berufserfahrung);
?> 
<div class="container">
    <div class="row text-center">
        <div class="col-12 col-md-12 top-bottom-space">
                <p>
                    <span>Frage 2 von 5</span>
                </p>
        </div><!-- col -->
    </div><!-- row -->
    <div class="justify-content-center row">
        <div class="col-3 col-md-2">
            <img src="<?php echo $step_2; ?>" alt="Berufserfahrung" />
        </div><!-- col-3 -->
        <div class="col-12 col-md-12 text-center responsive-column-padding-20">
            <div class="top-bottom-space-half" style="padding-top: 0;">
                <h2 class="responsive-margin-t30">Ihre Berufserfahrung als Software-Inbetriebnehmer (m/w/d)</h2>
            </div><!-- top-bottom-space-half -->
        </div><!-- col-12 -->

    </div><!-- row -->
</div><!-- container-reset-width -->


<div class="container">
    <form id="get-form-data" class="common-selectbox-checkboxs">
        <input type="hidden" id="formsteps" name="formsteps" value="s-2">
    <div class="box-question-wrapper only-single-select-checkbox">
        <div class="justify-content-center row">
            <div class="col-12 col-md-6 text-left responsive-column-padding-20">
                <div class="">
                    <ul class="ks-cboxtags">
                        <li>
                            <input type="checkbox"
                                   name="berufserfahrung[]"
                                   id="c1"
                                   value="Erste Berufserfahrung (Praktika und Aushilfsarbeiten)"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'Erste Berufserfahrung (Praktika und Aushilfsarbeiten)',
                                        $get_session_data['s-2']['berufserfahrung']);
                                    ?>
                            >
                            <label for="c1">
                                <p><strong>Erste Berufserfahrung</strong><br>
                                    (Praktika und Aushilfsarbeiten)
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
                                   name="berufserfahrung[]"
                                   id="c2"
                                   value="Einschlägige Berufserfahrung (praktische Erfahrungen und Fachwissen)"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'Einschlägige Berufserfahrung (praktische Erfahrungen und Fachwissen)',
                                        $get_session_data['s-2']['berufserfahrung']);
                                    ?>
                            >
                            <label for="c2">
                                <p><strong>Einschlägige Berufserfahrung</strong><br>
                                    (praktische Erfahrungen und Fachwissen)
                                </p>
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
                                   name="berufserfahrung[]"
                                   id="c3"
                                   value="Fundierte Berufserfahrung (1 bis 3 Jahre)"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'Fundierte Berufserfahrung (1 bis 3 Jahre)',
                                        $get_session_data['s-2']['berufserfahrung']);
                                    ?>
                            >
                            <label for="c3">
                                <p><strong>Fundierte Berufserfahrung</strong><br>
                                    (1 bis 3 Jahre)
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
                                   name="berufserfahrung[]"
                                   id="c4"
                                   value="Umfassende Berufserfahrung (5 bis 7 Jahre)"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'Umfassende Berufserfahrung (5 bis 7 Jahre)',
                                        $get_session_data['s-2']['berufserfahrung']);
                                    ?>
                            >
                            <label for="c4">
                                <p><strong>Umfassende Berufserfahrung</strong><br>
                                    (5 bis 7 Jahre)
                                </p>
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
                    <a href="steps-3.php" class="button-download <?php echo $class_name; ?>
                        button-select-common">Weiter zur nächsten Frage</a>
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
</div><!-- container-reset-width -->




<?php
require_once("header_footer/footer.php"); ?>
