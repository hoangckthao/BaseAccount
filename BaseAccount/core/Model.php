<?php

namespace app\core;
use app\models\User;

abstract class Model
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';

    public function loadData($data) {
        
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                if ($key === 'email') {
                    $user1 = User::findOneIdByEmail(['email' => $value]);
                    $id = $user1->{'id'};                    
                    $this->{'id'} = $id;
                }
                $this->{$key} = $value;
            }
        }
    }

    public array $errors = [];

    abstract public function rules(): array;
    public function validate() {
        foreach ($this->rules() as $attribute => $rules) { //each attributes correspond to some rules
            $value = $this->{$attribute};            
            foreach ($rules as $rule) {
                $ruleName = array();                
                
                if (is_array($rule)) { //array (more than 1 rule)
                    $ruleName[0] = $rule[0];                    
                }              
                else {
                    $ruleName[0] = $rule;
                }
                if ($ruleName[0]  === self::RULE_REQUIRED && !$value) {
                    $this->addErrorForRule($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName[0]  === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrorForRule($attribute, self::RULE_EMAIL);
                }
                // if (!empty($rule['min'])) {var_dump($rule['min']) ;echo $rule['min'];}
                if ($ruleName[0] === self::RULE_MIN && !empty($rule['min']) && strlen($value) < $rule['min']) {
                    // var_dump($rule['min']);
                    $this->addErrorForRule($attribute, self::RULE_MIN, $rule);
                }
                if ($ruleName[0] === self::RULE_MAX && !empty($rule['max']) && strlen($value) > $rule['max']) {
                    $this->addErrorForRule($attribute, self::RULE_MAX, $rule);
                }
                if ($ruleName[0]  === self::RULE_MATCH && !empty($rule['match']) && $value !== $this->{$rule['match']}) { // $rule['match'] is the 'password', {$rule['match']} is the attribute password
                    $this->addErrorForRule($attribute, self::RULE_MATCH, $rule);
                }
                if ($ruleName[0] === self::RULE_UNIQUE) {
                    $className = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attribute;
                    $tableName = $className::tableName();
                    $statement = Application::$app->db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :$uniqueAttr");
                    $statement->bindValue(":$uniqueAttr", $value);
                    $statement->execute();
                    $record = $statement->fetchObject();
                    if ($record) {
                        $this->addErrorForRule($attribute, self::RULE_UNIQUE, ['field' => $attribute]);
                    }
                }
            }
        }
        return empty($this->errors);
    }

    public function validatePhone() {
        foreach ($this->rules() as $attribute => $rules) { //each attributes correspond to some rules
            
            $value = $this->{$attribute};            
            foreach ($rules as $rule) {
                $ruleName = array();                
                
                if (is_array($rule)) { //array (more than 1 rule)
                    $ruleName[0] = $rule[0];                    
                }              
                else {
                    $ruleName[0] = $rule;
                }            
                
                // if (!empty($rule['min'])) {var_dump($rule['min']) ;echo $rule['min'];}
                if ($ruleName[0] === self::RULE_MIN && !empty($rule['min']) && strlen($value) < $rule['min'] && ($attribute === "phone" || $attribute === "address") ) {
                    
                    $this->addErrorForRule($attribute, self::RULE_MIN, $rule);
                }
                if ($ruleName[0] === self::RULE_MAX && !empty($rule['max']) && strlen($value) > $rule['max'] && ($attribute === "phone" || $attribute === "address")) {
                    
                    $this->addErrorForRule($attribute, self::RULE_MAX, $rule);
                }
                
            }
        }
        //var_dump($this->errors);
        return empty($this->errors);
    }

    private function addErrorForRule(string $attribute, string $rule, $params = []) {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);   
        }
        $this->errors[$attribute][] = $message;
    }

    public function addError(string $attribute, string $message) {        
        $this->errors[$attribute][] = $message;
    }

    public function errorMessages() {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be valid email address',
            self::RULE_MIN => 'Min length of this field must be {min}',
            self::RULE_MAX => 'Max length of this field must be {min}',
            self::RULE_MATCH => 'This field must be the same as {match}',
            self::RULE_UNIQUE => 'Record with this {field} already exits. ',
        ];
    }

    public function hasError($attribute) {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute) {
        return $this->errors[$attribute][0] ?? false;
    }
}
?>