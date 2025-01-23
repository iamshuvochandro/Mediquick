<?php
require("../control/Login_Control.php");
?>
<html>
<head>
    <title>Admin Profile</title>
</head>
<link rel="stylesheet" type="text/css" href="../CSS/style.css">
<body>
    <h1><b>MediQuick</b></h1>
    <fieldset>
        <input type="file" name="img" required > 
        <h2>Admin Profile</h2>
    </fieldset>
    <form method="POST" action="../control/Login_Control.php">
        <fieldset>
            <table >
                <tr>
                    <td><b>USER NAME </b></td>
                    <td><input type="text" name="Uname" value="uname"></td>
                </tr>
                <tr>
                    <td><b>EMAIL </b></td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td><b>DATE OF BIRTH </b></td>
                    <td><input type="text" name="dob"></td>
                </tr>
                <tr>
                    <td><b>PHONE NUMBER </b></td>
                    <td><input type="text" name="ph"></td>
                </tr>
                <tr>
                    <td><b>ADDRESS </b></td>
                    <td><input type="text" name="address"></td>
                </tr>
            </table>
        </fieldset>   
    </form>
    <div>
        <button onclick="window.location.href='../view/Index.php'">Back to Home</button>
    </div>
</body>
</html>