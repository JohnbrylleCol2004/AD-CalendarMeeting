<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables from .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Optional safety: helper to throw if any critical env is missing
function getEnvOrFail($key) {
    if (!isset($_ENV[$key]) || trim($_ENV[$key]) === '') {
        throw new Exception("Missing required environment variable: $key");
    }
    return $_ENV[$key];
}

$typeConfig = [
    'pgHost'     => getEnvOrFail('PG_HOST'),
    'pgPort'     => getEnvOrFail('PG_PORT'),
    'pgDb'       => getEnvOrFail('PG_DB'),
    'pgUser'     => getEnvOrFail('PG_USER'),
    'pgPassword' => getEnvOrFail('PG_PASS'), // uses PG_PASS from your .env

    'mongoUri'   => getEnvOrFail('MONGO_URI'),
    'mongoDb'    => getEnvOrFail('MONGO_DB'),

    'envName'    => $_ENV['ENV_NAME'] ?? 'development',
];
