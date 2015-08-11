<?php 
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'WhatiGot_db');
define('DB_USER', 'drod');
define('DB_PASS', 'codeuprocks');

//instanciate new connection to database
$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);













 ?>