<?php

    //include "functions/book.php";

    //include "functions/createbooks.php";

    // test insert for later use
    // INSERT INTO `book` (`bookId`, `bookName`, `bookAuthor`, `bookPrice`) VALUES (NULL, 'Test Book', 'Randall Volkmar', '1'); 

    // update example
    // UPDATE `book` SET `bookImgURL` = 'model/images/books/HP&SS.jpg' WHERE `book`.`bookId` = 1; 

    $host = "localhost";
    $db = "bookstore";
    $user = "root";
    $pass = "";
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

    // $bookArr = [
    //     new book(1, "Harry Potter", "J.K. Rowling", 540),
    //     new book(2, "Wutherington Heights", "Unknown", 609),
    //     new book(3, "Some Other Book", "Who Knows", 123)
    // ];

    function getBooks() {

        // globalize (is that a word?) the neccessary variables
        global $dsn, $user, $pass;

        // try to create a PDO object to use to access the database else log the error
        try {
            $db = new PDO($dsn, $user, $pass);
        }
        catch (PDOException $ex) {
            echo("<script>console.log('PDOException in book_db.php: getBooks() -> $ex->getMessage.');</script>");
        }

        // prepare a query
        $initQuery = $db->prepare("SELECT * FROM book;");
        
        // execute the query
        $initQuery->execute();

        // fetch the results
        return $initQuery->fetchAll(PDO::FETCH_ASSOC);

    }