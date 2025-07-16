<?php
declare(strict_types=1);

// Requirements
require_once 'vendor/autoload.php';
require_once 'bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

$databases = $typeConfig;
$dsn = "pgsql:host={$databases['pgHost']};port={$databases['pgPort']};dbname={$databases['pgDatabase']}";
$pdo = new PDO($dsn, $databases['pgUser'], $databases['pgPassword'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

// Drop existing tables
echo "Dropping old tables…\n";
foreach (['projects', 'users'] as $table) {
    $pdo->exec("DROP TABLE IF EXISTS {$table} CASCADE;");
}

// Apply schema
echo "Applying schema from database/users.model.sql…\n";
$sql = file_get_contents('database/users.model.sql');

if ($sql === false) {
    throw new RuntimeException("❌ Could not read database/users.model.sql");
} else {
    $pdo->exec($sql);
    echo "✅ Creation success from database/users.model.sql\n";
}
