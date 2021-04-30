<?php view('layouts/app.php');?>

<?php

$arr = [
    ['name'=>'yo','pass'=>"asdasdsaas"],
    ['name'=>'tu','pass'=>"asdasdsaas"],
    ['name'=>'ellos','pass'=>"asdasdsaas"],
    ['name'=>'ustedes','pass'=>"asdasdsaas"],
];
try {
    \App\Models\User::insert($arr);
    echo '<pre>';var_dump(\App\Models\User::get());
}catch(Exception $e){
    echo $e->getMessage();
}


/*var_dump(\App\Models\User::get());die();

try {
    $user = new \App\Models\User();
    var_dump($user);die();
}catch(Exception $e){
    $e->getMessage();
}*/
?>

<?php view('layouts/end_app.php');?>