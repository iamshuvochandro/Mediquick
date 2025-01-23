<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); 
    exit();
}
?>

<html>
<head>
    <title>Admin Home</title>
</head>

<body>
<link rel="stylesheet" type="text/css" href="../CSS/Index.css">
<div class="header">
  <h1>MediQuick</h1>
</div>

<div class="topnav">
    <a href="Dashboard.php">Dashboard</a>
    <a href="Feedback.php">Feedback</a>
    <a href="About.php">About</a>
</div>

    <p>You are logged in as <strong><a href="profile.php">iamshuvochandro.</a></strong></p>
    <a href="User_Management.php">User Management</a>
    <a href="Login.php">Logout</a>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> MediQuick. All Rights Reserved.</p>
    </footer>
    
</body>
    
</html>