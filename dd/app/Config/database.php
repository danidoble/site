<?php

namespace App\Config;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

try {
// instance
    $capsule = new Capsule;

// config with the params of config (.env)
    $capsule->addConnection([
        'port' => env('DB_PORT', 3306),
        'driver' => env('DB_CONNECTION', 'mysql'),
        'host' => env('DB_HOST', 'localhost'),
        'database' => env('DB_DATABASE', 'doublesite'),
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'collation' => 'utf8_unicode_ci',
        'charset' => 'utf8',
        'prefix' => '',
    ]);

    $capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
    $capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
    $capsule->bootEloquent();
} catch (\Exception $e) {
    showError($e);
}