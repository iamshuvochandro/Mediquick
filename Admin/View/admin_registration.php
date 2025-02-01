<html>
<head>
    <title>MEDIQUICK - Admin Registration</title>
    <link rel="stylesheet" href="../css/admin_styles.css">
</head>
<body>
    <?php
         require_once("../model/db.php");
         require_once("../control/admin_reg_control.php");
    ?>
    <main>
        <h1>Admin Registration</h1>
        <form method="POST" action="">
            <fieldset>
                <legend>
                    <h2><b>ADMIN REGISTRATION</b></h2>
                </legend>
                <table>
                    <tr>
                        <td><label for="username"><b>Username:</b></label></td>
                        <td><input type="text" id="username" name="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="email"><b>Email:</b></label></td>
                        <td><input type="email" id="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="pass"><b>Password:</b></label></td>
                        <td><input type="password" id="pass" name="pass" required></td>
                    </tr>
                    <tr>
                        <td><label for="con_pass"><b>Confirm Password:</b></label></td>
                        <td><input type="password" id="con_pass" name="con_pass" required></td>
                    </tr>
                    <tr>
                        <td><label for="ph"><b>PHONE NUMBER</b></label></td>
                        <td><input type="text" id="ph" name="ph" pattern="[0-9]{11}" required></td>
                    </tr>
                    <tr>
                        <td><label for="address"><b>ADDRESS</b></label></td>
                        <td><textarea id="address" name="address" rows="5" cols="30" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="dob"><b>DATE OF BIRTH</b></label></td>
                        <td><input type="date" id="dob" name="dob" required></td>
                    </tr>
                    
                    
                    <tr>
                        <td><b>GENDER</b></td>
                        <td>
                            <input type="radio" id="female" name="gender" value="female" required>
                            <label for="female">FEMALE</label>
                            <br>
                            <input type="radio" id="male" name="gender" value="male" required>
                            <label for="male">MALE</label>
                            <br>
                            <input type="radio" id="other" name="gender" value="other" required>
                            <label for="other">OTHER</label>
                        </td>
                    </tr>
                </table>
                <input type="submit" class="submit" name="sub" value="SIGN UP">
            </fieldset>
        </form>
    </main>
</body>
</html>