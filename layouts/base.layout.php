<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}
session_start();

include BASE_PATH . '/components/header.component.php';
include BASE_PATH . '/components/nav.component.php';
include BASE_PATH . '/components/flash.component.php';


if (isset($pageContent)) {
    include $pageContent;
}

include BASE_PATH . '/components/footer.component.php';