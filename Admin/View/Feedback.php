<?php
session_start();
include '../model/db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$db = new db();
$conn = $db->openCon();

$query = "SELECT f.id, f.feedback, f.created_at, u.username FROM feedback f JOIN users u ON f.user_id = u.id ORDER BY f.created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Feedback</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Feedback from Users</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Feedback</th>
            <th>Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['feedback']) . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No feedback found</td></tr>";
        }
        ?>
    </table>
</body>
</html>