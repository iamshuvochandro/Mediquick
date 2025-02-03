<?php
session_start();
require_once '../model/db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../view/admin_login.php");
    exit();
}


$email = $_SESSION["email"];
$table = "admin_reg";

$db1 = new db();
$con = $db1->openCon();
$result1 = $con->prepare("SELECT username, email, dob FROM $table WHERE email = ?");
$result1->bind_param("s", $email);
$result1->execute();
$result1->store_result();
$result1->bind_result($username, $email, $dob);
$result1->fetch();

if ($result1->num_rows == 1) {
    $result1->fetch();
} else {
    echo "User not found.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = htmlspecialchars(trim($_POST['username']));
    $new_email = htmlspecialchars(trim($_POST['email']));
    $new_password = password_hash(htmlspecialchars(trim($_POST['password'])), PASSWORD_DEFAULT);

    $update_query = $con->prepare("UPDATE $table SET username=?, email=?, pass=? WHERE email=?");
    $update_query->bind_param("ssss", $new_username, $new_email, $new_password, $email);
    if ($update_query->execute() === TRUE) {
        echo "Profile updated successfully.";
        $_SESSION["email"] = $new_email; // Update session email if changed
    } else {
        echo "Error updating profile: " . $con->error;
    }
}
?>
