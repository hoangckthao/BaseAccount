<?php

namespace app\core;
use app\core\Model;

abstract class DbModel extends Model
{

    abstract public function getDisplayName(): string;
    abstract public function tableName() : string;

    abstract public function attributes() : array;

    abstract public function primaryKey(): string;

    public function save() {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).") 
            VALUES(".implode(',',$params).") ");
        //var_dump($statement, $params, $attributes).PHP_EOL;
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
    }

    public static function prepare($sql) {
        return Application::$app->db->pdo->prepare($sql);
    }

    public static function findOne($where) {
        // $tableName = static::tableName();
        $attributes = array_keys($where); //return all the key of the array (email)
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes)); // SELECT * FROM $tableName WHERE email = :email
        $statement = self::prepare("SELECT * FROM user WHERE $sql");
        //var_dump($statement, $params, $attributes).PHP_EOL;
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        
        return $statement->fetchObject(static::class);
    }

    public static function findOneIdByEmail($where) {
        // $tableName = static::tableName();
        $attributes = array_keys($where); //return all the key of the array (email)
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes)); // SELECT id FROM `user` WHERE email = 'hoangckthao33@gmail.com';
        $statement = self::prepare("SELECT id FROM user WHERE $sql");
        //var_dump($statement, $params, $attributes).PHP_EOL;
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        
        return $statement->fetchObject(static::class);
    }

    public static function findOneById($where) {
        // $tableName = static::tableName();
        $attributes = array_keys($where); //return all the key of the array (email)
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes)); // SELECT * FROM `user` WHERE id = '1';
        $statement = self::prepare("SELECT * FROM user WHERE $sql");
        //var_dump($statement, $params, $attributes).PHP_EOL;
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        
        return $statement->fetchObject(static::class);
    }

    
}

?>