<!DOCTYPE html>
<html>
<head>
    <title> Seller Login</title>
</head>
<body>
    <form action="../Control/S_Login_C.php" method="POST">
        <fieldset>
            <legend>Seller login</legend>
            <table>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="text" name="email">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="pass">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Login">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    
</body>
</html>