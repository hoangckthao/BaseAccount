<?php 

// composer __autoload()
//$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
//$dotenv->load();
// $config = [
//     'userClass' => User::class,
//     'db' => [
//         'dsn' => $_ENV['DB_DSN'],
//         'user' => $_ENV['DB_USER'],
//         'password' => $_ENV['DB_PASSWORD'],
//     ]
// ];



// manual load
$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => 'mysql:host=localhost;dbname=baseaccount',
        'user' => 'root',
        'password' =>'',
    ]
];

// DB_DSN = mysql:host=localhost;dbname=baseaccount
// DB_USER = root
// DB_PASSWORD = 

?>
