<?php
require_once '../../bootstrap.php';
require_once UTILS_PATH . '/auth.util.php';

AuthUtil::init();
$user = AuthUtil::user();
?>

<h2>Welcome, <?= htmlspecialchars($user['username'] ?? 'Guest') ?>!</h2>

<p>This is your calendar dashboard.</p>

<a href="/handlers/logout.handler.php">Logout</a>