<?php
// Include your database connection file
include __DIR__.'/../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bookId = $_POST['id'];
    $nameBook = $_POST['name'];
    $isbnBook = $_POST['isbn'];
    $publisherBook = $_POST['publisher'];
    $genreBook = $_POST["genre"];

    // Prepare and execute the UPDATE query
    $updateStatement = $conn->prepare("UPDATE books SET title = :newTitle,
    ISBN = :newIsbn, publisher = :newPublisher, genre = :newGenre WHERE id = :bookId");
    $updateStatement->bindParam(":newTitle", $nameBook, PDO::PARAM_STR);
    $updateStatement->bindParam(":newIsbn", $isbnBook, PDO::PARAM_STR);
    $updateStatement->bindParam(":newPublisher", $publisherBook, PDO::PARAM_STR);
    $updateStatement->bindParam(":newGenre", $genreBook, PDO::PARAM_STR);
    $updateStatement->bindParam(":bookId", $bookId, PDO::PARAM_INT);
    $updateStatement->execute();

    // Redirect back to the profile page or any other page after updating
    header("Location: ../../views/listBook.php");
    exit;
}
