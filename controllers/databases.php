<?php
class databases {
    private $host;
    private $user;
    private $pwd;
    private $datab;
    private $conn;

    public function __construct($host, $user, $pwd, $datab) {
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->datab = $datab;
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->pwd, $this->datab);
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function close() {
        $this->conn->close();
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function escape_string($string) {
        return $this->conn->real_escape_string($string);
    }
}
?>