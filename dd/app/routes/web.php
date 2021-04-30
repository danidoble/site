<?php
try {
$route = new \Klein\Klein();


$route->respond('GET', BASE_URI.'/', function ($request,$response,$service) {
    $service->render(view('app.php',false));
});

$route->respond('GET', BASE_URI.'/users', function ($request,$response,$service) {
    $service->render(view('s.php',false));
});

$route->respond('GET', BASE_URI.'/credits', function ($request,$response,$service) {
    return 'danidoble!';
});


// Examples
//$route->respond('GET', '/posts', function($request,$response,$service){});
//$route->respond('POST', '/posts', function($request,$response,$service){});
//$route->respond('PUT', '/posts/[i:id]', function($request,$response,$service){});
//$route->respond('DELETE', '/posts/[i:id]', function($request,$response,$service){});
//$route->respond('OPTIONS', null, function($request,$response,$service){});

    //echo '<pre>';var_dump($route);die();
    $route->dispatch();
}catch (Exception $e){
    echo $e->getMessage();
}

