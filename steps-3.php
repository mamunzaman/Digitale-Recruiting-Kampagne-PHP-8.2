<?php
require_once("includes/all.class.functions.php");
require_once("header_footer/header.php");

$get_session_data = $_SESSION['applicant_data']; 
/**********
 * this is only for the button next active or not.
 */
$kenntnisse = $get_session_data['s-3']['kenntnisse'];
$class_name = '';
$class_name = checkAtLeastOneChecked($kenntnisse);
?>


<div class="container">
    <div class="row text-center">
        <div class="col-12 col-md-12 top-bottom-space">
            <p>
                <span>Frage 3 von 5</span>
            </p>
        </div><!-- col -->
    </div><!-- row -->
    <div class="justify-content-center row">
        <div class="col-3 col-md-2">
            <img src="<?php echo $step_3; ?>" alt="Kenntnisse" />
        </div><!-- col-3 -->
        <div class="col-12 col-md-12 text-center responsive-column-padding-20">
            <div class="top-bottom-space-half" style="padding-top: 0;">
                <h2 class="responsive-margin-t30">Ihre Kenntnisse</h2>
            </div><!-- top-bottom-space-half -->
        </div><!-- col-12 -->

    </div><!-- row -->
</div><!-- container-reset-width -->


<div class="container">
    <form id="get-form-data" class="common-selectbox-checkboxs">
        <input type="hidden" id="formsteps" name="formsteps" value="s-3">
    <div class="box-question-wrapper checkbox-multiple-data-container">
        <div class="justify-content-center row">
            <div class="col-12 col-md-12 text-center responsive-column-padding-20">
                <div>
                    <p><span>(Mehrfachauswahl möglich)</span></p>
                </div><!-- top-bottom-space-half -->
            </div><!-- col-12 -->
        </div><!-- row -->
        <div class="justify-content-center row">
            <div class="col-12 col-md-6 text-left responsive-column-padding-20">
                <div class="">
                    <ul class="ks-cboxtags">
                        <li>
                            <input type="checkbox"
                                   name="kenntnisse[]"
                                   id="c1"
                                   value="SPS/PLC-Programmierung"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'SPS/PLC-Programmierung',
                                        $get_session_data['s-3']['kenntnisse']);
                                    ?>
                            >
                            <label for="c1">
                                <p>SPS/PLC-Programmierung </p>
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
                                   name="kenntnisse[]"
                                   id="c2"
                                   value="Steuerungs- und Antriebstechnik"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'Steuerungs- und Antriebstechnik',
                                        $get_session_data['s-3']['kenntnisse']);
                                    ?>
                            >
                            <label for="c2">
                                <p>Steuerungs- und Antriebstechnik</p>
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
                                   name="kenntnisse[]"
                                   id="c3"
                                   value="TwinCat Steuerungen"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'TwinCat Steuerungen',
                                        $get_session_data['s-3']['kenntnisse']);
                                    ?>
                            >
                            <label for="c3">
                                <p>TwinCat Steuerungen</p>
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
                                   name="kenntnisse[]"
                                   id="c4"
                                   value="Maschineninbetriebnahme"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'Maschineninbetriebnahme',
                                        $get_session_data['s-3']['kenntnisse']);
                                    ?>
                            >
                            <label for="c4">
                                <p>Maschineninbetriebnahme</p>
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
                                   name="kenntnisse[]"
                                   id="c5"
                                   value="SAP"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'SAP',
                                        $get_session_data['s-3']['kenntnisse']);
                                    ?>
                            >
                            <label for="c5">
                                <p>SAP</p>
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
                                   name="kenntnisse[]"
                                   id="c6"
                                   value="MS-Office (Word, Excel)"
                                    <?php
                                        echo mmCheckboxStatus(
                                            'MS-Office (Word, Excel)',
                                            $get_session_data['s-3']['kenntnisse']);
                                    ?>
                            >
                            <label for="c6">
                                <p>MS-Office (Word, Excel)</p>
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
                    <a href="steps-4.php" class="button-download button-next-click-multiple <?php echo $class_name; ?>
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
