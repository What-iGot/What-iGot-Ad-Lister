	<?php
require_once '../template/Input.php';
require_once '../template/Auth.php';

function pageController(){
	if(Auth::check()){
		header("Location: home.php");
		exit();
	}
	if (Input::has('password') && Input::has('username')){
		$username = Input::get('username');
		$password = Input::get('password');
		if(Auth::attempt($username, $password)){
			header("Location: home.php");
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
 <form method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>
    
</body>
</html>