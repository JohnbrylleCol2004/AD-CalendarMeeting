<nav>
  <a href="/">Home</a>
  <?php if (AuthUtil::check()): ?>
    <a href="/handlers/logout.handler.php">Logout</a>
  <?php else: ?>
    <a href="/pages/Login/index.php">Login</a>
  <?php endif; ?>
</nav>