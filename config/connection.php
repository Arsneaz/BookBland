<?php
$host = 'localhost';
$username = 'root';
$password = '';
$port = 3307; # Default using 3306, but since the port 3306 is used for something else,I set up the port to 3307
/*
* Creating a connection for the web to access the database and
* Making a new database and tables if they're not exists.
*/
try {
    $conn = new PDO("mysql:host=$host; port=$port;", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Database name to be created
    $dbname = 'BookBlend';

    // Create the database if doesn't exist
    $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");

    // Switch to the newly created or existed database
    $conn->exec("USE $dbname");

    // Define the books table schema
    $bookTableQuary = "
        CREATE TABLE IF NOT EXISTS books (
            id INT(11) PRIMARY KEY AUTO_INCREMENT,
            title VARCHAR(255) NOT NULL,
            ISBN VARCHAR(13) NOT NULL,
            publisher VARCHAR(255) NOT NULL,
            genre VARCHAR(255) NOT NULL
        )
    ";

    $conn->exec($bookTableQuary);

    $userTableQuery = "
    CREATE TABLE IF NOT EXISTS users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
        )
    ";

    $conn->exec($userTableQuery);

} catch(PDOException $e) {
    echo "Connection error: " . $e->getMessage();
}
