<?php
    session_start();

    // Check if the user is not logged in, redirect to login page
    if (!isset($_SESSION['username'])) {
      header("Location: ../index.php"); // Redirect to your login page
      exit();
    }

    include __DIR__."/../config/connection.php";
    $query = "SELECT * FROM books";
    $result = $conn->query($query);

    // Default query to fetch all books
    $query = "SELECT * FROM books";
    $s = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>List Book</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/list.css">
</head>
<body>
    <nav class="navbar">
      <ul class="nav-links">
        <li><a href="createBook.php">Add a new Book</a></li>
        <li><a href="../config/helper/logoutUser.php?logout=1">Logout</a></li>
      </ul>
    </nav>

  <section class="content">
    <h3>Feel free to create, update, reset or delete the content of the book</h3>
    <p>You can create / update and delete any this book content</p>
  </section>

    <?php
        if ($result->rowCount() > 0) {

    ?>
        <table>
        <tr>
            <th>Title</th>
            <th>ISBN</th>
            <th>Publisher</th>
            <th>Genre</th>
            <th>Action</th>
        </tr>

        <?php
        // Loop through the result set and display data in a table
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['title']}</td>";
            echo "<td>{$row['ISBN']}</td>";
            echo "<td>{$row['publisher']}</td>";
            echo "<td>{$row['genre']}</td>";
            echo "<td><a href='updateBook.php?id=".$row['id']."'>
            Update Book | <a href='../config/helper/deleteBook.php?id=".$row['id']."'>Delete Book</td>";
            echo "</tr>";
        }
        ?>

    </table>
    <?php
    } else {
        // Handle case where there is no data
        echo "<p>No data available.</p>";
    }
    ?>

    <script src="public/js/index.js"></script>
    <footer class="footer">
      <p>&copy; 2023 Arsyadana Estu Aziz. Teknik Informatika - 2021.</p>
    </footer>

</body>
</html>
