<?php
function verify_user_credentials(PDO $pdo, string $username, string $password): ?array{
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt ->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])){
        unset($user['password']);
        return $user;
    }
    return null;
}

function is_aunthenticated(): bool{
    return isset($_SESSION['user']);
}