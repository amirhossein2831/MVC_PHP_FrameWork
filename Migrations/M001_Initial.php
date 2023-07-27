<?php

namespace App\Migrations;

use App\Component\Interface\Migration;
use PDO;

class M001_Initial implements Migration
{
    private PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function up(): void
    {
        $SQL = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstName VARCHAR(255) NOT NULL,
                lastName VARCHAR(255) NOT NULL,
                status TINYINT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=InnoDB;";
        $this->pdo->exec($SQL);
    }

    public function down(): void
    {
        $SQL = "DROP TABLE users;";

        $this->pdo->exec($SQL);
    }
}