<?php
/*
 * Created by (c)danidoble (c) 2021.
 */

/**
 * Validation of configuration files
 * .env - .env.example
 */

// if doesn't exist file .env
use JetBrains\PhpStorm\NoReturn;

if (!file_exists(BASE_PATH . '/dd/.env')) {
    // copy file '.env.example' to '.env'
    if (file_exists(BASE_PATH . '/dd/.env.example')) {
        if (copy(BASE_PATH . '/dd/.env.example', BASE_PATH . '/dd/.env')) {
            chmod(BASE_PATH . '/dd/.env', 0777);
        } else {
            print_r(__("Please copy the file '.env.example' to '.env'"));
            exit();
        }
    } else {
        print_r(__("The configuration files doesn't exist, please make one called '.env' or copy the '.env.example' of github.com/danidoble/site"));
        exit();
    }
}

/**
 * Load the configuration to super global $_ENV
 */
try {
    $dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH . '/dd');
    $dotenv->load();
} catch (\Exception $e) {
    showError($e);
}


/**
 * Load lang translation
 */
try {
    define('__dd_lang', json_decode(file_get_contents(BASE_PATH . '/dd/app/Lang/' . env('APP_LANG', 'en') . '.json'), true));
} catch (Exception $e) {
    showError($e);
}

/**
 * @param string $key
 * @return string
 */
function __(string $key = ""): string
{
    return !isset(__dd_lang[$key]) ? $key : __dd_lang[$key];
}

/**
 * @param $name
 * @param bool $include
 * @param null $_th
 * @return string|null
 */
function view($name, bool $include = true, $_th = null): ?string
{
    $path = BASE_PATH . '/dd/app/views/' . $name;
    if ($include === false) {
        return $path;
    } else {
        if (file_exists($path)) {
            include $path;
        } else {
            echo(__('View Not Found') . ': ' . $name);
            exit();
        }
    }
    return null;
}

/**
 * @param $no
 * @param $request
 */
function abort($no, $request): void
{
    $view = view('errors/' . $no . '.php', false);
    if (file_exists($view)) {
        $request->service->render($view);
    } else {
        echo(__('View Not Found') . ': errors/' . $no . '.php');
    }
    $request->response->code($no);
    $request->response->sendHeaders(true);
    exit();
}

/**
 * @param $date
 * @return string
 */
function diffForHumans($date): string
{
    $dia = explode("-", $date, 3);
    $year = $dia[0];
    $month = (string)(int)$dia[1];
    $day = (string)(int)$dia[2];

    $dias = array("domingo", "lunes", "martes", "mi&eacute;rcoles", "jueves", "viernes", "s&aacute;bado");
    $tomadia = $dias[intval((date("w", mktime(0, 0, 0, $month, $day, $year))))];

    $meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

    return $tomadia . ", " . $day . " de " . $meses[$month] . " de " . $year;
}

/**
 * @param $date
 * @return string
 */
function diffForHumansMonth($date): string
{
    $dia = explode("-", $date, 3);
    $month = (string)(int)$dia[1];
    $meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

    return $meses[$month];
}

/**
 * @param $date
 * @return string
 */
function diffForHumansComplete($date): string
{
    return diffForHumans($date) . ' a las ' . date('H:i', strtotime($date));
}

/**
 * @param int $lenght
 * @return string
 */
function randStr($lenght = 60): string
{
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lenght);
}

/**
 * @param null $date
 * @param false $sum
 * @param false $res
 * @param int $num
 * @return object
 */
function dateFormats($date = null, $sum = false, $res = false, $num = 0): object
{
    $time = [];
    if ($date === null) {
        $date = date('Y-m-d H:i:s');
    }
    //sumar o restar fechas, solo dias. modificar si requiere mas Ej. month,year,etc.
    if ($sum === true || $res === true) {
        if ($sum) {
            $symbol = '+';
        }
        if ($res) {
            $symbol = '-';
        }
        $dateOpe = strtotime($symbol . $num . ' day', strtotime($date));
        $date = date('Y-m-d H:i:s', $dateOpe);
    }
    $str = strtotime($date);
    $time["UTC"] = date("Y-m-d\TH:i:s.vP", $str);
    $time["UTCv2"] = date("Y-m-d\TH:i:s.vO", $str);
    $time["mysql"] = date("Y-m-d H:i:s", $str);
    $time["slashes"] = date("d/m/Y", $str);//'26/06/2020'
    $time["formatted"] = diffForHumans(date("Y-m-d H:i:s", $str));
    $time["formatted_complete"] = diffForHumansComplete(date("Y-m-d H:i:s", $str));
    $time["custom"] = (object)[
        "date" => date("Y-m-d", $str),
        "year" => date("Y", $str),
        "time" => date("H:i:s", $str),
        "month" => diffForHumansMonth(date("Y-m-d H:i:s", $str)),
    ];

    return (object)$time;
}

function showError($e){
    $err = (object)[];
    $err->code = $e->getCode();
    $err->note = __('If don\'t want \'users\' table, remove the content of').' app/Config/test.php';
    if($e->getCode() == 1049){
        $err->msg = (__('Please connect to the right database'));
        $err->details = $e->getMessage();
    }elseif($e->getCode() == '42S02'){
        $err->msg = (__('Please make a table named \'users\''));
        $err->details = $e->getMessage();
    }elseif($e->getCode() == '42S22'){
        $err->msg = (__('Please be sure of make this fields on table \'users\'').": 'id','name','password','created_at','updated_at','deleted_at'");
        $err->details = $e->getMessage();
    }else{
        $err->msg = $e->getMessage();
        $err->details = null;
    }
    include view('errors/custom.php',false);
    exit();
}

///**
// * @param $index
// * @param null $default
// * @return mixed|null
// */
//function env($index, $default = null){
//    return isset($_ENV[$index]) ? $_ENV[$index] : $default;
//}
