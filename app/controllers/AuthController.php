<?php

namespace app\controllers;

use app\models\AuthModel;
use app\utils\Utils;

// require_once '../app/utils/utils.php';

class AuthController extends AuthModel {
    private $authSystem;

    public function __construct() {
        
        // $authSystem = new AuthModel();
    }

    public function registerUser() {
        $name = $_POST['name'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password']; 

        if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
            Utils::setFlash('register_error', 'All fields are required!');
            Utils::redirect('register');
            return;
        }

        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            Utils::setFlash('register_error', 'Invalid user name');
            Utils::redirect('register');
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Utils::setFlash('register_error', 'Invalid Email');
            Utils::redirect('register');
            return;
        }

        if (strlen($password) < 8 || 
            !preg_match("/[A-Z]/", $password) || 
            !preg_match("/[a-z]/", $password) || 
            !preg_match("/[0-9]/", $password)) {
            Utils::setFlash('register_error', 'Password must contain upper and lower case letters and be more than 8 characters long');
            Utils::redirect('register');
            return;
        }

        if ($password !== $confirm_password) {
            Utils::setFlash('register_error', 'Passwords do not match!');
            Utils::redirect('register');
            return;
        }

        $user = $this->getUserByEmail($email); 

        if ($user) {
            Utils::setFlash('register_error', 'Email already exists!');
            Utils::redirect('register');
            return;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        if ($this->register($role, $name, $email, $hashed_password)) {
            Utils::setFlash('register_success', 'You are now registered and can login!');
            Utils::redirect('login');
        } else {
            Utils::setFlash('register_error', 'Registration failed. Please try again.');
            Utils::redirect('register');
        }
    }
}
