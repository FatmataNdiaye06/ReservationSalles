<?php

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
try {
    $dotenv->load();
} catch (\Throwable $e) {
}