<?php 

namespace app\core\middlewares;

use app\core\Application;
use app\core\exception\ForbiddenException;

class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];
    public function __construct(array $actions = []) {
        $this->actions = $actions;
    }

    public function execute() {
        //var_dump(Application::isGuest());
        if (Application::isGuest()) {
               
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) { //the middleware work for all action and the current action                
                throw new ForbiddenException();
                
            }
        }
    }
}

?>