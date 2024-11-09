<?php

    include "model/book_db.php";

    session_start();
    $bookId = isset($_POST['bookId']) ? $_POST['bookId'] : "";
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : "";

    // if the cookie exists, then grab it's contents and decode them as an associatve array, 
    // otherwise make it an empty array
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if ($bookId !== '' && $quantity > 0) {
        addToCart($bookId, $quantity);
    }

    if (isset($_POST['clearCartButton'])) {
        clearCart();
    }

?>

<script>
    cartTotal = 0;
</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bookstore - Books</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <?php include "view/includes/navbar.php" ?>
    <body class="min-vh-100">
        <?php include "view" . DIRECTORY_SEPARATOR . "bookview.php"; ?>
    </body>
    <?php include "view/includes/footer.php"; ?>
</html>

<script>

    // create an event listener for the add to cart button that will increase the cartTotal by one each time
    // one of the buttons is pressed
    // document.getElementById("addToCart").addEventListener('click', function (e) {

    //     // grab the passed book id
    //     const bookId = e.target.getAttribute('data-book--id');

    //     fetch('')

    // });

</script>