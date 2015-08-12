<?php
require_once '../template/Input.php';
require_once '../template/Auth.php';
function pageController(){
	if(Auth::check()){
		header("Location: authorized.php");
		exit();
	}
	if (Input::has('password') && Input::has('username')){
		$username = Input::get('username');
		$password = Input::get('password');
		if(Auth::attempt($username, $password)){
			header("Location: authorized.php");
			exit();
		}
	}
};
pageController();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    
</body>
</html>