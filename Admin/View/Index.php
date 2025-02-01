<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../View/admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
</head>
<body>
<div class="header">
  <h1>MediQuick</h1>
</div>

<div class="topnav">
    <a href="../View/Dashborad.php">Dashboard</a>
    <a href="../View/Feedback.php">Feedback</a>
    <a href="../View/Support.php">Provide Support</a>
    <a href="../View/About.php">About</a>
</div>

<p>You are logged in as <strong><a href="../View/Profile.php"><?php echo htmlspecialchars($_SESSION['name']); ?></a></strong></p>
<a href="../View/User_Management.php ">User Management</a>
<a href="../View/Logout.php">Logout</a>

<footer>
    <p>&copy; 2023 MediQuick. All rights reserved.</p>
</footer>
</body>
</html>