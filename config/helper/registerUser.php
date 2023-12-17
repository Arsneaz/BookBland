<?php
// Include your database connection script
include __DIR__."/../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Prepare SQL statement to insert user data
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        
        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        
        // Execute the statement
        $stmt->execute();

        // Redirect to login page or display a success message
        header("Location: ../../views/login.php");
        exit();
    } catch(PDOException $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href='../../views/register.php';
              </script>";
    }
}

