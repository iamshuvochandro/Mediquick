<?php
require_once '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new db();
    $conn = $db->openCon();

    if (isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['con_pass']) && isset($_POST['email']) && isset($_POST['dob']) && isset($_POST['ph']) && isset($_POST['address']) && isset($_POST['gender'])) {
        $username = htmlspecialchars(trim($_POST['username']));
        $pass = htmlspecialchars(trim($_POST['pass']));
        $con_pass = htmlspecialchars(trim($_POST['con_pass']));
        $email = htmlspecialchars(trim($_POST['email']));
        $dob = htmlspecialchars(trim($_POST['dob']));
        $ph = htmlspecialchars(trim($_POST['ph']));
        $address = htmlspecialchars(trim($_POST['address']));
        $gender = htmlspecialchars(trim($_POST['gender']));

        if ($pass !== $con_pass) {
            echo "Passwords do not match!";
            exit();
        }

        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT); // Hash the password

        $query = $conn->prepare("INSERT INTO admin_reg (username, pass, email, dob, ph, address, gender) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param("sssssss", $username, $hashed_pass, $email, $dob, $ph, $address, $gender);

        if ($query->execute() === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $query->error;
        }
    } else {
        echo "Error: Missing required fields.";
    }
}
?>