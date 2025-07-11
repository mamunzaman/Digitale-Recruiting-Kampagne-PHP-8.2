<?php
if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
    if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) { // direct access denied
        header("Location: /403");
        exit;
    }
}
?>
<script src="assets/js/classie.js" type="text/javascript"></script>
<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/js/only.form.js" type="text/javascript"></script>




<!-- data table and XLS download JS -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>

<script src="assets/js/xls/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="assets/js/xls/buttons.html5.min.js" type="text/javascript"></script>
<script src="assets/js/xls/jszip.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').removeAttr('width').DataTable({
            autoWidth: true,
            pageLength: 1000,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            processing: true,
            serverSide: true,
            scrollX: false,
            searching: false,
            ajax: {
                url: 'includes/table_ajax_post.php',
                type: 'POST',
            },
            columns: [
                //{ data: 'job_type', title: 'Job Title' },
                { data: 'job_title', title: 'Berufsbezeichnung'  },
                //{ data: 'job_interested', title: 'Berufsbezeichnung' },
                { data: 'professions', title: 'Qualifikation' },
                //{ data: 'professionsextra', title: 'Zusatzqualifikation' },
                //{ data: 'berufserfahrung', title: 'Berufserfahrung' },
                //{ data: 'kenntnisse', title: 'Kenntnisse' },
                //{ data: 'starten', title: 'Arbeitsbeginn' },
                //{ data: 'kompetenzen', title: 'Kompetenzen' },
                /*{ data: 'firstname', title: 'Vorname' },
                { data: 'surname' , title: 'Nachname'},
                { data: 'youremail', title: 'E-Mail' },
                { data: 'yourtelephone', title: 'Telefon' },*/
                //{ data: 'yourmessage', title: 'Nachricht' },
                { data: 'created', title: 'Submitted' },
    ],
            dom: 'Bfrtip',
            buttons: {
                buttons: [
                    {
                        text: 'XLS DOWNLOAD',
                        className: 'btn btn-primary btn-focke float-start',
                        extend: 'excelHtml5',
                    },
                    {
                        text: 'Sign Out',
                        className: 'btn btn-primary btn-focke float-start',
                        action: function ( e, dt, node, config ) {
                            //alert( 'Button activated' );
                            window.location.href = '/index_logout.php';
                        }
                    },
                ],
                dom: {
                    button: {
                        className: 'btn'
                    },
                    buttonLiner: {
                        tag: null
                    }
                }
            }
             /*buttons: [ {
                extend: 'excelHtml5',
                className: 'btn btn-primary float-start',
                text: 'XLS DOWNLOAD',
                customize: function ( xlsx ){
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                }
            } ],*/
        });
    });
</script>

<!-- ALL ADMIN CUSTOM JS -->
<script src="assets/js/admin_custom_script.js" type="text/javascript"></script>
</body>
</html>
