<?php
if (!defined('BASE_PATH')) define('BASE_PATH', __DIR__);

require_once BASE_PATH . '/utils/auth.util.php';

$username = AuthUtil::user()['username'] ?? 'Guest';

ob_start();
?>
  <h2>Welcome, <?= htmlspecialchars($username) ?>!</h2>
  <p>This is your calendar dashboard.</p>
  <?php include BASE_PATH . '/components/componentGroup/calendar.component.php'; ?>
<?php
$pageContent = ob_get_clean();
include BASE_PATH . '/layouts/base.layout.php';
