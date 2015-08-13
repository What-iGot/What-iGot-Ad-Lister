<?php
require_once '../template/Input.php';
require_once '../template/users.php';
require_once '../template/BaseModel.php';

if (Input::has('first_name') && Input::has('last_name') && Input::has('user_name') && Input::has('email') && Input::has('password')){
	$new_user = new User();
	$new_user->first_name = Input::get('first_name');
	$new_user->last_name = Input::get('last_name');
	$new_user->user_name = Input::get('user_name');
	$new_user->email = Input::get('email');
	$new_user->password = Input::get('password');
	$new_user->save();
} 








 ?>