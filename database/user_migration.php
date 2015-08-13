<?php
require_once '../db_controls/db_connect.php';

$dropTable = "DROP TABLE IF EXISTS users";

$createTable = "CREATE TABLE users (
	id  INT UNSIGNED AUTO_INCREMENT,
	user_id INT NOT NULL,
	user_name VARCHAR(255) NOT NULL,
	first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
	)";

$dbc->exec($dropTable);
$dbc->exec($createTable);

 ?>