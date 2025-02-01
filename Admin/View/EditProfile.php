<?php
include("../model/db.php");

session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$id = $_SESSION['id'];
$db = new db();
$conn = $db->openCon();

$query = "SELECT * FROM admin_reg WHERE id='$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $dob = htmlspecialchars(trim($_POST['dob']));

    $update_query = "UPDATE admin_reg SET username='$username', email='$email', dob='$dob' WHERE id='$id'";
    if (mysqli_query($conn, $update_query)) {
        echo "Profile updated successfully.";
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Profile</h1>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>
        <label for="dob">Date Of Birth:</label>
        <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($user['dob']); ?>" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>