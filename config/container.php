<?php

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
try {
    $dotenv->safeLoad();
} catch (\Throwable $e) {
}
//Safeload