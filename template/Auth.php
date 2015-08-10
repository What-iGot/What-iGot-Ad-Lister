<?php 
require_once 'Input.php';
require_once 'Log.php';
class Auth
{
	public static $hash = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
	public static function attempt($username, $password){
		$userHash = password_hash($password, PASSWORD_DEFAULT);
		if($username == 'guest' && password_verify($password, static::$hash)) {
		    $_SESSION['LOGGED_IN_USER'] = $username;
		    $valid = new Log('../logs/Valid');
		    $valid->logInfo('Password is valid!');
		    return true;
			exit();
		} else {
		    $nonValid = new Log('../logs/Invalid');
		    $nonValid->logError('Invalid password.');
			echo "Incorrect username or password.";
			return false;
		}
	}
	public static function check(){
		if(!empty($_SESSION['LOGGED_IN_USER'])){
			return true;
		}else{
		return false;
		}
	}
	public static function userID(){
		$user = $_SESSION['LOGGED_IN_USER'];
		return $user;
	}
	public static function logOut(){
		$_SESSION = array();
	    if (ini_get("session.use_cookies")) {
	        $params = session_get_cookie_params();
	        setcookie(session_name(), '', time() - 42000,
	            $params["path"], $params["domain"],
	            $params["secure"], $params["httponly"]
	        );
	    }
	    session_destroy();
	    header('Location: login.php');
	    exit();
	}
}
 ?>