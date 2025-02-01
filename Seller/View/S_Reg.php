<!DOCTYPE html>
<html>
<head>
    <title>Seller Registration</title>
</head>
<body>
    <h1>Seller Registration</h1>
    <form method="POST" action="../Control/S_Reg_C.php">
        <label for="seller_name">Seller Name:</label><br>
        <input type="text" id="seller_name" name="seller_name" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>