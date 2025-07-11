<?php
require_once("includes/all.class.functions.php");
require_once("header_footer/header.php");
$resultCleanData = wb_mm_orderData_beforeInsert($_SESSION['applicant_data']); 
$back_link = ($resultCleanData['type'] == 's1' ? 'sft-survey.php' : 'iem-survey.php' );

?>
<div class="container">
    <div class="row row-top-margin-m30">
        <div class="col-md-12 text-center">
            <h3 style="color: rgba(12, 83, 136, 1.0); margin-bottom: 25px;">Bitte überprüfen Sie Ihre Informationen,
                bevor Sie Ihre E-Mail versenden.</h3>

        </div><!-- col -->
    </div><!-- row -->
    <div class="row justify-content-center">
        <form id="submit-request-email" method="post">
        <div class="col text-center responsive-button-space">
                <button type="button" class="btn btn-lg focke-fonts" onclick="location.href='<?php echo $back_link;
                ?>;'">< Zurück zum Bearbeiten</button>
            <input type="hidden" name="formsteps" value="s-7">
            <button type="submit" id="submitted-email" class="btn btn-lg focke-fonts">Bewerbung versenden</button>

        </div><!-- col -->
        </form>
    </div><!-- row -->
    <div class="row justify-content-center row-top-margin-m20">
        <div class="col-md-10 text-center">
            <h3 style="color: rgba(12, 83, 136, 1.0);"> Sie werden eine Bestätigungsmail erhalten.</h3>
        </div><!-- col -->
    </div><!-- row -->
    <div class="row row-top-margin-m20">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped border-secondary" >
                    <tbody>
                    <tr>
                        <th >Berufsbezeichnung</th>
                        <td>
                            <?php echo check_data_empty_or_not($resultCleanData['jobtitle']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Qualifikation</th>
                        <td>
                            <?php echo check_data_empty_or_not($resultCleanData['professions']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Zusatzqualifikation</th>
                        <td>
                            <?php
                            //print_r($resultCleanData['professionsextra']);
                            echo wb_mm_remove_data_profession_extra($resultCleanData['professionsextra']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Berufserfahrung</th>
                        <td>
                            <?php echo check_data_empty_or_not($resultCleanData['berufserfahrung']); ?>
                        </td>
                    </tr>
                    <tr>

                        <th>Kenntnisse</th>
                        <td>
                            <?php echo check_data_empty_or_not($resultCleanData['kenntnisse']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Arbeitsbeginn</th>
                        <td>
                            <?php echo check_data_empty_or_not($resultCleanData['starten']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Kompetenzen</th>
                        <td>
                            <?php echo check_data_empty_or_not($resultCleanData['kompetenzen']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Vorname</th>
                        <td>
                            <?php echo check_data_empty_or_not($resultCleanData['firstname']); ?>
                        </td>
                    </tr>
                    <tr>

                        <th>Nachname</th>
                        <td>
                            <?php echo check_data_empty_or_not($resultCleanData['surname']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>E-Mail</th>
                        <td>
                            <?php echo check_data_empty_or_not($resultCleanData['youremail']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Telefon</th>
                        <td>
                            <?php echo check_data_empty_or_not($resultCleanData['yourtelephone']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Nachricht</th>
                        <td>
                            <?php echo check_data_empty_or_not($resultCleanData['yourmessage']); ?>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div><!-- table-responsive -->
        </div><!-- col -->
    </div><!-- row -->
    <div class="row justify-content-center">
        <form id="submit-request-email-bottom" method="post">
            <div class="col text-center responsive-button-space">
                <input type="hidden" name="formsteps" value="s-7">
                <button type="submit" id="submitted-email" class="btn btn-lg focke-fonts">Bewerbung versenden</button>

            </div><!-- col -->
        </form>
    </div><!-- row -->
</div><!-- container -->


<?php
require_once("header_footer/footer.php"); ?>
