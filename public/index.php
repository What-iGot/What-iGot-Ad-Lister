<?php 

switch ($_SERVER['REQUEST_URI']) {
    case '/ads':
        include 'all-ads.php';
        break;
    case '/new':
        include 'new_ad.php';
        break;
    default:
        include 'home.php';
        break;
}