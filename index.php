<?php
require_once __DIR__ . '/handlers/postgreChecker.handler.php';
require_once __DIR__ . '/handlers/mongodbChecker.handler.php';

if (function_exists('checkPostgreSQL')) {
    checkPostgreSQL();
}

if (function_exists('checkMongoDB')) {
    checkMongoDB();
}
?>