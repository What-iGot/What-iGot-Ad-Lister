<?php 
define("DB_HOST",'127.0.0.1');
define("DB_NAME", 'WhatiGot_db');
define("DB_USER", 'codeup');
define("DB_PASS", 'password');
require_once 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

//set which table to pull data from
define('SQL_TABLE', 'items');
//set limit for use in pagination file 
$limit = 5;
 ?>