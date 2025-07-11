<?php
if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
    if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) { // direct access denied
        header("Location: /403");
        exit;
    }
}
session_start();
require("packages/securimage/securimage.php");
$securimage = new Securimage();
// We need the session to check the phrase after submitting
require_once("includes/all.class.functions.php");
require_once("includes/class.database.php");

if(!isset($_SESSION['applicant_data'])){
    $_SESSION['applicant_data'] = array();
}

$allPostData = array();
$cou=0;
$get_value_clean = array();

if( ($_POST['formsteps'] != 's-7')){

    foreach ($_POST as $key => $value)
    {

        if($key === 'formsteps'){   // this is only step one checking

            $getSteps = strip_tags($value);
            $value = filter_var($value, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $allPostData[$key] = $value;

        }else{  // this single or mutliple checkbox selection and data save in session

            if(is_array($value)){   // check if has value or not

                foreach ($value as $item) {
                    if($item){
                        //$item = strip_tags(filter_var($item, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH));
                        $item_key = url_slug($item);
                        $get_value_clean[$item_key] = strip_tags($item);
                    }
                }
                $allPostData[$key] = $get_value_clean;
            }else{  // or direct insert in the array with the key value
                $allPostData[$key] = strip_tags($value);
            }

        }   // end else statement

        $cou++;
    }
}
/// after add all the data into the session data
$_SESSION['applicant_data'][$getSteps] = $allPostData;

/*********************
 *
 * this statement to save date to the database with session data for confirmation to send email.
 *
 */


if($_POST['formsteps'] === 's-6'){  // check last mail
    $resultCleanData = wb_mm_orderData_beforeInsert($_SESSION['applicant_data']);
    $database_gateway = new DatabaseGateway();
    if ($securimage->check($_POST['captcha_code']) == true) {
        echo "1";
    }else{
        echo '<p style="text-align: center; font-size: 50px; color: black;"><i class="bi bi-x-square-fill"></i></p> 
                <p style="text-align: center;">Captcha falsch oder vergessen:</p>
                <h3 style="text-align: center; line-height: 1; color: rgba(12, 83, 136, 1.0);">Bitte (erneut) eingeben.</h3>
                ';
    } 

}

if($_POST['formsteps'] === 's-7') {  // check last mail
    //print_r($_POST);
    $resultCleanData = wb_mm_orderData_beforeInsert($_SESSION['applicant_data']);
    $database_gateway = new DatabaseGateway();


    /*************
     * if email and type already inserted in the database
     */
    if($resultCleanData['token'] == null){
        $resultCleanData['token'] = bin2hex(random_bytes(50)); // generate unique token
    }
    $sql = "SELECT * FROM
                focke_besucher_emails
                WHERE youremail= :youremail AND job_type = :type";

    $data = [
        'youremail'     => $resultCleanData['youremail'],
        'type'          => $resultCleanData['type']
    ];

    $response = $database_gateway->query($sql, $data);
    $count = count((array)$response);

    //echo $count;
    if( ($count > 0) && ($database_gateway->error == '')){
        echo '
        <p style="text-align: center; font-size: 70px; color: black;"><i class="bi bi-envelope-x-fill"></i></p>
        <h3 style="text-align: center; line-height: 1; color: rgba(12, 83, 136, 1.0);">E-Mail wurde bereits zur Bewerbung für dieses Berufsangebot genutzt.</h3>';
        //echo $response[0]['id'];
    /*************
     * ends here
     */
    }else{

        $sql = "INSERT INTO focke_besucher_emails
           (
            job_type,
            job_title,
            job_interested,
            professions,
            professionsextra,
            berufserfahrung,
            kenntnisse,
            starten,
            kompetenzen,
            firstname,
            surname,
            youremail,
            yourtelephone,
            yourmessage,
            token
           )
           values
           (
            :type,
            :jobtitle,
            :job_interested,
            :professions,
            :professionsextra,
            :berufserfahrung,
            :kenntnisse,
            :starten,
            :kompetenzen,
            :firstname,
            :surname,
            :youremail,
            :yourtelephone,
            :yourmessage,
            :token
           )";

        $data = [
            'type'              => $resultCleanData['type'],
            'jobtitle'          => $resultCleanData['jobtitle'],
            'job_interested'    => $resultCleanData['jobtitle'],
            // professional information
            'professions'       => $resultCleanData['professions'],
            'professionsextra'  => $resultCleanData['professionsextra'],
            'berufserfahrung'   => $resultCleanData['berufserfahrung'],
            'kenntnisse'        => $resultCleanData['kenntnisse'],
            'starten'           => $resultCleanData['starten'],
            'kompetenzen'       => $resultCleanData['kompetenzen'],
            // email information
            'firstname'         => $resultCleanData['firstname'],
            'surname'           => $resultCleanData['surname'],
            'youremail'         => $resultCleanData['youremail'],
            'yourtelephone'     => $resultCleanData['yourtelephone'],
            'yourmessage'       => $resultCleanData['yourmessage'],
            'token'             => $resultCleanData['token']
        ];

        $database_gateway->executeTransaction($sql, $data);

        if ($database_gateway->error == '') {

            $_SESSION['applicant_data']['youremail'] = $resultCleanData['youremail'];
            $_SESSION['applicant_data']['token'] = $resultCleanData['token'];
            // after insert email data to database
            $_SESSION['all_data'] = $resultCleanData;
            //$_SESSION['all_data'] = $resultCleanData;
            echo '
                <p style="text-align: center;">Fast geschafft!</p>
                <p style="text-align: center; font-size: 70px; color: black;">
                    <i class="bi bi-envelope-check-fill"></i>
                </p>
                <p style="text-align: center;">Nachricht wurde versandt.</p>
                <h3 style="text-align: center; line-height: 1; color: rgba(12, 83, 136, 1.0);">Bitte verifizieren Sie sich über Ihre Bestätigungsmail.</h3>';

        } else {
            echo 'Error encountered ' . $database_gateway->error;
        }
        require_once("send_email.php");
    }      // if not exist then send email

}
