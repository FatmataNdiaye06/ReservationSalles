<?php

use Illuminate\Database\Capsule\Manager as Capsule;

try {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();

    $capsule = new Capsule;

    $capsule->addConnection([
        'driver'    => $_ENV['DB_DRIVER'] ?? 'mysql',
        'host'      => 'db',
        'database'  => $_ENV['DB_DATABASE'] ?? '',
        'username'  => $_ENV['DB_USERNAME'] ?? 'root',
        'password'  => $_ENV['DB_PASSWORD'] ?? '',
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix'    => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    
    $capsule->getConnection()->getPdo();
     echo "Connexion à la base de données réussie !";

} catch (\Exception $e) {
   
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}