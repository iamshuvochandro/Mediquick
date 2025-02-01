<html>
<head>
    <title>MediQuick</title>
    <link rel="stylesheet" type="text/css" href="../CSS/cus.css">
</head>
<body>
    <?php
        require "../model/db.php";
        require "../control/reg_control.php";
        ?>
    <h1>Registration</h1>
    <link rel="stylesheet" type="text/css" href="../CSS/cus.css">
    <form method="POST" action="" >
        <link rel="stylesheet" type="text/css" href="../CSS/cus.css">
        <table>
            <link rel="stylesheet" type="text/css" href="../CSS/cus.css">
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" id="username" name="username" required></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td><label for="confirm_password">Confirm Password:</label></td>
                <td><input type="password" id="confirm_password" name="confirm_password" required></td>
            </tr>
            <tr>
                <td><label for="phone">Phone Number:</label></td>
                <td><input type="tel" id="phone" name="phone" required></td>
            </tr>
            <tr>
                <td><label for="address">Address:</label></td>
                <td><input type="text" id="address" name="address" required></td>
            </tr>
            <tr>
                <td><label for="dob">Date of Birth:</label></td>
                <td><input type="date" id="dob" name="dob" required></td>
            </tr>
            <tr>
                <td><label for="gender">Gender:</label></td>
                <td>
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other">Other</label>
                </td>
            </tr>
            <tr>
                <td>
                <input type="submit" name="submit" value="Register">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>