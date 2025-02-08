<?php

namespace app\controllers;
use app\views\user;
use app\models\UserModel;

class UserController {
    private $userModel;
    function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index(){
        include_once '..\app\views\user.php';
        }

    public function addUser(){
        $username = $_POST["username"];
        $email = $_POST["email"];
        
        $this->userModel->setUser($username, $email);
    }

    public function getUsers(){   
       var_dump($this->userModel->getAllUsers());
    }

    public function delet(){   
       $this->userModel->deleteUser();
    }
    public function update(){   
       $this->userModel->updateUser();
    }
}