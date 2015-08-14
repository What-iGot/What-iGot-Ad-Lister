<?php 

$isLoggedIn = false;
session_start();
$sessionId = session_id();
$limit = 10;

$_ENV = include '../.env.php';

require_once 'model.php';
require_once 'user.php';
require_once '../db_controls/db_connect.php';
require_once '../db_controls/db_display_pagination.php';


 ?>