<?php
namespace app\config;
use PDOException;
use PDO;

class Database {
    private const DSN = 'mysql:host=localhost;dbname=crud';
    private $conn;
    private static $instance;
    public function __construct() {
        
        try {
            
            $this->conn = new PDO(self::DSN, "root", "");
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "error";
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn; 
    }

}

