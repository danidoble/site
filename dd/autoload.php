<?php
/*
 * Created by (c)danidoble (c) 2021.
 */

session_start();

// composer
require __DIR__ . "/vendor/autoload.php";

// Constant of base directory, to get easy dir to includes
define('BASE_PATH', realpath(__DIR__ . '/../'));

// Boot application
require_once __DIR__ . '/app/boot.php';

// Constant of URL base of site
define('BASE_URL', env('APP_URL', 'https://localhost/'));
//Constant of uri of site
define('BASE_URI', rtrim(str_replace('https://' . $_SERVER["HTTP_HOST"], '', BASE_URL), '/'));

// config
require_once __DIR__ . "/app/Config/app.php";
require_once __DIR__ . "/app/Config/database.php";

//Default site "users table"
require_once __DIR__ . "/app/Config/test.php";

// routes
require_once __DIR__ . "/app/routes/web.php";

// models
spl_autoload_register(function ($className) {
    require_once __DIR__ . '/app/Models/' . $className . '.php';
});

// controllers
spl_autoload_register(function ($className) {
    require_once __DIR__ . '/app/Controllers/' . $className . '.php';
});
