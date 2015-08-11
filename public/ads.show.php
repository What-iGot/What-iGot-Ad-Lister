<?php 
require_once '../db_controls/db_connect.php';

$item = (isset($_GET['id']));

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <title>Ad Show</title>
 </head>
 <body>

 <h3><?=  $item?></h3>

</body>
 </html>