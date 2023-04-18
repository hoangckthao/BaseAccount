<?php 

namespace app\core\form;

use app\core\Application;
use app\core\Model;
use app\models\User;

class LoginForm extends Model
{
    public string $email ='';
    public string $password ='';
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function login() {    
        // $userMain = new User();   
        // $userMain->setEmail($this->email) ;
        $user = User::findOne(['email' => $this->email]);
        
        if (!$user) {
           $this->addError('email', 'Email address does not exit.') ;
           return false;
        }           
        if (!password_verify($this->password, $user->password)) {                     
            $this->addError('password', 'Password is incorrect.') ;
           return false;
        }
        return Application::$app->login($user);
    }
}

?>