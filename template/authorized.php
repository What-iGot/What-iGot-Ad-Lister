<?php 
require_once '../template/Input.php';
require_once '../template/Authenticate.php';
function pageController(){
	$data = [];
	$data['message'] = "Authorized User: Access Granted.";
	$data['id'] = Auth::userId();
	if (Auth::check()){
		 true;
	}else{
		header("Location: login.php");
		exit();
	}
	return $data;	
}
extract(pageController());
?>
<!Doctype html>
<html>
	<head>
		<title>Authorized</title>
	</head>
	<body>
		<h1><?= $message;?></h1>
		<h2>Welcome: <?= $id; ?>!</h2>
		<a href="login.php">BACK</a>
		<a href="logout.php">LOGOUT</a>
	</body>
</html>