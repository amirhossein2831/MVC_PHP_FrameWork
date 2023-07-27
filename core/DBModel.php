<?php

namespace App\core;

use PDO;

abstract class DBModel extends BaseModel
{
    protected abstract function DBName(): string;
    protected abstract function column(): array;

    public function save(): true
    {
        $tableName = $this->DBName();
        $attributes = $this->column();
        $param = implode(",", array_map(fn($str) => ":$str", $attributes));
        $columns = implode(",", $attributes);
        $statement = $this->getPdo()->prepare("INSERT INTO $tableName ($columns) VALUES($param);");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public function getPdo(): PDO
    {
        return Application::$app->getDataBase()->getPdo();
    }
}