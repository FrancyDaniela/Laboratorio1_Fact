<?php

namespace App\controllers\databases;



class databaseController {
    private $conn;

    public function __construct() {
        // Conectar a la base de datos
        $this->conn = new \mysqli('host', 'user', 'password', 'database');
        
        // Verificar conexión
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function execSql($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn->close();
    }
}

?>

