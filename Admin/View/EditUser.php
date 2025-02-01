<?php
include("../model/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $user_id = $_POST['id'];
    $db = new db();
    $conn = $db->openCon();

    $query = "SELECT * FROM customer_reg WHERE id='$user_id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (isset($_POST['update'])) {
        $username = htmlspecialchars(trim($_POST['username']));
        $email = htmlspecialchars(trim($_POST['email']));

        $update_query = "UPDATE customer_reg SET username='$username', email='$email' WHERE id='$user_id'";
        if (mysqli_query($conn, $update_query)) {
            echo "User updated successfully.";
        } else {
            echo "Error updating user: " . mysqli_error($conn);
        }
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>