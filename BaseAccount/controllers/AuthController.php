<?php


namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\DbModel;
use app\core\exception\UpgradePasswordException;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Respone;
use app\models\ForgotPassword;
use app\models\LoginForm;
use app\models\User;
use app\models\ForgotPasswordForm;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile', 'editProfile']));
    }
    public function login(Request $request, Respone $respone)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $emailLogin = $loginForm->{'email'};
                $userP = User::findOne(['email' => $emailLogin]);


                // chi hien thi trang profile chu ko link toi trang profile
                $this->setLayout('auth');
                return $this->render('profile', ['userP' => $userP]);
                
            }
            $this->setLayout('auth');
            return $this->render('login', [
                'model' => $loginForm,
            ]);
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm,
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        if ($request->isPost()) {

            $user->loadData($request->getBody());
            if ($user->validate()) {
                if ($user->save()) {
                    header("Location: login");
                    return;
                } else {
                    $this->setLayout('auth');
                    return $this->render('register', [
                        'model' => $user,
                    ]);
                }
            } else {
                //Application::$app->session->setFlash('success', 'Validate failed!');                                                       
                return $this->render('register', ['model' => $user]);
            }
        }
        $this->setLayout('auth');
        return $this->render('register', ['model' => $user]);
    }
    public function logout(Request $request, Respone $respone)
    {
        Application::$app->logout();
        $respone->redirect('/login');
    }

    public function profile(Request $request, Respone $respone)
    {
        $user = new User();
        $user->loadData($request->getBody());
        //var_dump($user).PHP_EOL;                       
        $this->setLayout('auth');
        return $this->render('profile', [
            'userP' => $user,
        ]);
    }

    public function editProfile(Request $request, Respone $respone)
    {
        $user = new User();
        if ($request->isPost()) {

            $user->loadData($request->getBody());
            $user2 = User::findOne(['id' => $user->getId()]);
            if ($user->validatePhone() && $user->upgradeByEmail(['email' => $user->getEmail()], $user)) {
                $user2 = User::findOne(['id' => $user->getId()]);
                //Application::$app->session->setFlash('success', 'Edit successfully!');
                //Application::$app->respone->redirect('/profile');
                //var_dump($user).PHP_EOL;
                return $this->render('profile', ['userP' => $user2]);
            }
            return $this->render('profile', ['userP' => $user2]);
        }
        $this->setLayout('auth');
        return $this->render('profile', ['userP' => $user]);
    }

    public function forgotPassword(Request $request, Respone $respone)
    {
        $forgotPasswordForm = new ForgotPasswordForm();
        $user = new User();
        if ($request->isPost()) {
            $forgotPasswordForm->loadData($request->getBody());
            //var_dump($forgotPasswordForm);
            if ($forgotPasswordForm->validate() && $forgotPasswordForm->checkEmailExits()) {

                $emailRecover = $forgotPasswordForm->{'email'};
                if (($passwordChanged = $forgotPasswordForm->sendMailChangePassword()) !== null) {
                    $user = User::findOne(['email' => $emailRecover]);
                    $passwordChanged = password_hash($passwordChanged, PASSWORD_DEFAULT);
                    if ($user->upgradePasswordByEmail(['password' => $passwordChanged], $user)) {

                        $this->setLayout('auth');
                        return $this->render('forgotPassword', ['model' => $forgotPasswordForm]);
                    }
                } else {
                    throw new UpgradePasswordException();
                }
            }
            //var_dump($forgotPasswordForm);
            $this->setLayout('auth');
            return $this->render('forgotPassword', ['model' => $forgotPasswordForm]);
        }
        $this->setLayout('auth');
        return $this->render('forgotPassword', ['model' => $user]);
    }

    public function editProfileAjax(Request $request, Respone $respone)
    {
        $userP = new User();
        $user = new User();        
        $user->loadData($request->getBody());
        
        $userP = User::findOne(['email' => $user->getEmail()]);
        if ($request->isPost()) {
            if ($user->validatePhone()) {                
                if ($user->upgradeByEmail(['email' => $user->getEmail()], $user)) {
                    $json = json_encode($user);
                    
                    echo $json;
                    return;
                }                           
                else echo "Update failed";
            }
        }
        $this->setLayout('auth');
        return $this->render('profile', ['userP' => $userP]);
    }
}
