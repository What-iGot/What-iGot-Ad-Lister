<?php 


require_once '../db_controls/db_connect.php';



$dropTable = "DROP TABLE IF EXISTS items";

$createTable = "CREATE TABLE items (
	id  INT UNSIGNED AUTO_INCREMENT,
	user_id INT NOT NULL,
	name VARCHAR(255) NOT NULL,
	description VARCHAR(255) NOT NULL,
	price DECIMAL NOT NULL,
	image_url VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
	)";

$dbc->exec($dropTable);
$dbc->exec($createTable);

 ?>