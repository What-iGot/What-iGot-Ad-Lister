<?php
    require_once '../template/Auth.php';
    session_start();
    Auth::logoutUser();
    header('Location: /');
    exit;
?>