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
            echo("
                <div class='bookDiv text-center col'>

                    <div class='bookImg col bookDivLeft'>
                        <img src='.." . DIRECTORY_SEPARATOR . "/model/$book[bookImgURL]'>
                    </div>

                    <div class='col bookDivRight'>

                        <div class='bookTitle row text-center'>
                            $book[bookName]
                        </div>

                        <div class='bookAuthor row'>
                            $book[bookAuthor]
                        </div>

                        <div class='bookPrice row'>
                            $book[bookPrice]
                        </div>

                        <div class='bookAddToCart text-center row'>
                            <form action='' method='post'>
                                <button class='btn btn-primary' id='submit' name='submit'>Add to cart</button>
                                <input type='hidden' id='$book[bookId]' name='bookId'>
                            </form>
                        </div>

                    </div>

                </div>
            ");
        }
    ?>
</div>