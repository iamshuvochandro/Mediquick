<?php
session_start();
include '../model/db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$db = new db();
$conn = $db->openCon();

// Query to get the number of users
$user_query = "SELECT COUNT(*) as user_count FROM users";
$user_result = $conn->query($user_query);
$user_count = $user_result->fetch_assoc()['user_count'];

// Query to get the number of feedback entries
$feedback_query = "SELECT COUNT(*) as feedback_count FROM feedback";
$feedback_result = $conn->query($feedback_query);
$feedback_count = $feedback_result->fetch_assoc()['feedback_count'];

// Query to get the number of admins
$admin_query = "SELECT COUNT(*) as admin_count FROM admin";
$admin_result = $conn->query($admin_query);
$admin_count = $admin_result->fetch_assoc()['admin_count'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <div class="dashboard">
        <div class="card">
            <h2>Total Users</h2>
            <p><?php echo $user_count; ?></p>
        </div>
        <div class="card">
            <h2>Total Feedback</h2>
            <p><?php echo $feedback_count; ?></p>
        </div>
        <div class="card">
            <h2>Total Admins</h2>
            <p><?php echo $admin_count; ?></p>
        </div>
    </div>
</body>
</html>