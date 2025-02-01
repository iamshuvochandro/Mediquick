<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $new_password = trim($_POST['new_password']);
    $con_new_password = trim($_POST['con_new_password']);

    if (empty($username) || empty($new_password) || empty($con_new_password)) 
    {
        die("All fields are required!");
    }

    if ($new_password !== $con_new_password) {
        die("Passwords do not match!");
    }

    if (strlen($new_password) < 6 || !preg_match('/[0-9]/', $new_password)) {
        die("Password must be at least 6 characters and include a number!");
    }
    $db = new Db();
    $db->forgotpassword($username, $new_password, $con_new_password);
}
?>
