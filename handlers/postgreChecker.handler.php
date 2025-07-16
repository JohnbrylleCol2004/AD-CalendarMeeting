<?php
require_once __DIR__ . '/../bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php'; 

function checkPostgreSQL(): void {
    global $typeConfig;

    $host     = $typeConfig['pgHost'];
    $port     = $typeConfig['pgPort'];
    $dbname   = $typeConfig['pgDatabase'];
    $user     = $typeConfig['pgUser'];
    $password = $typeConfig['pgPassword'];

    $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
    $dbconn = pg_connect($conn_string);

    if (!$dbconn) {
        echo "❌ PostgreSQL Connection Failed: " . pg_last_error() . "<br>";
    } else {
        echo "✅ PostgreSQL Connection Successful<br>";
        pg_close($dbconn);
    }
}

checkPostgreSQL();  