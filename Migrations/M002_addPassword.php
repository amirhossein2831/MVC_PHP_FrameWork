<?php

namespace App\Migrations;

use PDO;

class M002_addPassword
{
    private PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function up(): void
    {
        $SQL = "ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL ";
        $this->pdo->exec($SQL);
    }

    public function down(): void
    {
        $SQL = "ALTER TABLE users DROP COLUMN password;";
        $this->pdo->exec($SQL);
    }
}