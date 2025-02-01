<html>
<head>
    <title>MEDIQUICK</title>
    <link rel="stylesheet" href="../CSS/cus.css">
</head>
<body>
    <?php
     require "../model/db.php";  
     require "../control/forgot_control.php";
    ?>
<div>
    <h1>Forgot Password</h1>
        <form action="" method="POST">
        <p>Enter your ID or username to reset your password</p>
        <table>
        <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Username" required></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new_password" placeholder="New Password" required></td>
                </tr>
                <tr>
                    <td>Confirm New Password:</td>
                    <td><input type="password" name="con_new_password" placeholder="Confirm New Password" required></td>
                </tr>
        </table>
            <button type="submit">Change Password</button>
        </form>
        <a href="login.php"><button>Back to Login Page</button></a>
        
    </div>
</body>
</html>
