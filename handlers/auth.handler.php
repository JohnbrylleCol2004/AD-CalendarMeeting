<?php
require_once 'bootstrap.php';
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/auth.util.php';

session_start();

$pdo = new PDO("pgsql:host={$typeConfig['pgHost']};port={$typeConfig['pgPort']};dbname={$typeConfig['pgDatabase']}",
    $typeConfig['pgUser'], $typeConfig['pgPassword'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = verify_user_credentials($pdo, $username, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: /index.php');
        exit;
    } else {
        $_SESSION['error'] = 'Invalid login credentials';
        header('Location: /login.php');
        exit;
    }
}