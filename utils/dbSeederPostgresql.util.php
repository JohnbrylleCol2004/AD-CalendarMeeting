<?php
declare(strict_types=1);

// Settings requirements
require_once 'vendor/autoload.php';
require_once 'bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';

// Prepare dummy data
$users = require_once DUMMIES_PATH . '/users.staticData.php';

// Connect to PostgreSQL
$databases = $typeConfig;

$dsn = "pgsql:host={$databases['pgHost']};port={$databases['pgPort']};dbname={$databases['pgDatabase']}";
$pdo = new PDO($dsn, $databases['pgUser'], $databases['pgPassword'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

// Apply schema first
echo "Applying schema from database/users.model.sql…\n";

$sql = file_get_contents('database/users.model.sql');
if ($sql === false) {
    throw new RuntimeException("❌ Could not read database/users.model.sql");
}
$pdo->exec($sql);
echo "✅ Schema applied.\n";

// Seeding logic
echo "Seeding users…\n";
$stmt = $pdo->prepare("
    INSERT INTO users (username, role, first_name, last_name, password)
    VALUES (:username, :role, :fn, :ln, :pw)
");

foreach ($users as $u) {
    $stmt->execute([
        ':username' => $u['username'],
        ':role'     => $u['role'],
        ':fn'       => $u['first_name'],
        ':ln'       => $u['last_name'],
        ':pw'       => password_hash($u['password'], PASSWORD_DEFAULT),
    ]);
}

echo "\n✅ PostgreSQL seeding complete!\n";
