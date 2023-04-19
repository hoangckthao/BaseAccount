<?php
use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;
//require_once(__DIR__ . '\..\vendor\autoload.php');
require(__DIR__.'\DbConfig.php');


$app = new Application(dirname(__DIR__), $config);


$app->router->get('/', [AuthController::class, 'loginWithAjax']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);


$app->router->get('/login', [AuthController::class, 'loginWithAjax']);

$app->router->post('/login', [AuthController::class, 'loginWithAjax']);
$app->router->get('/register', [AuthController::class, 'registerWithAjax']);
$app->router->post('/register', [AuthController::class, 'registerWithAjax']);
$app->router->get('/profile', [AuthController::class, 'profileWithAjax']);
$app->router->post('/profile', [AuthController::class, 'profileWithAjax']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->post('/logout', [AuthController::class, 'logout']);

//$app->router->post('/profile', [AuthController::class, 'editProfile']);
$app->router->post('/editProfile', [AuthController::class, 'editProfileAjax']);


$app->router->post('/forgotPassword', [AuthController::class, 'forgotPasswordWithAjax']);
$app->router->get('/forgotPassword', [AuthController::class, 'forgotPasswordWithAjax']);
$app->router->post('/uploadImage', [AuthController::class, 'uploadImageAjax']);

$app->run();