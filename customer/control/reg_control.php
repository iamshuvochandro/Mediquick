<?php
require_once '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $email = trim($_POST['email']);
    $dob = trim($_POST['dob']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $gender = trim($_POST['gender']);

    // Validate password match
    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    // Validate required fields
    if (empty($username) || empty($password) || empty($email) || empty($dob) || empty($phone) || empty($address) || empty($gender)) {
        die("All fields are required!");
    }

    // Validate phone number
    if (!preg_match("/^[0-9]{11}$/", $phone)) {
        die("Invalid phone number!");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    }

    // Create DB object and insert data
    $db = new Db();
    $db->insertdata($username, $email, $password, $dob, $phone, $address, $gender);
}
?>
