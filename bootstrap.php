<?php
define('BASE_PATH', realpath(__DIR__));
define('HANDLERS_PATH', realpath(BASE_PATH . "/handlers"));
define('UTILS_PATH', realpath(BASE_PATH . "/utils"));
define('DUMMIES_PATH', BASE_PATH . '/staticDatas/dummies');
define('STATICDATA_PATH', BASE_PATH . '/staticDatas');
chdir(BASE_PATH);
