<?php
require_once '../db_controls/db_connect.php';

$stmt = $dbc->prepare("SELECT * FROM items");
$stmt->execute();
$ads = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>
<!DOCTYPE html>
 <html>
 <head>
 	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 	<title>Ad Index Page</title>
 </head>
 <body>

 <table>
 	<tr id="theader">
 		<th>id</th>
 		<th>user id</th>
 		<th>item name</th>
 		<th>description</th>
 		<th>price</th>
 	</tr>

 	<?php foreach ($ads as $ad): ?>
 		<tr id="tdata">
 			<td><?= $ad['id']; ?></td>
 			<td><?= $ad['user_id']; ?></td>
 			<td><?= $ad['name']; ?></td>
 			<td><?= $ad['description']; ?></td>
 			<td><?= $ad['price']; ?></td>
 		</tr>
 	<?php endforeach; ?>
 </table>

 <!-- <a href="tv"><h3>TV for sale</h3></a>
 <h4>price location list date</h4>
 <img src="img/tvcopy.jpg">
 <a href="refrigerator"><h3>Refrigerator for sale</h3></a>
 <h4>price location list date</h4>
 <img src="img/refrigeratorcopy.jpg">
 <a href="couch"><h3>Couch for sale</h3></a>
 <h4>price location list date</h4>
 <img src="img/couchcopy.jpg"> -->




 
 </body>
 </html>