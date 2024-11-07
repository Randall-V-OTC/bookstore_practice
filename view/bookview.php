<?php

    // include "../model/user_db.php";
    include "../model/book_db.php";

    $books = getBooks();

?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<div class="bookContainer">
    <?php
        foreach ($books as $book) {
            $imgPath = $book['bookImgURL'];
            $bookTitle = $book['bookName'];
            $bookAuthor = $book['bookAuthor'];
            $bookPrice = $book['bookPrice'];
            $bookId = $book['bookId'];
            include "../components/book.php";
        }
    ?>
</div>