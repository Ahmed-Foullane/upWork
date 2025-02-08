<?php
namespace app\Models;
use app\config\Database;
use PDO;

class DynamicCrud {
    protected $conn;
    protected $table;

    public function __construct($table) {
        $this->table = $table;
        $this->conn = Database::getInstance()->getConnection();
    }
    public function read($className){ 
        $query = 'SELECT *' . ' FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, $className);
        return $results;
    }

    public function create($column) {
        $columns = array_keys($column);
        $col_value = implode(", :", $columns);
        $col_prepare = implode(", ", $columns);
        $query = 'INSERT INTO ' . $this->table . ' (' . $col_prepare . ') VALUES (:' . $col_value . ')';
        var_dump ($column);
        die;
        $result->execute($column);
        $result = $this->conn->prepare($query);
        
    }

    public function update($column) {
        $columns = array_keys($column);
        $query_array = [];
        foreach ($column as $key => $value) {
            if ($key == 'id') {
                $query_array_id = $key . ' = :' . $key;
            } else {
                $query_array[] = $key . ' = :' . $key;
            }
        }
        $query = 'UPDATE ' . $this->table . ' SET ' . implode(", ", $query_array) . ' WHERE ' . $query_array_id;
        $result = $this->conn->prepare($query);
        $result->execute($column);
        return $result;
    }

    public function delete($column) {
        $columns = array_keys($column);
        $col_set = implode(",", $columns);
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $col_set . ' = :' . $col_set;
        $result = $this->conn->prepare($query);
        $result->execute($column);
        return $result;
    }

    public function findBy($column, $className) {
        $columns = array_keys($column);
        $col_set = implode(",", $columns);
        $query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $col_set . ' = :' . $col_set;
        $result = $this->conn->prepare($query);
        $result->execute($column);

        return $result->fetchAll(PDO::FETCH_CLASS, $className);
    }
}