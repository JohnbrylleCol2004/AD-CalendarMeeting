<?php if (isset($_SESSION['error'])): ?>
  <div class="flash error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
  <div class="flash success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
<?php endif; ?>