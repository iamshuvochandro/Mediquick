<?php
session_start();

if (!isset($_SESSION['seller_logged_in']) || $_SESSION['seller_logged_in'] !== true) {
    header("Location: S_Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seller Home</title>
</head>
<body>
<div class="header">
  <h1>MediQuick Seller Dashboard</h1>
</div>

<div class="topnav">
    <a href="S_Profile.php">Profile</a>
    <a href="inventory.php">Inventory</a>
    <a href="orders.php">Orders</a>
    <a href="S_Support.php">Support</a>
</div>

<p>You are logged in as <strong><?php echo htmlspecialchars($_SESSION['seller_name']); ?></strong></p>
<a href="S_Logout.php">Logout</a>

<footer>
    <p>&copy; 2023 MediQuick. All rights reserved.</p>
</footer>
</body>
</html>