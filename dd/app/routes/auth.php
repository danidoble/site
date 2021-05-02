<?php
/**
 * All routes of API
 */

use \App\Controllers\Web;

if (!isset($route)) {
    $route = new \Klein\Klein();
}

/**
 * Register user view
 */
$route->respond('GET', BASE_URI . '/register', function ($request, $response, $service, $app) {
    isLogged($response, $service);
    $_ENV['__routing']['found'] = true;
    $AuthController = new Web\AuthController($request, $response, $service, $app);
    $AuthController->register();
});
/**
 * Register user
 */
$route->respond('POST', BASE_URI . '/register', function ($request, $response, $service, $app) {
    isLogged($response, $service);
    $_ENV['__routing']['found'] = true;
    $AuthController = new Web\AuthController($request, $response, $service, $app);
    $AuthController->store();
});

/**
 * Login view
 */
$route->respond('GET', BASE_URI . '/login', function ($request, $response, $service, $app) {
    isLogged($response, $service);
    $_ENV['__routing']['found'] = true;
    $AuthController = new Web\AuthController($request, $response, $service, $app);
    $AuthController->show();
});

/**
 * Login
 */
$route->respond('POST', BASE_URI . '/login', function ($request, $response, $service, $app) {
    isLogged($response, $service);
    $_ENV['__routing']['found'] = true;
    $AuthController = new Web\AuthController($request, $response, $service, $app);
    $AuthController->login();
});

/**
 * Logout
 */
$route->respond('POST', BASE_URI . '/logout', function ($request, $response, $service, $app) {
    isNotLogged($response, $service);
    $_ENV['__routing']['found'] = true;
    $AuthController = new Web\AuthController($request, $response, $service, $app);
    $AuthController->logout();
});

/**
 * Forgot password view
 */
$route->respond('GET', BASE_URI . '/forgot-password', function ($request, $response, $service, $app) {
    isLogged($response, $service);
    $_ENV['__routing']['found'] = true;
    $AuthController = new Web\AuthController($request, $response, $service, $app);
    $AuthController->recovery();
});

/**
 * Forgot password
 */
$route->respond('POST', BASE_URI . '/forgot-password', function ($request, $response, $service, $app) {
    isLogged($response, $service);
    $_ENV['__routing']['found'] = true;
    $AuthController = new Web\AuthController($request, $response, $service, $app);
    $AuthController->update();
});