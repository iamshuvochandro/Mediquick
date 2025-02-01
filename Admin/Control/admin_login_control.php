<?php
include '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new db();
    $conn = $db->openCon();

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = htmlspecialchars(trim($_POST['username']));
        $password = htmlspecialchars(trim($_POST['password']));

        $query = $conn->prepare("SELECT username, email, pass FROM admin_reg WHERE username = ?");
        $query->bind_param("s", $username);
        $query->execute();
        $query->store_result();
        $query->bind_result($username, $email, $hashed_pass);
        $query->fetch();

        if ($query->num_rows > 0 && password_verify($password, $hashed_pass)) {
            session_start();
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $username;
            header("Location: ../view/index.php");
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Error: Missing required fields.";
    }
}
?>