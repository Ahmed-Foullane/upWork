<?php

namespace app\Models;
use app\config\Database;
use PDO;
use app\utils\Utils;
// require_once '../app/utils/utils.php';

class AuthModel {
    private $conn;
    
    public function __construct() {
      $this->conn = Database::getInstance()->getConnection();
    }

    public function loginUser($email, $password) {
        $email = Utils::sanitize($email);
        $password = Utils::sanitize($password);

        $user = $this->login($email, $password);
        if ($user) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            Utils::redirect('home');
        } else {
            Utils::setFlash('login_error', 'Invalid email or password!');
            Utils::redirect('login');
        }
    }

    public function logoutUser() {
        unset($_SESSION['user']);
        Utils::redirect('home');
    }

    public function register(string $role, string $name, string $email, string $password): bool {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO Users (role, name, email, password) VALUES (:role, :name, :email, :password)';
        $stmt = $this->conn->prepare($sql); 
        try {
            $stmt->execute([
                'role' => $role,
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Registration failed: " . $e->getMessage());
            return false;
        }
    }

    public function login($email, $password) {
        $sql = 'SELECT * FROM Users WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) { 
            return $user;
        } else {
            return false;
        }
    }

    public function getUserByEmail(string $email) {
        $sql = 'SELECT * FROM Users WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
}
