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

    public function findSeller($table, $email, $conn) {
        $sql = "SELECT * FROM $table WHERE email='$email'";
        return $conn->query($sql);
    }

    public function sellerInsert($table, $seller_name, $email, $password, $conn) {
        $sql = "INSERT INTO $table (seller_name, email, password) VALUES ('$seller_name', '$email', '$password')";
        return $conn->query($sql);
    }
}
?>
