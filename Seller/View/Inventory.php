<?php
session_start();

if (!isset($_SESSION['seller_logged_in']) || $_SESSION['seller_logged_in'] !== true) {
    header("Location: S_Login.php");
    exit();
}

$seller_id = $_SESSION['seller_id'];

include '../model/db.php';
$db = new db();
$conn = $db->openCon();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_item'])) {
    $item_com = $_POST['item_com'];
    $item_name =$_POST['item_name'];
    $quantity = $_POST['quantity'];
    $price =    $_POST['price'];
    $query = "INSERT INTO inventory (seller_id, item_com, item_name, quantity, price) VALUES ('$seller_id', '$item_com', '$item_name', '$quantity', '$price')";
    if ($conn->query($query) === TRUE) {
        echo "Item added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$query = "SELECT * FROM inventory WHERE seller_id='$seller_id'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management</title>
</head>
<body>
    <h1>Inventory Management</h1>
    <form method="POST" action="">
        <label for="item_com">Item Company:</label><br>
        <input type="text" id="item_com" name="item_com" required><br><br>
        <label for="item_name">Item Name:</label><br>
        <input type="text" id="item_name" name="item_name" required><br><br>
        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" required><br><br>
        <label for="price">Price:</label><br>
        <input type="number" step="0.01" id="price" name="price" required><br><br>
        <input type="submit" name="add_item" value="Add Item">
    </form>
    <br>
    <h2>Current Inventory</h2>
    <table border="1">
        <tr>
            <th>Item Company</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['item_com']) . "</td>";
                echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No items in inventory</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="S_Index.php">Back to Home</a>
</body>
</html>