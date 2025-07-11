<?php
require_once("includes/all.class.functions.php");
require_once("header_footer/header.php");
$get_session_data = $_SESSION['applicant_data'];

$kompetenzen = $get_session_data['s-5']['kompetenzen'];
/**********
 * this is only for the button next active or not.
 */
$class_name = '';
$class_name = checkAtLeastOneChecked($kompetenzen);
?>


<div class="container">
    <div class="row text-center">
        <div class="col-12 col-md-12 top-bottom-space">
            <p>
                <span>Frage 5 von 5</span>
            </p>
        </div><!-- col -->
    </div><!-- row -->
    <div class="justify-content-center row">
        <div class="col-3 col-md-2">
            <img src="<?php echo $step_5; ?>" alt="Welche Kompetenzen bringen" />
        </div><!-- col-3 -->
        <div class="col-12 col-md-12 text-center responsive-column-padding-20">
            <div class="top-bottom-space-half" style="padding-top: 0;">
                <h2 class="responsive-margin-t30">Welche Kompetenzen bringen Sie mit? </h2>
            </div><!-- top-bottom-space-half -->
        </div><!-- col-12 -->

    </div><!-- row -->
</div><!-- container-reset-width -->


<div class="container">
    <form id="get-form-data" class="common-selectbox-checkboxs">
        <input type="hidden" id="formsteps" name="formsteps" value="s-5">
    <div class="box-question-wrapper">
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
                                   name="kompetenzen[]"
                                   id="c1"
                                   value="Team – und Kommunikationsfähigkeit"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'Team – und Kommunikationsfähigkeit',
                                        $get_session_data['s-5']['kompetenzen']);
                                    ?>
                            >
                            <label for="c1">
                                <p>Team – und Kommunikationsfähigkeit</p>
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
                                   name="kompetenzen[]"
                                   id="c2"
                                   value="Mut zur Eigeninitiative"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'Mut zur Eigeninitiative',
                                        $get_session_data['s-5']['kompetenzen']);
                                    ?>
                            >
                            <label for="c2">
                                <p>Mut zur Eigeninitiative </p>
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
                                   name="kompetenzen[]"
                                   id="c3"
                                   value="Sorgfältige und selbstständige Arbeitsweise"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'Sorgfältige und selbstständige Arbeitsweise',
                                        $get_session_data['s-5']['kompetenzen']);
                                    ?>
                            >
                            <label for="c3">
                                <p>Sorgfältige und selbstständige Arbeitsweise</p>
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
                                   name="kompetenzen[]"
                                   id="c4"
                                   value="Bereitschaft für Außeneinsätze"
                                    <?php
                                    echo mmCheckboxStatus(
                                        'Bereitschaft für Außeneinsätze',
                                        $get_session_data['s-5']['kompetenzen']);
                                    ?>
                            >
                            <label for="c4">
                                <p>Bereitschaft für Außeneinsätze</p>
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
                    <a href="steps-last.php" class="button-download button-next-click-multiple <?php echo $class_name; ?>
                    button-select-common">Weiter</a>
                </div>
            </div>
        </div><!-- col -->
        <div class="col-12 col-md-12 text-center responsive-column-padding-20">
            <div class="top-bottom-space-half10">
                <div class="aus-button-container">
                    <p><i class="bi bi-boxes bi-custom-logo-extra"></i><span>
                            <?php echo $next_button_infos1; ?>
                            </span><i class="bi bi-boxes bi-custom-logo-extra bi-custom-logo-extra-2"></i></p>
                </div>
            </div>
        </div><!-- col -->
    </div><!-- row -->
    </form><!-- form -->
</div><!-- container-reset-width -->




<?php
require_once("header_footer/footer.php"); ?>
