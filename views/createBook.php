<?php
    session_start();

    // Check if the user is not logged in, redirect to login page
    if (!isset($_SESSION['username'])) {
      header("Location: ../index.php"); // Redirect to your login page
      exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Book Description</title>
    <link rel="stylesheet" href="../public/css/create.css">
</head>
<body>
    <form action="../config/helper/createBook.php" method="post">
        <h2>Insert new Book Description</h2>
        <label for="name">Book Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" required>

        <label for="publisher">Publisher:</label>
        <input type="text" id="publisher" name="publisher" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
