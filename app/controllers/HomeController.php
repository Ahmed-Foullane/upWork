<?php
namespace app\controllers;
use app\views\home;
class HomeController {
    public function index(){
        include_once '..\app\views\home.php';
        }
}