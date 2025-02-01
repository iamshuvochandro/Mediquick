<?php
session_start();
require_once '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $gender = trim($_POST['gender']);


    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    }

    // Validate phone number (only numbers & length 10-15)
    if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
        die("Invalid phone number!");
    }

    // Create DB instance
    $db = new Db();
    $db->updateProfile($username, $email, $password, $dob,$phone, $address, $gender);
}
?>
