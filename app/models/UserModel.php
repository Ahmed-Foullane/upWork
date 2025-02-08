<?php
namespace app\Models;
use app\models\DynamicCrud;

class UserModel   {
    protected $crud;
    public $username;
    public $email;

    public function __construct() {
        $this->crud = new DynamicCrud("people");
    }
    public function setUser($username, $email){
        $this->crud->create(["username"=> $username, "email" => $email]);
    }

    public function getAllUsers(){
      return  $this->crud->read(UserModel::class);
    }
    public function deleteUser(){
      return  $this->crud->delete(["id" => 1]);
    }

    public function updateUser(){
        $this->crud->update(["id"=>2, "username"=> "me", "email" => "me@gmail.com"]);
    } 
}

// $user = new User('user');

// $specificUsers = $user->findBy(['id' => '1'], User::class);
// $specificUsers = $user->read(User::class);
// $user->create(["id"=>null, "username"=> "foullane", "email" => "foullane@gmail.com", "created_at" => time()]);
// $user->update(["id"=>1, "username"=> "me", "email" => "me@gmail.com"]);
// $user->delete(["id"=>4]);