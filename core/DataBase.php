<?php

namespace App\core;

use PDO;

class DataBase
{
    private PDO $pdo;

    public function __construct(array $config){
        $dns = $config['dns'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        $this->pdo = new PDO($dns, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }



    public function createMigrationTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXITST migrations(
                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                    migration VARCHAR(255),
                                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)
                                    ENGINE=INNODB;");
    }

  
}