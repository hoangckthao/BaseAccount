<?php


namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\DbModel;
use app\core\exception\UpgradePasswordException;
use app\core\form\ForgotPasswordForm;
use app\core\form\LoginForm;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Respone;
use app\models\User;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profileWithAjax', 'editProfileWithAjax']));
    }

    public function loginWithAjax(Request $request, Respone $respone)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate()) {
                if ($loginForm->login()) {
                    $emailLogin = $loginForm->{'email'};
                    $userP = User::findOne(['email' => $emailLogin]);
                    $json = json_encode($userP);
                    return $json;
                } else {
                    // login failed
                    $json = json_encode($loginForm);
                    return $json;
                }
            }
            // validate failed
            $json = json_encode($loginForm);
            return $json;
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm,
        ]);
    }

    public function profileWithAjax(Request $request, Respone $respone)
    {
        $this->setLayout('auth');
        $id = Application::$app->session->get('user');
        $userP = User::findOne(['id' => $id]);
        return $this->render('profile', [
            'userP' => $userP,
        ]);
    }


    public function registerWithAjax(Request $request, Respone $respone)
    {
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate()) {
                $user->save();
                $json = json_encode($user);
                return $json;
            } else {
                //validate failed, return error and dont save
                $json = json_encode($user);
                return $json;
            }
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user,
        ]);
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

    public function forgotPasswordWithAjax(Request $request, Respone $respone)
    {
        $forgotPasswordForm = new ForgotPasswordForm();
        $user = new User();
        if ($request->isPost()) {

            $forgotPasswordForm->loadData($request->getBody());
            if ($forgotPasswordForm->validate()) {
                if ($forgotPasswordForm->checkEmailExits()) {
                    $emailRecover = $forgotPasswordForm->{'email'};
                    if (($passwordChanged = $forgotPasswordForm->sendMailChangePassword()) !== null) {
                        $user = User::findOne(['email' => $emailRecover]);
                        $passwordChanged = password_hash($passwordChanged, PASSWORD_DEFAULT);
                        if ($user->upgradePasswordByEmail(['password' => $passwordChanged], $user)) {

                            $json = json_encode($user);
                            return $json;
                        }
                        //update pass failed
                        $json = json_encode($forgotPasswordForm);
                        return $json;
                    }
                    //send email failed
                    $json = json_encode($forgotPasswordForm);
                    return $json;
                }
                //email is not exits
                $json = json_encode($forgotPasswordForm);
                return $json;
            } else {
                // email is validate failed  
                $json = json_encode($forgotPasswordForm);
                return $json;
            }
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

                $errorCheck = array();
                $errorCheck = $this->uploadImageAjax($request, $respone);
                $errorCheck = json_decode($errorCheck);

                if (!empty($errorCheck->errors)) {
                    //co loi
                    //upgrade anh failed
                    $user = User::findOne(['email' => $user->getEmail()]);
                    $user->errors = ['image' => $errorCheck->errors[0]];
                    $json = json_encode($user);
                    // var_dump($json);
                    // die();
                    echo $json;
                    return;
                }

                // khong co loi
                //upgrade anh thanh cong
                if ($user->upgradeByEmail(['email' => $user->getEmail()], $user)) {
                    //upgrade toan bo thanh cong 
                    $user = User::findOne(['email' => $user->getEmail()]);
                    $json = json_encode($user);
                    echo $json;
                    return;
                } else {
                    // upgrade tat ca failed
                    $user = User::findOne(['email' => $user->getEmail()]);
                    $user->errors = ['all' => 'Update errors, please try again'];
                    $json = json_encode($user);
                    echo $json;
                    return;
                }
            }
            // phone co loi
            $user = User::findOne(['email' => $user->getEmail()]);
            $json = json_encode($user);
            $user->errors = ['phone' => 'Please input the right phone with min of length is 8 numbers'];
            echo $json;
            return;
        }

        $this->setLayout('auth');
        return $this->render('profile', ['userP' => $userP]);
    }

    public function uploadImageAjax(Request $request, Respone $respone)
    {
        //https://stackoverflow.com/questions/17327602/can-i-pass-image-form-data-to-a-php-function-for-upload
        if (isset($_FILES['imageFile'])) {
            $error = false;
            $image = $_FILES['imageFile'];
            $code = (int)$image["error"];
            $valid = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
            $folder = 'C:\Users\BASEVN\Desktop\BaseAccount\BaseAccount\public\images\\';
            $target = $folder . $image['name'];
            //require_once(__DIR__ . '\vendor\autoload.php');

            if (!file_exists($folder)) { //neu folder ko ton tai
                @mkdir($folder, 0755, true);
            }

            if ($code !== UPLOAD_ERR_OK) {
                switch ($code) {
                    case UPLOAD_ERR_INI_SIZE:
                        $error  = 'Error ' . $code . ': The uploaded file exceeds the <a href="http://www.php.net/manual/en/ini.core.php#ini.upload-max-filesize" target="_blank" rel="nofollow"><span class="function-string">upload_max_filesize</span></a> directive in php.ini';
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $error  = 'Error ' . $code . ': The uploaded file exceeds the <span class="const-string">MAX_FILE_SIZE</span> directive that was specified in the HTML form';
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        $error  = 'Error ' . $code . ': The uploaded file was only partially uploaded';
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        $error  = 'Error ' . $code . ': No file was uploaded';
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        $error  = 'Error ' . $code . ': Missing a temporary folder';
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        $error  = 'Error ' . $code . ': Failed to write file to disk';
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        $error  = 'Error ' . $code . ': A PHP extension stopped the file upload';
                        break;
                    default:
                        $error  = 'Error ' . $code . ': Unknown upload error';
                        break;
                }
            } else {
                $iminfo = @getimagesize($image["tmp_name"]);

                if ($iminfo && is_array($iminfo)) {
                    if (isset($iminfo[2]) && in_array($iminfo[2], $valid) && is_readable($image["tmp_name"])) {
                        if (!move_uploaded_file($image["tmp_name"], $target)) {
                            $error  = "Error while moving uploaded file";
                        }
                    } else {
                        $error  = "Invalid format or image is not readable";
                    }
                } else {
                    $error  = "Only image files are allowed (jpg, gif, png)";
                }
            }
            $id = Application::$app->session->get('user');
            $user = new User;
            $user = User::findOneById(['id' => $id]);
            if (empty($error)) {
                // update into database
                $url = '../images/' . $image['name'];
                $user = $user->setImage($url);

                if ($user->upgradeImageById(['id' => $id], $user)) {
                    // upgrade anh success
                    return json_encode($user);
                }
            } else {
                $user->errors[] = $error;
                return json_encode($user);
            }
        }
    }
}
