<?php

use Illuminate\Database\Capsule\Manager as Capsule;

if (!class_exists('Dotenv\\Dotenv')) {
    require_once __DIR__ . '/../vendor/autoload.php';
}

function initDatabase() {
    try {
        $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
        try {
            $dotenv->safeLoad();
        } catch (\Throwable $e) {
        }

        $capsule = new Capsule;
        $options = [
            PDO::ATTR_TIMEOUT => 5,
        ];

        $sslMode = getenv('DB_SSL_MODE') ?: ($_ENV['DB_SSL_MODE'] ?? 'false');
        if (filter_var($sslMode, FILTER_VALIDATE_BOOLEAN)) {
            $sslCaPath = getenv('DB_SSL_CA') ?: ($_ENV['DB_SSL_CA'] ?? dirname(__DIR__) . '/certs/aiven-ca.pem');
            if (is_file($sslCaPath)) {
                $options[PDO::MYSQL_ATTR_SSL_CA] = $sslCaPath;
                $options[PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT] = true;
            }
        }

        $capsule->addConnection([
            'driver'    => getenv('DB_DRIVER') ?: ($_ENV['DB_DRIVER'] ?? 'mysql'),
            'host'      => getenv('DB_HOST') ?: ($_ENV['DB_HOST'] ?? 'db'),
            'database'  => getenv('DB_DATABASE') ?: ($_ENV['DB_DATABASE'] ?? ''),
            'username'  => getenv('DB_USERNAME') ?: ($_ENV['DB_USERNAME'] ?? 'root'),
            'password'  => getenv('DB_PASSWORD') ?: ($_ENV['DB_PASSWORD'] ?? ''),
            'port'      => getenv('DB_PORT') ?: ($_ENV['DB_PORT'] ?? '3306'),
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
            'options'   => $options,
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        $capsule->getConnection()->getPdo();

        return $capsule;
    } catch (\Exception $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}