<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

require_once BASE_PATH . '/utils/auth.util.php';

if (session_status() === PHP_SESSION_NONE) session_start();

include BASE_PATH . '/components/componentGroup/header.component.php';
include BASE_PATH . '/components/componentGroup/nav.component.php';
include BASE_PATH . '/components/componentGroup/flash.component.php';

echo $pageContent;

include BASE_PATH . '/components/componentGroup/footer.component.php';