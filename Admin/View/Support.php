<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

include '../model/db.php';

$db = new db();
$conn = $db->openCon();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reply'])) {
    $ticket_id = $_POST['ticket_id'];
    $reply = htmlspecialchars(trim($_POST['reply_text']));
    $query = "UPDATE support_tickets SET reply='$reply', status='closed' WHERE S_ID='$ticket_id'";
    if ($conn->query($query) === TRUE) {
        echo "Reply submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$query = "SELECT * FROM support_tickets WHERE status='open'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Support</title>
</head>
<body>
    <h1>Support</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>User Type</th>
            <th>Email</th>
            <th>Issue</th>
            <th>Reply</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['S_ID'] . "</td>";
                echo "<td>" . $row['user_type'] . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['issue']) . "</td>";
                echo "<td>" . htmlspecialchars($row['reply']) . "</td>";
                echo "<td>
                        <form method='POST' action=''>
                            <input type='hidden' name='ticket_id' value='" . $row['S_ID'] . "'>
                            <textarea name='reply_text' rows='2' cols='30' required></textarea><br>
                            <input type='submit' name='reply' value='Submit Reply'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No open tickets</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>