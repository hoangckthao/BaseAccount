<?php


namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Respone;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller 
{
    public function login(Request $request, Respone $respone) {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {                
                $respone->redirect('/profile');                
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm,
        ]);
    }

    public function register(Request $request) {
        $user = new User();
        if ($request->isPost()) {
            
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {                
                Application::$app->session->setFlash('success', 'Register successfully!');
                Application::$app->respone->redirect('/login');
                return;
            }
            // var_dump($registerModel->errors);
            return $this->render('register', ['model' => $user]);
        }
        $this->setLayout('auth');
        return $this->render('register', ['model' => $user]);
    }
    public function logout(Request $request, Respone $respone) {
        Application::$app->logout();
        $respone->redirect('/profile');
    }

    public function profile(Request $request, Respone $respone) {
        $user = new User();
        if ($request->isPost()) {
            
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {                                
                Application::$app->respone->redirect('/login');
                return;
            }
            // var_dump($registerModel->errors);
            return $this->render('profile');
        }
        $this->setLayout('auth');
        return $this->render('profile');
    }
}


?>