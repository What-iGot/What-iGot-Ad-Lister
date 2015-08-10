<?php 
define("DB_HOST",'127.0.0.1');
define("DB_NAME", 'WhatiGot_db');
define("DB_USER", 'codeup');
define("DB_PASS", 'password');
require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

// //set which table to pull data from
// define('SQL_TABLE', 'national_parks');
// //set limit for use in pagination file 
// $limit = 4;
 ?>