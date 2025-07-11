<?php
// this is only when direct access like *.php
define('DirectAccessRestriction', TRUE); 
session_start();
$_SESSION['applicant_data'] = '';
if (!$_SESSION['session_admin_access']){
    header("Location:index_admin.php");
}
require_once("header_footer/header.php");
?>

<div class="container-fluid" style="max-width: 95%;" >
    <div class="d-flex justify-content-between row">
        <div class="col col-md-6">
            <h1>Focke Join Admin Area</h1>
        </div><!-- col -->
    </div><!-- row -->
</div><!-- container-fluid -->
<div class="container-fluid" style="max-width: 95%;">
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="table table-striped display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th>Berufsbezeichnung</th>
                    <th>Qualifikation</th>
                    <th>Submitted</th>
                </tr>

                </thead>
                <tfoot>
                <tr>
                    <th>Berufsbezeichnung</th>
                    <th>Qualifikation</th>
                    <th>Submitted</th> 
                </tr>
                </tfoot>
            </table>
        </div><!-- col -->
    </div><!-- row -->
</div>


<?php
require_once("header_footer/footer_admin.php");
?>
