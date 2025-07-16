<?php
$roles = require BASE_PATH . '/staticData/shared/roles.staticData.php';
?>

<label for="role">Role</label>
<select name="role" id="role">
  <?php foreach ($roles as $role): ?>
    <option value="<?= $role ?>"><?= ucfirst($role) ?></option>
  <?php endforeach; ?>
</select>