<?php

namespace App\Migrations;

use PDO;

class M002_some
{
    private PDO $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function up()
    {
    }

    public function down()
    {
    }
}