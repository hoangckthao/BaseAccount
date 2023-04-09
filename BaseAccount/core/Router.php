<?php

namespace app\core;

/**
 * Summary of Router
 */
class Router
{
    public Request $request;
    public Respone $response;
    protected array $routes = [];

    public function __construct(Request $request, Respone $respone)
    {
        $this->request = $request;
        $this->response = $respone;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode('404');
            return $this->renderView('_404');
        }

        //if callback is a view file
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {             
            /**@var Controller $controller */
            $controller = new $callback[0](); // controller name            
            Application::$app->controller = $controller;
            $controller->action = $callback[1]; // action = profile, login, register ...
            $callback[0] = $controller;
            foreach ($controller->getMiddleware() as $middleware) {
                $middleware->execute();
            }
        }

        return call_user_func($callback, $this->request, $this->response);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function layoutContent()
    {
        $layout = Application::$app->layout;
        if (Application::$app->controller) {
            $layout = Application::$app->controller->layout;
        }

        ob_start();
        include_once(Application::$ROOT_DIR . "/views/layouts/$layout.php");
        return ob_get_clean();
    }

    public function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value; // $key = name => $$key = $name
        }
        ob_start();
        include_once(Application::$ROOT_DIR . "/views/$view.php");
        return ob_get_clean();
    }
}
?>