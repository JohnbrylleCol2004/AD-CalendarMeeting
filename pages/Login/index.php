<?php
if (!defined('BASE_PATH')) define('BASE_PATH', dirname(dirname(__DIR__)));

ob_start();
?>

<h2>Login</h2>

<?php if (isset($_GET['error'])): ?>
  <p style="color:red"><?= htmlspecialchars($_GET['error']) ?></p>
<?php endif; ?>

<form action="/handlers/auth.handler.php" method="post">
  <label for="username">Username:</label>
  <input type="text" name="username" required><br>

  <label for="password">Password:</label>
  <input type="password" name="password" required><br>

  <button type="submit">Login</button>
</form>

<?php
$pageContent = ob_get_clean();
include BASE_PATH . '/layouts/base.layout.php';