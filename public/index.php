<?php
require '../vendor/autoload.php';
define("APP_URL","http://localhost:8080");

// function dd($data){
//     var_dump($data);
//     die;
// }
use app\routers\Routes;
new Routes();



