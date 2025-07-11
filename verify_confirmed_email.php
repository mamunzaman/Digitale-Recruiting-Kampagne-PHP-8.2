<?php
require_once("includes/class.database.php");
require_once("includes/all.class.functions.php");
require_once("header_footer/header.php");

session_start();
$token = $_GET['make_active'];
$youremail = base64_url_decode($_GET['check_email']);
$status_text = '';
$database_gateway = new DatabaseGateway();

$sql = "SELECT * FROM
                focke_besucher_emails
                WHERE youremail= :youremail AND token= :token 
               ";

$data = [
    'youremail' => $youremail,
    'token' => $token
];

$response = $database_gateway->query($sql, $data);
$count = count((array)$response);

if( ($count > 0) && ($database_gateway->error == '')){

    $sql = "SELECT * FROM focke_besucher_emails 
            where token = :token AND verified = :verified
           ";


    $data = [
        'verified' => '0',
        'token'  => $token
    ];

    $response = $database_gateway->query($sql, $data);

    if ($database_gateway->error == '') {   // if verified update then goes here

        $get_the_updated_id = $response[0]['id'];

        if($response[0]['id']){

            $get_email_data = wb_mm_get_the_email_to_send($get_the_updated_id);

            $sql = "update focke_besucher_emails set
            verified = :verified 
            where id = :id
           ";
            $data = [
                'verified' => '1',
                'id'  => $response[0]['id'],
            ];
            $response = $database_gateway->executeTransaction($sql, $data);

            $_SESSION['send_email_data'] = $get_email_data;

            $status_email = include  "send_confirm_email.php";
            //echo $status_email;

            if (($database_gateway->error == '') && ($status_email == '1') ) {
                $status_text = '
                    <p style="text-align: center; font-size: 70px; color: #81D0F5;"><i class="bi bi-hand-thumbs-up-fill"></i></p>
                    <h3 style="text-align: center; line-height: 1; color: rgba(12, 83, 136, 1.0);">E-Mail-Bestätigung erfolgreich und an FOCKE & CO versandt.</h3>';
            }

        }else{
            $status_text = '
            <p style="text-align: center; font-size: 70px; color: #81D0F5;"><i class="bi bi-hand-thumbs-down-fill"></i></p>
            <h3 style="text-align: center; line-height: 1; color: rgba(12, 83, 136, 1.0);">Diese E-Mail-Adresse ist bereits für diese Berufsbewerbung registriert. </h3>';
        }

    } else {
        $status_text = 'Error encountered ' . $database_gateway->error;
    }

}else{
    $status_text = '
                    <p style="text-align: center; font-size: 70px; color: #81D0F5;"><i class="bi bi-shield-fill-x"></i></p>
                    <h3 style="text-align: center; line-height: 1; color: rgba(12, 83, 136, 1.0);">Der Link ist leider ungültig oder abgelaufen. Bitte nochmal versuchen.</h3>
                     ';
}
?>

<div class="container">
    <div class="row justify-content-center h-100">
        <div class="col-sm-12 col-md-12 my-auto responsive-container-margin">
            <div class="card card-block card-confirm w-100 mx-auto text-center card-no-data-click" data-url="<?php echo current_global_path(); ?>" style="padding: 50px
            0;">
                <p class="verification-info"><?php echo $status_text; ?></p>
            </div><!-- card -->
        </div><!-- col-sm-12 -->
    </div><!-- row -->
</div><!-- container -->

<?php require_once("header_footer/footer.php");
?>
