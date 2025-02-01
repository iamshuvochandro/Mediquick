<?php
require '../control/profile_control.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
</head>
<body>
    <form>
        <fieldset>
            <legend><h2>My Profile</h2></legend>
            <table>
                <?php
                echo '<tr>';
                echo '<td>Username :</td>';
                echo '<td>' . htmlspecialchars($username) . '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>Email :</td>';
                echo '<td>' . htmlspecialchars($email) . '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>Date Of Birth :</td>';
                echo '<td>' . htmlspecialchars($dob) . '</td>';
                echo '</tr>';
                ?>
            </table>
            <br>
            <form method="POST" action="EditProfile.php">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <input type="submit" value="Edit Profile">
            </form>
        </fieldset>
    </form>
</body>
</html>