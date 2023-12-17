<?php
    session_start();

    // Check if the user is not logged in, redirect to login page
    if (!isset($_SESSION['username'])) {
      header("Location: ../index.php"); // Redirect to your login page
      exit();
    }

    include __DIR__.'/../config/connection.php';

    // Fetch the current user's data for pre-filling the form
    $bookId = $_GET['id'];
    $query = "SELECT * FROM books WHERE id = :id";
    $selectStatement = $conn->prepare($query);
    $selectStatement->bindParam(":id", $bookId);
    $selectStatement->execute();
    $bookData = $selectStatement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book Description</title>
    <link rel="stylesheet" href="../public/css/create.css">
</head>
<body>

<form action="../config/helper/updateBook.php" method="post">
        <h2>Update Book Description</h2>
        <label for="name">Book Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $bookData["title"];?>" required>

        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" value="<?php echo $bookData["ISBN"];?>" required>

        <label for="publisher">Publisher:</label>
        <input type="text" id="publisher" name="publisher" value="<?php echo $bookData["publisher"];?>" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value=<?php echo $bookData["genre"];?> required>

        <input type="hidden" name="id" value="<?php echo $bookData["id"]?>">

        <button type="submit">Submit</button>
    </form>
</body>
</html>
