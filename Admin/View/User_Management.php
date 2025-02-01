<?php
session_start();
require_once '../model/db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$db = new db();
$conn = $db->openCon();

$search_username = '';
$result = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search_username = htmlspecialchars(trim($_POST['search_username']));
    if (!empty($search_username)) {
        $query = $conn->prepare("SELECT id, username, email FROM admin_reg WHERE username LIKE ?");
        $search_param = "%" . $search_username . "%";
        $query->bind_param("s", $search_param);
        $query->execute();
        $result = $query->get_result();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>User Management</h1>
    <form method="POST" action="">
        <input type="text" name="search_username" placeholder="Search by username" value="<?php echo htmlspecialchars($search_username); ?>">
        <input type="submit" name="search" value="Search">
        <input type="button" value="Refresh" onclick="window.location.href='User_Management.php';">
        <input type="button" value="Back" onclick="window.location.href='index.php';">
    </form>
    <?php if ($result !== null): ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>
                        <form method='POST' action='EditUs' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <input type='submit' value='Edit'>
                        </form>
                        <form method='POST' action='DeleteUser.php' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <input type='submit' value='Delete'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }
        ?>
    </table>
    <?php endif; ?>
</body>
</html>