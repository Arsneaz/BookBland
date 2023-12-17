<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../public/css/auth.css">
</head>
<body>
    <form action="../config/helper/registerUser.php" method="post">
        <h1>Register to use our services</h1>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>

    <script src="../public/js/register.js"></script>
</body>
</html>
