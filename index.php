<?php
/**
 * Start a session and check if the user has the session,
 * then redirect to the list books
 */
session_start();

if (isset($_SESSION['username'])) {
    header("Location: views/listBook.php"); // Redirect to your book list page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>BookBland</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
  </head>
  <body>
    <nav class="navbar">
      <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="views/login.php">Login</a></li>
      </ul>
    </nav>
    <section id="home" class="section home-description">
      <div class="section-content">
          <h1>Welcome to BookBland</h1>
          <p>
            Our Website is to provide all of you to make a
            List of your Favorite book here, so everyone can 
            enjoy that book anytime and anywhere
          </p>
      </div>
    </section>
    <section id="about" class="section about">
      <img src="public/uploads/book_doodle.png" height="200" width="200" alt="About Image" class="section-img" />
      <div class="section-content">
        <h2>About This Website</h2>
        <p>
          Our website is using some database to store and retrieve information
          about the book from whoever want to put their book, can either their favorite book or
          any book in general. Our mission is to provide this for everyone anytime and anywhere
        </p>
      </div>
    </section>
    <footer class="footer">
      <p>&copy; 2023 Arsyadana Estu Aziz. Teknik Informatika - 2021.</p>
    </footer>
  </body>
</html>
