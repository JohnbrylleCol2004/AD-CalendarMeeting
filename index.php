<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__);
}

session_start();

$username = $_SESSION['user']['username'] ?? 'Guest';

ob_start();
?>
  <h2>Welcome, <?= htmlspecialchars($username) ?>!</h2>
  <p>This is your calendar dashboard.</p>

  <?php include BASE_PATH . '/components/calendar.component.php'; ?>
<?php
$pageContent = 'data://text/plain,' . urlencode(ob_get_clean());

include BASE_PATH . '/layouts/base.layout.php';
