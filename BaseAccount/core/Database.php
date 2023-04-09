<?php

namespace app\core;

use PDO;

class Database
{
    public PDO $pdo;

    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // find error

    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();


        $newMigrations = array(); // migration that new to apply changes to database
        $files = scandir(Application::$ROOT_DIR . '/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);
        foreach ($toApplyMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }
            require_once Application::$ROOT_DIR . '/migrations/' . $migration; // take the migration has not been update
            $className = pathinfo($migration, PATHINFO_FILENAME);
            //var_dump($className);
            $instance = new $className();
            $this->log("Applying migration $migration" . PHP_EOL);
            $instance->up();
            $this->log("Applied migration $migration" . PHP_EOL);
            //$instance->down();


            $newMigrations[] = $migration;
        }
        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("All migrations are applied");
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE if NOT EXISTS migrations ( 
            id INT AUTO_INCREMENT PRIMARY KEY, 
            migration varchar(255), 
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ) 
            ENGINE = INNODB;");
    }

    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);

    }

    public function saveMigrations(array $migrations)
    {
        //var_dump($migrations).PHP_EOL; // "m0001_initial.php" 
        //$migrations = array_map(fn($m) => "('$m')", $migrations);
        //var_dump($migrations).PHP_EOL; //"('m0001_initial.php')"
        $str = implode(",", array_map(fn($m) => "('$m')", $migrations));
        echo "str la: ";
        var_dump($str) . PHP_EOL;
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES $str ");
        $statement->execute();
    }

    public function prepare($sql) {
        return $this->pdo->prepare($sql);
    }

    protected function log($message)
    {
        echo '[' . date('Y-m-d H:i:s') . '] - ' . $message . PHP_EOL;
    }
}

?>