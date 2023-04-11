<?php 

namespace app\models;

use app\core\Application;
use app\core\Model;

class ForgotPasswordForm extends Model
{
    public string $email ='';    
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],            
        ];
    }

    public function login() {    
        // $userMain = new User();   
        // $userMain->setEmail($this->email) ;
        $user = User::findOne(['email' => $this->email]);
        
        if (!$user || $user->validate()) {
           $this->addError('email', 'Email address does not exit.') ;
           return false;
        }                   
        return Application::$app->login($user);
    }
}

?>