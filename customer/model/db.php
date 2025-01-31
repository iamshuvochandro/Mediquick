<?php
class Db
{
    private $host = "localhost";
    private $dbname = "mediquick";
    private $username = "root";
    private $password = "";
    private $conn;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function insertdata($username, $email, $password, $dob, $phone, $address, $gender)
    {
        $sql = "INSERT INTO customer (username, email, password, dob, phone, address, gender) 
                VALUES ('$username', '$email', '$password', '$dob', '$phone', '$address', '$gender')";
        if ($this->conn->query($sql) === TRUE) 
        {
            echo "Registration successful!";
        } else {
            echo "Error: " . $this->conn->error;
        }
    }

    public function checklogin($username, $password)
    {
        $sql = "SELECT * FROM customer WHERE username='$username' AND password='$password'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            echo "Login successful!";
        } else {
            echo "Invalid username or password!";
        }
    }
}
?>
