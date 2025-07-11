<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'focke_besucher_emails';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case object
// parameter names
$columns = array(
    //array( 'db' => 'job_type', 'dt' => 'job_type' ),
    array( 'db' => 'job_title',  'dt' => 'job_title' ),
    //array( 'db' => 'job_interested',   'dt' => 'job_interested' ),
    array( 'db' => 'professions',     'dt' => 'professions' ),
    array( 'db' => 'professionsextra', 'dt' => 'professionsextra' ),
    array( 'db' => 'berufserfahrung',  'dt' => 'berufserfahrung' ),
    array( 'db' => 'kenntnisse',   'dt' => 'kenntnisse' ),
    array( 'db' => 'starten',     'dt' => 'starten' ),
    array( 'db' => 'kompetenzen',     'dt' => 'kompetenzen' ),
    array( 'db' => 'firstname',   'dt' => 'firstname' ),
    array( 'db' => 'surname',     'dt' => 'surname' ),
    array( 'db' => 'youremail', 'dt' => 'youremail' ),
    array( 'db' => 'yourtelephone',
           'dt' => 'yourtelephone',
        'formatter' => function( $d, $row ) {
            return ($d != null ? $d : ''); // returns true $d . ' Test';
        }),
    array( 'db' => 'yourmessage',
            'dt' => 'yourmessage',
            'formatter' => function( $d, $row ) {
                return ($d != null ? $d : ''); // returns true $d . ' Test';
            }
        ),
    array(
        'db'        => 'created',
        'dt'        => 'created',
        'formatter' => function( $d, $row ) {
            return date( 'd.m.Y H:i:s', strtotime($d)).' Uhr';
        }
    ),
    /*
    array( 'db' => 'berufserfahrung',  'dt' => 'berufserfahrung' ),
    array( 'db' => 'kenntnisse',   'dt' => 'kenntnisse' ),
    array( 'db' => 'starten',     'dt' => 'starten' ),
    array( 'db' => 'kompetenzen',     'dt' => 'kompetenzen' ),

    array( 'db' => 'firstname',   'dt' => 'firstname' ),
    array( 'db' => 'surname',     'dt' => 'surname' ),
    array( 'db' => 'youremail', 'dt' => 'youremail' ),
    array( 'db' => 'yourtelephone',  'dt' => 'yourtelephone' ),
    array( 'db' => 'yourmessage',   'dt' => 'yourmessage' ),*/
);

/*
$db_host = "db5009423383.hosting-data.io";
$db_user = "dbu2065216";
$db_password = 'FockeNewJoin!';
$db_name = "dbs7993113";
*/
// SQL server connection information
$sql_details = array(
    'user' => 'dbu2065216',
    'pass' => 'FockeNewJoin!',
    'db'   => 'dbs7993113',
    'host' => 'db5009423383.hosting-data.io'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
    SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns, null, "verified = '1'"  )
);