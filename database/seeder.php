<?php  
	// define('DB_HOST', '127.0.0.1');
 //    define('DB_NAME', 'nat_parks_db');
 //    define('DB_USER', 'drod');
 //    define('DB_PASS', 'Rodgers12');
    
    require_once 'db_connect.php';

    $truncate = 'TRUNCATE items';
    $dbc->exec($truncate);

    $ads = [
    [
        'id'          => 100,
        'user_id'     => 100,
        'name'        => 'Refrigerator',
        'description' => 'Still running you better catch it.',
        'price'       => 150.00,
        'image_url'   => '/img/refrigerator.jpg'
    ],
    [
    	'id'		  => 200,
    	'user_id'	  => 200,
    	'name'		  => 'Couch',
    	'description' => 'Comfortable for sitting on.',
    	'price'		  => 150.00,
    	'image_url'   => '/img/couch.jpg'
    ],
    [	'id'		  => 300,
    	'user_id' 	  => 300,
    	'name'		  => 'TV',
    	'description' => 'Great for watching stuff.',
    	'price'		  => 150.00,
    	'image_url'   => '/img/tv.jpg'	
    ]
    ];
   
    $stmt = $dbc->prepare('INSERT INTO items (id, user_id, name, description, price, image_url) VALUES (:id, :user_id, :name, :description, :price, :image_url)');

foreach ($ads as $ad) {
	$stmt->bindValue(':id', $ad['id'], PDO::PARAM_INT);
	$stmt->bindValue(':user_id', $ad['user_id'], PDO::PARAM_INT);
	$stmt->bindValue(':name', $ad['name'], PDO::PARAM_STR);
	$stmt->bindValue(':description', $ad['description'], PDO::PARAM_STR);
	$stmt->bindValue(':price', $ad['price'], PDO::PARAM_INT);
	$stmt->bindValue(':image_url', $ad['image_url'], PDO::PARAM_STR);
	$stmt->execute();

	echo "inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}


?>