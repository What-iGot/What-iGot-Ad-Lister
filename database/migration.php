<?php 
// define('DB_HOST', '127.0.0.1');
// define('DB_NAME', 'WhatiGot_db');
// define('DB_USER', 'root');
// define('DB_PASS', '');

require_once '../db_controls/db_connect.php';


$dropTable = "DROP TABLE IF EXISTS items";

$createTable = "CREATE TABLE items (
	id  INT UNSIGNED AUTO_INCREMENT,
	user_id INT NOT NULL,
	name VARCHAR(255) NOT NULL,
	description VARCHAR(255) NOT NULL,
	price DECIMAL NOT NULL,
	PRIMARY KEY (id)
	)";

$dbc->exec($dropTable);
$dbc->exec($createTable);

 ?>