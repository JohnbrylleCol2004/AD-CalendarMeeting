<?php
require_once __DIR__ . '/handlers/postgreChecker.handler.php';
require_once __DIR__ . '/handlers/mongodbChecker.handler.php';

checkPostgreSQL();
checkMongoDB();
?>