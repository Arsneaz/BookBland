<?php
// Include your database connection script
include __DIR__."/../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Prepare SQL statement to retrieve user by username
        $statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindParam(':username', $username);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        // Check if user exists and verify password
        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, start a new session and redirect to a secure page
            session_start();
            $_SESSION['username'] = $user['username'];
            header("Location: ../../views/listBook.php"); // Redirect to a secure page
            exit();
        } else {
            echo "<script>
                    alert('Invalid credentials, please try again');
                    window.location.href='../../views/login.php';
                  </script>";
        }
    } catch(PDOException $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href='../../views/login.php';
                </script>";
    }
}
