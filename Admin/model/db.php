<?php

class db {
    private $host = "localhost";
    private $dbname = "mediquick";
    private $username = "root";
    private $password = "";

    public function openCon() {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>
