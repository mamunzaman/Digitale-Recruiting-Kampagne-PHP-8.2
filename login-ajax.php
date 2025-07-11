<?php
/*****************
 * this section forbidden direct php access for ajax data
 */
if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
    if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) { // direct access denied
        header("Location: /403");
        exit;
    }
}

session_start();
include_once("includes/class.database.php");
$database_gateway = new DatabaseGateway();

$return_arr = array();

$sql = "select * from
                focke_besucher_admin_users
                where email = :email AND password = :password
               ";

$data = [
    'email' => $_POST['email'],    // this is get the current form ID
    'password'  => md5($_POST['password'])
];

$response = $database_gateway->query($sql, $data);
$count = count((array)$response);

if( ($count > 0) && ($database_gateway->error == '')){

    $respond_data = $response;
    session_start();
    $_SESSION['session_admin_access']= array(
        'id'    =>  $respond_data[0]['user_id'],
        'username' => $respond_data[0]['username'],
        'email'     => $respond_data[0]['email']
    );

    $return_arr['status'] = 1;
    $return_arr['url'] = '/home_admin_dashboard.php';

}else{
    session_destroy();
    // redirect not successful login.
    $return_arr['status'] = 0;
    $return_arr['url'] = '/index_admin.php';

}

echo json_encode($return_arr);