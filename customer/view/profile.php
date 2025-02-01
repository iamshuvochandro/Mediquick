<html>
<head>
    <title>PROFILE</title>
    <link rel="stylesheet" type="text/css" href="../CSS/cus.css">
</head>
<body>
    <div class="profile-container">
        <h1>Update Profile</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>User Name:</td>
                    <td><input type="text" name="username" placeholder="username" <?php echo $username ?>></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Password" <?php echo $password ?>></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" placeholder="Email" <?php echo $email ?>></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="text" name="phone" placeholder="Phone"  <?php echo $phone ?>></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address" placeholder="Address"  <?php echo $address ?>></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="dob"  <?php echo $dob ?>></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="male" <?php echo $gender ?>> Male
                        <input type="radio" name="gender" value="female"  <?php echo $gender ?>> Female
                        <input type="radio" name="gender" value="other"  <?php echo $gender ?>> Other
                    </td>
                </tr>
                <tr>
                    <td><button type="submit">Update Profile</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
