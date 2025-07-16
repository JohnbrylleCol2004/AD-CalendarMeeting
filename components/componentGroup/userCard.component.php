<div class="user-card">
  <h3><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></h3>
  <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
  <p><strong>Role:</strong> <?= htmlspecialchars($user['role']) ?></p>
</div>
