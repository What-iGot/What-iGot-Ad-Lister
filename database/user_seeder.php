<?php  
	require_once '../db_controls/db_connect.php';

    $truncate = 'TRUNCATE users';
    $dbc->exec($truncate);

    $users = [
    [
    	'id'			=> 100,
    	'user_id'   	=> 100,
    	'user_name'    => 'user one',
    	'email'     	=> 'userone@example.com'
    ],
    [
    	'id'			=> 200,
    	'user_id'		=> 200,
    	'user_name'		=> 'user two',
    	'email'			=> 'usertwo@example.com'
    ],
    [
    	'id'			=> 300,
    	'user_id'		=> 300,
    	'user_name'		=> 'user three',
    	'email'			=> 'userthree@example.com'
    ]
    ];

    $stmt = $dbc->prepare('INSERT INTO users (id, user_id, user_name, email) VALUES (:id, :user_id, :user_name, :email)');

    foreach ($users as $user) {
    	$stmt->bindValue(':id', $user['id'], PDO::PARAM_INT);
    	$stmt->bindValue(':user_id', $user['user_id'], PDO::PARAM_INT);
    	$stmt->bindValue(':user_name', $user['user_name'], PDO::PARAM_STR);
    	$stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
    	$stmt->execute();

    	echo "inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
    }

    ?>
