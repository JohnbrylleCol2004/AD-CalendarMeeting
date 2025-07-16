<?php
require_once '../bootstrap.php';
require_once UTILS_PATH . '/auth.util.php';

AuthUtil::logout();

header('Location: /pages/login/index.php?logout=success');
exit;