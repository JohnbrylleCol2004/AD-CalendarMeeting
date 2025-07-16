<?php
// 1. Set up BASE_PATH if not already set
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

// 2. Optional: load session and shared logic
session_start();

// 3. Include components
include BASE_PATH . '/components/header.component.php';
include BASE_PATH . '/components/nav.component.php';
include BASE_PATH . '/components/flash.component.php';

// 4. Inject page-specific content
if (isset($pageContent)) {
    include $pageContent;
}

// 5. Footer
include BASE_PATH . '/components/footer.component.php';