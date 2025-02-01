<?php
    include ("../model/db.php");
    require("../control/admin_login_control.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>MEDIQUICK</title>
</head>
<body>
    <div class="login-container">
        <fieldset>
            <h1>Admin-Login</h1>
        </fieldset>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Username" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Password" required></td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Login</button>
                        <button type="reset" class="clear">Clear</button>
                        <a href="forgot_pass.php"><button type="submit">Forgot Password</button></a>
                        <a href="reg.php"><button type="button">Registration</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>