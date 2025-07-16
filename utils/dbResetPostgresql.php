<?php
declare(strict_types=1);

// 1) Composer autoload
require_once 'vendor/autoload.php';

// 2) Composer bootstrap
require_once 'bootstrap.php';

// 3) envSetter
require_once UTILS_PATH . '/envSetter.util.php';

// Rename config for consistency with your snippet
$databases = $typeConfig;

// PostgreSQL connection variables
$host     = $databases['pgHost'];
$port     = $databases['pgPort'];
$username = $databases['pgUser'];
$password = $databases['pgPassword'];
$dbname   = $databases['pgDatabase']; // Make sure this key matches

// Connect to PostgreSQL
$dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";
$pdo = new PDO($dsn, $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

// Tables to reset and corresponding SQL model files
// 1. Load and apply schema
$tables = [
    'users' => 'database/users.model.sql',
    // Add more here if needed
];

foreach ($tables as $table => $modelPath) {
    echo "Applying schema from {$modelPath}…\n";

    $sql = file_get_contents($modelPath);
    if ($sql === false) {
        throw new RuntimeException("❌ Could not read {$modelPath}");
    } else {
        $pdo->exec($sql);
        echo "✅ Created schema for '{$table}'\n";
    }
}

// 2. Truncate tables
echo "Truncating tables…\n";
foreach (array_keys($tables) as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
    echo "✅ Truncated table '{$table}'\n";
}

echo "\n✅ PostgreSQL reset complete!\n";
