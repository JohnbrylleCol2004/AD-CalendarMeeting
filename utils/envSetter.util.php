<?php

require_once BASE_PATH . '/bootstrap.php';
require_once BASE_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

// Distribute the data using array key
$typeConfig = [
    'pgHost'     => $_ENV['PG_HOST'],
    'pgPort'     => $_ENV['PG_PORT'],
    'pgDatabase' => $_ENV['PG_DATABASE'],       // ← fixed
    'pgUser'     => $_ENV['PG_USER'],
    'pgPassword' => $_ENV['PG_PASS'],     // ← fixed
    'mongoUri'   => $_ENV['MONGO_URI'],
    'mongoDb'    => $_ENV['MONGO_DB'],
];