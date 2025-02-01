<?php
include '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging statements
    echo "Form submitted.<br>";
    echo "POST data: ";
    print_r($_POST);

    $seller_name = isset($_POST['seller_name']) ? $_POST['seller_name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null; // Hash the password

    if ($seller_name && $email && $password) {
        $table = "seller";
        $db = new db();
        $con = $db->openCon();

        // Check if the email already exists
        $res = $db->findSeller($table, $email, $con);
        if ($res->num_rows > 0) {
            echo "Error: Email already exists.";
        } else {
            if ($db->sellerInsert($table, $seller_name, $email, $password, $con)) {
                echo "Seller registered successfully.";
                header("Location: ../View/S_Login.php"); // Redirect to login page
                exit();
            } else {
                echo "Error registering seller: " . $con->error;
            }
        }
        $con->close();
    } else {
        echo "Error: Missing form data.";
    }
}
?>