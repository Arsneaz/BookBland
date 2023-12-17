<?php
include __DIR__.'/../connection.php';

// Include your database connection file
if (isset($_GET['id'])) {
    // Get the student ID to be deleted
    $bookId = $_GET['id'];

    // Prepare and execute the DELETE query
    $deleteStatement = $conn->prepare("DELETE FROM books WHERE id = :bookId");
    $deleteStatement->bindParam(":bookId", $bookId, PDO::PARAM_INT);
    $deleteStatement->execute();

    // Redirect back to index.php after deletion
    header("Location: ../../views/listBook.php");
    exit;
} else {
    echo "Invalid request.";
}
