<?php 

switch ($_SERVER['REQUEST_URI']) {
    case '/ads':
        include 'all-ads.php';
        break;
    case '/new-ad':
        include 'new_ad.php';
        break;
    case '/edit':
        include 'home.php';
        break;
    case '/new-user':
        include 'create_user.php';
        break;
    case '/logout':
        include 'auth.logout.php';
        break;
    case '/login':
        include 'user.login.php';
        break;
    default:
        include 'home.php';
        break;
}