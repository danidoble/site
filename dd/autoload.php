<?php
/**
 * Init all
 */

function env($index, $default = null){
    return isset($_ENV[$index]) ? $_ENV[$index] : $default;
}
function view($name,$include = true){
    if($include === false){
        return BASE_PATH.'/dd/app/views/'.$name;
    }else{
        if(file_exists(BASE_PATH.'/dd/app/views/'.$name)){
            include BASE_PATH.'/dd/app/views/'.$name;
        }else{
            trigger_error('View Not found: '.$name);
        }
    }
    return null;
}

//
define('BASE_PATH',realpath(__DIR__.'/../'));

// composer
require __DIR__ . "/vendor/autoload.php";

//config
if(!file_exists(__DIR__.'/.env')){
    if(copy(__DIR__.'/.env.example',__DIR__.'/.env')){
        chmod(__DIR__.'/.env',0777);
    }else{
        echo 'No existe el archivo de configuración';
        exit();
    }
}

try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
} catch (\Exception $e) {
    echo $e->getMessage();
    exit();
}

define('BASE_URL',env('APP_URL','https://localhost/'));
define('BASE_URI',rtrim(str_replace('https://'.$_SERVER["HTTP_HOST"],'',BASE_URL),'/'));

// config
require_once __DIR__."/app/Config/app.php";
require_once __DIR__."/app/Config/database.php";

// routes
require_once __DIR__."/app/routes/web.php";

//require_once __DIR__."/app/routes/api.php";

// models
spl_autoload_register(function ($className) {
    require_once __DIR__ . '/app/Models/' . $className . '.php';
    var_dump('wiii');
});


// controllers
spl_autoload_register(function ($className) {
    require_once __DIR__ . '/app/Controllers/' . $className . '.php';
});
