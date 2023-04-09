<?php

use app\core\Application;

class m0001_initial
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE IF NOT EXISTS `user` (
            `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `firstName` text NOT NULL,
            `lastName` text NOT NULL,
            `email` text NOT NULL UNIQUE,
            `password` varchar(250) NOT NULL,
            `phone` varchar(20) DEFAULT NULL,
            `address` text DEFAULT NULL,
            `image` text DEFAULT 'https://th.bing.com/th/id/OIP.zRG7_6cFjh5TdxTbdW_SkgHaH_?pid=ImgDet&rs=1'
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE user";
        $db->pdo->exec($SQL);
    }
}


?>