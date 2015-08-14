<?php 
// define("DB_HOST", $_ENV['DB_HOST']);
// define("DB_NAME", $_ENV['DB_NAME']);
// define("DB_USER", $_ENV['DB_USER']);
// define("DB_PASS", $_ENV['DB_PASS']);
// require_once 'db_connect.php';

// echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

//set which table to pull data from
define('SQL_TABLE', 'items');
//set limit for use in pagination file 
$limit = 10;
 ?>