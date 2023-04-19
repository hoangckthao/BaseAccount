<?php

namespace app\core;
use app\core\Application;
use app\core\middlewares\BaseMiddleware;

class Controller
{
    public string $action = '';
    public string $layout = 'main';
    public array $middlewares = [];
    public function setLayout($layout) {
        $this->layout = $layout;
    }
    public function render($view, $params = []) {
        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware) {
        $this->middlewares[] = $middleware;
    }

    public function setMiddleware($middleware) {
        $this->middlewares[] = $middleware;
    }

    public function getMiddleware() :array {
        return $this->middlewares;
    }

    public function getPathAbsolute($link) {
        $rootPath = dirname(__DIR__);
        $fullPath = $rootPath.$link;        
        return $fullPath;
    }

    public function getPathRelative($link) {
        $rootPath = '../';
        $fullPath = $rootPath.$link;        
        return $fullPath;
    }

    public function getPathApi($link) {
        $rootPath = '/';
        $fullPath = $rootPath.$link;        
        return $fullPath;
    }
}
?>