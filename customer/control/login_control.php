<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if (empty($username) || empty($password)) {
        die("All fields are required!");
    }
    $db = new Db();
    $db->checklogin($username, $password);

}
?>
