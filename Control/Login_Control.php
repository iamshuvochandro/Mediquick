<?php
session_start();

$admin_username = "iamshuvochandro";
$admin_password = "222@6666";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'];
    $password = $_POST['pass'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: ../view/Index.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
}