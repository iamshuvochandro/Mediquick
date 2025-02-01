<?php
session_start();
include '../model/db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../View/login.php");
    exit();
}

$mail = $_SESSION["name"];
$table = "admin_reg";

$db1 = new db();
$con = $db1->openCon();
$result1 = $con->prepare("SELECT username, email FROM $table WHERE email = ?");
$result1->bind_param("s", $email);
$result1->execute();
$result1->store_result();
$result1->bind_result($username, $email);
$result1->fetch();

if ($result1->num_rows == 1) {
    $result1->fetch();
} else {
    echo "User not found.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = htmlspecialchars(trim($_POST['username']));
    $new_email = htmlspecialchars(trim($_POST['email']));
    $new_password = password_hash(htmlspecialchars(trim($_POST['password'])), PASSWORD_DEFAULT);

    $update_query = $con->prepare("UPDATE $table SET username=?, email=?, pass=? WHERE email=?");
    $update_query->bind_param("ssss", $new_username, $new_email, $new_password, $mail);
    if ($update_query->execute() === TRUE) {
        echo "Profile updated successfully.";
        $_SESSION["name"] = $new_email; // Update session email if changed
    } else {
        echo "Error updating profile: " . $con->error;
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
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Update Profile">
    </form>
</body>
</html>