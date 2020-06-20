<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

// DB table to use
$table = 'playerInfo';
 
// Table's primary key
$primaryKey = 'recordId';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'jerseyNumber','dt' => 0 ),
    array( 'db' => 'firstName','dt' => 1 ),
    array( 'db' => 'lastName','dt' => 2 ),
    array( 'db' => 'dOB','dt' => 3 ),
    array( 'db' => 'phoneNumber','dt' => 4 ),
    array( 'db' => 'playerID','dt' => 5 ),
    array( 'db' => 'prefComm','dt' => 6 ),
    array( 'db' => 'emailAddress','dt' => 7 ),
    array( 'db' => 'prefLang','dt' => 8 ),
    array( 'db' => 'nickName','dt' => 9 ),
    array( 'db' => 'altPhone','dt' => 10 ),
    array( 'db' => 'uniformSize','dt' => 11 ),
    array( 'db' => 'primaryPosition','dt' => 12 ),
    array( 'db' => 'secondaryPosition','dt' => 13 ),
    array( 'db' => 'playerComments','dt' => 14 ),
	array( 'db' => 'recordId','dt' => 15 )
);
 
  
 
 
 // SQL server connection information
$sql_details = array(
    'user' => 'epiz_23637108',
    'pass' => 'Fqmx4aIZmq',
    'db'   => 'epiz_23637108_playerInfo',
    'host' => 'sql304.epizy.com'
);

 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit this next block.
 */
 
include 'ssp.class.php' ;
 
echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);
  
?>
