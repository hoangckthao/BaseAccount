<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;

require_once(__DIR__ . '\..\vendor\autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [AuthController::class, 'login']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);


$app->router->get('/login', [AuthController::class, 'login']);

$app->router->post('/login', [AuthController::class, 'loginWithAjax']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/profile', [AuthController::class, 'profile']);
$app->router->post('/profile', [AuthController::class, 'profile']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->post('/logout', [AuthController::class, 'logout']);

//$app->router->post('/profile', [AuthController::class, 'editProfile']);
$app->router->post('/editProfile', [AuthController::class, 'editProfileAjax']);


$app->router->post('/forgotPassword', [AuthController::class, 'forgotPassword']);
$app->router->get('/forgotPassword', [AuthController::class, 'forgotPassword']);

$app->run();
?>