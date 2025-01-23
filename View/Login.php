<html>
<head>
    <title> Admin login </title>
</head>
<link rel="stylesheet"  href="../CSS/Login.css">
<body>
    <?php
    require("../Control/Login_Control.php");
    ?>
    <h1><b><u>MEDIQUICK</u></b></h1>
    <form method="POST" action="../Control/Login_Control.php">
    <main>
            <img src="../Image/user.png">
            <legend><b>
                    <h2><b>Admin login</b></h2>
                </b></legend>
            <table>
                <tr>
                    <td><b>USER NAME </b></td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td><b>PASSWORD </b></td>
                    <td><input type="password" name="pass" required></td>
                </tr>
                <tr><br>
                    <td><input type="button" name="fsubmit" value="FORGOT PASSWORD"></td>
                    <td><input type="button" name="clear" value="CLEAR"></td>
                    <td><input type="submit" name="submit" value="LOG IN"></td>
                </tr>
            </table>
    </main>
    </form>
</body>
</html>