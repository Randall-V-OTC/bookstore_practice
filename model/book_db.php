<?php

    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

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

    function getBook($id) {
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
        $initQuery = $db->prepare("SELECT * FROM book WHERE book.bookId = $id");
        
        // execute the query
        $initQuery->execute();

        // fetch the results
        return $initQuery->fetch(PDO::FETCH_ASSOC);
    }

    function clearCart() {
        $_SESSION['cart'] = '';
        unset($_SESSION['cart']);
        setcookie('cart', '', time() - 3600, '/');
    }

    function removeBookFromCart($bookId, $quantity) {
        global $cart;
        if (isset($_SESSION['cart']) !== '') {
            $_SESSION['cart'][$bookId] == 0;
        }
    }

    // sets the specified bookId's quantity in the cart
    // so if if you use (1, 2) is will set the book with id = 1 to quantity = 2
    function setBookToQuantity($bookId, $quantity) {
        if ($_SESSION['cart'] !== '') {
            $_SESSION['cart'][$bookId] = $quantity;
        }
    }

    // a function to add a book to the cart using the specified quantity, which is defaulted to one if not specified
    function addToCart($bookId, $quantity = 1) {

        // grab the cart variable for use in this function
        global $cart;

        // if the book already exists in the cart, update the quantity of said book
        // otherwise if the book doesn't exist, add it to the cart
        $cart[$bookId] = isset($cart[$bookId]) ? $cart[$bookId] + $quantity : $quantity;

        if ($bookId !== '') {
            if (isset($_SESSION['cart'][$bookId])) {
                $_SESSION['cart'][$bookId] += $quantity; // add the specified quantity
            } else {
                $_SESSION['cart'][$bookId] = $quantity;
            }
        }

        setcookie('cart', json_encode($cart), time() + 3600, '/');

    }