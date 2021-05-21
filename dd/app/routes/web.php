<?php
/*
 * Created by (c)danidoble (c) 2021.
 */

use \App\Controllers\Web;

/**
 * Examples of routes, for more info see https://github.com/klein/klein.php
 *
 * $route->respond('GET', '/posts', function($request,$response,$service){});
 * $route->respond('POST', '/posts', function($request,$response,$service){});
 * $route->respond('PUT', '/posts/[i:id]', function($request,$response,$service){});
 * $route->respond('DELETE', '/posts/[i:id]', function($request,$response,$service){});
 * $route->respond('OPTIONS', null, function($request,$response,$service){});
 */
$_ENV['__routing']['found'] = false;

try {
    $route = new \Klein\Klein();

    //Api routes
    include __DIR__ . '/api.php';
    //Auth routes
    include __DIR__ . '/auth.php';

    /**
     * Home page
     */
    $route->respond('GET', BASE_URI . '/', function ($request, $response, $service, $app) {
        $_ENV['__routing']['found'] = true;
        $IndexController = new Web\IndexController($request, $response, $service, $app);
        $IndexController->index();
    });

    /**
     * List all users
     */
    $route->respond('GET', BASE_URI . '/users', function ($request, $response, $service, $app) {
        $_ENV['__routing']['found'] = true;
        $UserController = new Web\UserController($request, $response, $service, $app);
        $UserController->index();
    });

    /**
     * Show one user by id
     */
    $route->respond('GET', BASE_URI . '/users/[i:id]', function ($request, $response, $service, $app) {
        $_ENV['__routing']['found'] = true;
        $UserController = new Web\UserController($request, $response, $service, $app);
        $UserController->show();
    });


    /**
     * Not modify this, unless you dont want a 404 page error when a route is not defined
     * If route is not found before will come a 404 error
     */
    $route->respond(function ($request, $response, $service, $app) {
        if (!$_ENV['__routing']['found']) {
            abort(404, (object)['service' => $service, 'response' => $response]);
        }
    });

    $route->dispatch();
} catch (Exception $e) {
    showError($e);
}

