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
    if ($this->conn->query($sql) === TRUE) {
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

  public function forgotpassword($username, $new_password, $con_new_password)
  {
    $sql = "SELECT * FROM customer WHERE username='$username'";
    $result = $this->conn->query($sql);
    if ($result->num_rows == 1) {
      if ($new_password !== $con_new_password) {
        die("Passwords do not match!");
      }
      $sql = "UPDATE customer SET password='$new_password' WHERE username='$username'";
      if ($this->conn->query($sql) === TRUE) {
        echo "Password changed successfully!";
      } else {
        echo "Error updating password: " . $this->conn->error;
      }
    } else {
      echo "User not found!";
    }
  }

  public function showallusers()
  {
    $sql = "SELECT * FROM customer";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["username"] . " - Email: " . $row["email"] . "<br>";
      }
    } else {
      echo "0 results";
    }
  }

  public function deleteuser($id)
  {
    $sql = "DELETE FROM customer WHERE id=$id";
    if ($this->conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $this->conn->error;
    }
  }
  public function updateProfile($username, $email, $password, $dob, $phone, $address, $gender)
  {
    $sql = "UPDATE customer SET username='$username', email='$email', password='$password', dob='$dob', phone='$phone', address='$address',gender='$gender' WHERE username='$username'";
    if ($this->conn->query($sql) === TRUE) {
      echo "Profile updated successfully!";
    } else {
      echo "Error updating profile: " . $this->conn->error;
    }
  }
}
?>