<?php

namespace App\core;

use App\Component\Util\Util;
use PDO;

class DataBase
{
    private PDO $pdo;

    public function __construct(array $config)
    {
        $dns = $config['dns'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new PDO($dns, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigration(): void
    {
        $this->createMigrationTable();
        $appliedMigration = $this->getAppliedMigration();

        $newMigrations = [];
        $files = scandir(Application::$ROOT . '/Migrations');
        $toApplyMigration = array_diff($files, ['.', '..', ...$appliedMigration]);

        foreach ($toApplyMigration as $migration) {
            $class = 'App\Migrations\class';
            $migrationClass = pathinfo($migration, PATHINFO_FILENAME);
            $class = str_replace('class', $migrationClass, $class);
            $instance = new $class($this->pdo);
            Util::log('Migration is Applying');
            $instance->up();
            Util::log('Migration is Applied');
            $newMigrations[] = $migration;
        }
        if (!empty($newMigrations)) {
            $this->saveMigration($newMigrations);
        } else
            Util::log('All Migration Applied');
    }

    public function createMigrationTable(): void
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(
                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                    migration VARCHAR(255),
                                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)
                                     ENGINE=INNODB;");
    }

    private function getAppliedMigration(): false|array
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    private function saveMigration(array $migrations): void
    {
        $migrations = implode(",", array_map(fn($m) => "('$m')", $migrations));
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES $migrations");
        $statement->execute();
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}