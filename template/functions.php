<?php 
session_start();
function inputHas($key){
	if(isset($_REQUEST[$key])){
		return true;
	}else{
		return false;
	}
}
function inputGet($key){
	if (isset($_REQUEST[$key])){
		return $_REQUEST[$key];
	}else{
		return null;
	}
}

function escape(){
	return strip_tags(htmlspecialchars($intput));
}
?>