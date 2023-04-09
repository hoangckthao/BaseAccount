<?php

namespace app\models;

use app\core\DbModel;
use app\core\Model;
use UserModel;

class User extends DbModel
{
    public string $id;
    public string $firstName='';
    public string $lastName='';
    public string $email;
    public string $password;
    public string $passwordConfirm;
    public string $phone;
    public string $address;
    public string $image;
    
    public function tableName(): string{
        return 'user';
    }

    public function primaryKey(): string {
        return 'id';
    }
    public function save() {        
        $password2 =  password_hash($this->password, PASSWORD_DEFAULT);
        $this->password = $password2;        
        return parent::save();        
    }    

    public function rules(): array {
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
            'phone' => [self::RULE_MIN, 'min' => 8],
            'address' => [self::RULE_MAX, 'max' => 200],
        ];
    }

    public function attributes(): array {
        return ['firstName', 'lastName','email', 'password', 'phone', 'address'];
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    public function getDisplayName() : string {
       // var_dump($this->firstName.' '.$this->lastName).PHP_EOL;
        return $this->firstName.' '.$this->lastName;
    }
}

?>