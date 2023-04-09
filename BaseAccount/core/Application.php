<?php
namespace app\core;

use UserModel;
use app\models\User;
use Exception;

class Application
{
    public string $layout = 'main';
    public static string $ROOT_DIR;
    public string $userClass;
    public Request $request;
    public Router $router;
    public Respone $respone;
    public Database $db;
    public ?Controller $controller = null;
    public Session $session;
    public ?DbModel $user;
    public static Application $app;    

    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        //var_dump($this->userClass);
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->respone = new Respone();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->respone);

        $this->db = new Database($config['db']);
        $this->user = new User();

        $primaryValue = $this->session->get('user');
        //var_dump($primaryValue).PHP_EOL;
        if ($primaryValue) {                      
            $this->user = $this->user->findOneById([ 'id' => $primaryValue]);        
        } else {
            $this->user = null;
        }

    }


    public function run()
    {        
        try {
            echo $this->router->resolve();
        } catch (Exception $e) {
            echo $this->router->renderView('_error', [
                'exception' => $e,
            ]);
        }
    }

    /**
     * Get the value of controller
     *
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * Set the value of controller
     *
     * @param Controller $controller
     *
     * @return self
     */
    public function setController(Controller $controller): self
    {
        $this->controller = $controller;
        return $this;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey}; //user id       
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest() {
        //var_dump(self::$app->user);
        return !self::$app->user;
    }
}