<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dns'=>$_ENV['DB_DNS'],
        'user'=>$_ENV['DB_USER'],
        'password'=>$_ENV['DB_PASSWORD']
    ]
];
$app = new Application($config);


$app->run();

