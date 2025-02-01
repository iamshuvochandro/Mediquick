<?php
include("../model/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $db = new db();
    $conn = $db->openCon();

    $delete_query = "DELETE FROM users WHERE id='$user_id'";
    if (mysqli_query($conn, $delete_query)) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
?>