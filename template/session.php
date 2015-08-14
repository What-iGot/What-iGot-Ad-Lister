<?php 
require_once 'Auth.php';
require_once 'Input.php';
session_start();

if (isset($_POST['user_name']) && isset($_POST['password'])) {
$username = $_POST['user_name'];
$password = $_POST['password'];
$stmt = $dbc->prepare("SELECT * from users where user_name = '$username' and password = '$password'");
$stmt->execute();
}

if(





if(isset ($_SESSION['user_name']))
{
echo "Welcome $_SESSION['user_name']";
}
else
{
header("location: home.php");
}
session_destroy();
 ?>