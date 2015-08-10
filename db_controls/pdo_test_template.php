<?php 
define("DB_HOST",'HOST_IP');
define("DB_NAME", 'SELECTED_DATABASE');
define("DB_USER", 'SELECTED_USER');
define("DB_PASS", 'PASSWORD_FOR_SELECTED_USER');
require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";
 ?>