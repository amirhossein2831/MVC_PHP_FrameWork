<?php

namespace App\core\db;

use App\core\Application;
use App\core\BaseModel;
use PDO;

abstract class DBModel extends BaseModel
{
    protected abstract function DBName(): string;
    protected abstract function column(): array;
    protected abstract function labels(): array;

    public function save(): bool
    {
        $tableName = $this->DBName();
        $attributes = $this->column();
        $param = implode(",", array_map(fn($str) => ":$str", $attributes));
        $columns = implode(",", $attributes);

        $SQL = "INSERT INTO $tableName ($columns) VALUES($param);";
        $statement = $this->getPdo()->prepare($SQL);
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        return $statement->execute();
    }

    public function findUserByEmail($where)
    {
        $tableName = $this->DBName();
        $email = $where['email'];
        $statement = $this->getPdo()->prepare("SELECT * FROM $tableName WHERE email='$email'");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }
    public function findUserById($where)
    {
        $tableName = $this->DBName();
        $id = $where['id'];
        $statement = $this->getPdo()->prepare("SELECT * FROM $tableName WHERE id='$id'");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public function getPdo(): PDO
    {
        return Application::$app->getDataBase()->getPdo();
    }
}