<?php
include '../model/db.php';

session_start();

$email = $_POST["email"];
$password = $_POST["pass"];

$table = "seller";
$db = new db();
$con = $db->openCon();
$res = $db->findSeller($table, $email, $con);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $sellername = $row["seller_name"];
        $seller_id = $row["id"]; // Assuming the primary key column is 'id'
        if ($row["password"] == $password) {
            $_SESSION['seller_logged_in'] = true;
            $_SESSION['seller_name'] = $sellername;
            $_SESSION['email'] = $email;
            $_SESSION['seller_id'] = $seller_id; // Set seller_id in session
            header("Location: ../View/S_Index.php");
            exit();
        } else {
            echo "Invalid password";
        }
    }
} else {
    echo "Invalid email";
}
?>