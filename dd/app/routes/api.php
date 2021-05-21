<?php
/**
 * All routes of API
 */

use \App\Controllers\Api;

//By default the routes of the api start with "/api" if you want change it always can do it
$_route_api = BASE_URI . '/api';

/**
 * Examples of routes, for more info see https://github.com/klein/klein.php
 *
 * $route->respond('GET', '/posts', function($request,$response,$service){});
 * $route->respond('POST', '/posts', function($request,$response,$service){});
 * $route->respond('PUT', '/posts/[i:id]', function($request,$response,$service){});
 * $route->respond('DELETE', '/posts/[i:id]', function($request,$response,$service){});
 * $route->respond('OPTIONS', null, function($request,$response,$service){});
 */

if (!isset($route)) {
    $route = new \Klein\Klein();
}

$route->with($_route_api, function () use ($route, $_route_api) {
    $route->respond('GET', '/users', function ($request, $response, $service, $app) {
        // Show all users
        $_ENV['__routing']['found'] = true;
        $AuthController = new Api\UserController($request, $response, $service, $app);
        $AuthController->index();
    });

    $route->respond('GET', '/users/[i:id]', function ($request, $response, $service, $app) {
        // Show a single user
        $_ENV['__routing']['found'] = true;
        $AuthController = new Api\UserController($request, $response, $service, $app);
        $AuthController->show();
    });


    /**
     * Not modify this, unless you dont want a 404 page error when a route is not defined
     * If route is not found before will come a 404 error
     */
    $route->respond(function ($request, $response, $service, $app) {
        if (!$_ENV['__routing']['found']) {
            abort(404, (object)['service' => $service, 'response' => $response], [
                'error' => 404,
                'errors' => [
                    'page' => 'not found',
                ]
            ]);
        }
    });
});

