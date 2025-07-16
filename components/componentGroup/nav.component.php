<?php session_start(); ?>
<nav>
  <a href="/index.php">Home</a>
  <?php if (isset($_SESSION['user'])): ?>
    | Logged in as <?= htmlspecialchars($_SESSION['user']['username']) ?>
    | <a href="/logout.php">Logout</a>
  <?php else: ?>
    | <a href="/login.php">Login</a>
  <?php endif; ?>
</nav>