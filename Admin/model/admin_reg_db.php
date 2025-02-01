<?php

$host = "localhost"; 
$dbname = "mediquick"; 
$username = "root"; 
$password = ""; 

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO cus_reg (fname, lname, pass, email, dob, ph,address, gender) 
VALUES ('$fname', '$lname', '$pass', '$email', '$dob', '$ph', '$address', '$gender')";

if($conn->query($sql) === TRUE)
{
echo "Registration successful!";

} 
else 
{
echo "Error: " . $conn->error;
}
?>
