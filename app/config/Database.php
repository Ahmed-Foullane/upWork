<?php
namespace app\config;
use PDOException;
use PDO;

class Database {
    private const DSN = 'pgsql:host=localhost;port=5432;dbname=up_work'; 
    private $conn;
    private static $instance;
    
    public function __construct() {
        try {
            
            $this->conn = new PDO(self::DSN, "postgres", "12345");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
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
