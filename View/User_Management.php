<html>
    <head>
        <title>User Management</title>
    </head>
    <body>
        <?php
        include("../model/db.php"); 
        ?>
        <h1>User Management</h1>
        <form method="post" action="">
            <input type="text" name="search" placeholder="Search users...">
            <input type="submit" value="Search">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $search = $_POST['search'];
            // Assuming you have a database connection $conn
            $query = "SELECT * FROM users WHERE username LIKE '%$search%' OR email LIKE '%$search%'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['email'] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "No results found.";
            }
        }
        ?>
    </body>
    