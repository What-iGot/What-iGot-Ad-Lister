<?php  
	require_once '../db_controls/db_connect.php';

    $truncate = 'TRUNCATE users';
    $dbc->exec($truncate);

    $users = [
    [
    	'id'			=> 100,
    	'user_id'   	=> 100,
    	'user_name'     => 'user one',
        'first_name'    => 'Jon',
        'last_name'     => 'Johnson',
    	'email'     	=> 'userone@example.com',
        'password'      => 'password1'
    ],
    [
    	'id'			=> 200,
    	'user_id'		=> 200,
    	'user_name'		=> 'user two',
        'first_name'    => 'Don',
        'last_name'     => 'Johnson',
    	'email'			=> 'usertwo@example.com',
        'password'      => 'password2'
    ],
    [
    	'id'			=> 300,
    	'user_id'		=> 300,
    	'user_name'		=> 'user three',
        'first_name'    => 'Ron',
        'last_name'     => 'Johnson',
    	'email'			=> 'userthree@example.com',
        'password'      => 'password3'
    ]
    ];

    $stmt = $dbc->prepare('INSERT INTO users (id, user_id, user_name, first_name, last_name, email, password) VALUES (:id, :user_id, :user_name, :first_name, :last_name, :email, :password)');

    foreach ($users as $user) {
    	$stmt->bindValue(':id', $user['id'], PDO::PARAM_INT);
    	$stmt->bindValue(':user_id', $user['user_id'], PDO::PARAM_INT);
    	$stmt->bindValue(':user_name', $user['user_name'], PDO::PARAM_STR);
        $stmt->bindValue(':first_name', $user['first_name'], PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $user['last_name'], PDO::PARAM_STR);
    	$stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $user['password'], PDO::PARAM_STR);
    	$stmt->execute();

    	echo "inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
    }

    ?>
