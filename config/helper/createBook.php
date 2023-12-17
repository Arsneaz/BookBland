<?php
include __DIR__."/../connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nameBook = $_POST['name'];
    $isbnBook = $_POST['isbn'];
    $publisherBook = $_POST['publisher'];
    $genreBook = $_POST["genre"];

    try {
        // Prepare an insert statement
        $statement = $conn->prepare("INSERT INTO books (title, ISBN, publisher, genre)
        VALUES (:title, :isbn, :publisher, :genre)");
        
        // Bind parameters
        $statement->bindParam(':title', $nameBook);
        $statement->bindParam(':isbn', $isbnBook);
        $statement->bindParam(':publisher', $publisherBook);
        $statement->bindParam(':genre', $genreBook);
        
        // Execute the statement
        $statement->execute();

        // Redirect to book list or display a success message
        header("Location: ../../views/listBook.php"); // Adjust the redirection as necessary
        exit();
    } catch(PDOException $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href='../../views/listBook.php';
                </script>";
    }
}
