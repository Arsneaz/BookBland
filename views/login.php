<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../public/css/auth.css">
</head>
<body>
    <form action="../config/helper/loginUser.php" method="post" onsubmit="return validateLoginForm()">
        <h1>Login to enjoy our services</h1>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a>.</p>

    <script src="../public/js/login.js"></script>
</body>
</html>
