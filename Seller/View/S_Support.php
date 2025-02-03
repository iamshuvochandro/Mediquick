<?php
session_start();

if (!isset($_SESSION['seller_logged_in']) || $_SESSION['seller_logged_in'] !== true) {
    header("Location: S_Login.php");
    exit();
    
}

$seller_name = $_SESSION['seller_name'];
$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_issue'])) {
    include '../model/db.php';
    $db = new db();
    $conn = $db->openCon();
    $issue = htmlspecialchars(trim($_POST['issue']));
    $query = "INSERT INTO support_tickets (user_type, email, issue) VALUES ('seller', '$email', '$issue')";
    if ($conn->query($query) === TRUE) {
        echo "Issue submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seller Support</title>
</head>
<body>
    <h1>Seller Support</h1>
    <form method="POST" action="">
        <label for="issue">Describe your issue:</label><br>
        <textarea id="issue" name="issue" rows="4" cols="50" required></textarea><br>
        <input type="submit" name="submit_issue" value="Submit Issue">
    </form>
    <br>
    <a href="S_Index.php">Back to Home</a>
</body>
</html>
