<?php
session_start();
//define('DirectAccessRestriction', TRUE);
include_once("includes/class.database.php");
$database_gateway = new DatabaseGateway();

    $sql = "select * from
                focke_besucher_admin_users
                where email = :email and password= :password
               ";

    $data = [
        'email' => $_POST['email'],    // this is get the current form ID
        'password'  => md5($_POST['password'])
    ];

    //print_r($data);
    $response = $database_gateway->query($sql, $data);

    print_r($response);
    //exit();
    // check data found as I asked to search using PDO
//count((array)$XYZVariable);
    $count = count((array)$response);

    if( ($count > 0) && ($database_gateway->error == '')){

        $respond_data = $response;
        session_start();
        $_SESSION[]= array(
                'id'    =>  $respond_data[0]['user_id'],
                'username' => $respond_data[0]['username'],
                'email'     => $respond_data[0]['email']
        );

        // redirect afrer successful login
        header('location:home_admin_dashboard.php');

    }else{

        // redirect not successful login.
        header('location:index_admin.php');
    }