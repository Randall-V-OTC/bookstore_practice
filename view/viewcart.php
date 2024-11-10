<?php
    $cartTotal = 0;
    $cartTotalQuantity = 0;
    
    // clears the cart if the clear cart button is clicked
    if (isset($_POST['clearCartButton'])) {
        clearCart();
        header("Location: " . $_SERVER['PHP_SELF']); // reload the page so the cart icon refreshes to 0
        exit; // calling exit here prevents the rest of this file from executing prior to reloading the page
    }

    if (isset($_POST['removeBookFromCart'])) {
        $remove = isset($_POST['removeFromQuantity']) ? $_POST['removeFromQuantity'] : 1;
        removeBookFromCart($_POST['bookIdRemove'], $remove);
        echo("<script>alert('here');</script>");
        echo('<script>console.log("remove book");</script>');
        header("Location: " . $_SERVER['PHP_SELF']); // reload the page so the cart icon refreshes to 0
        exit; // calling exit here prevents the rest of this file from executing prior to reloading the page
    }
?>
<div class="cartContainer">

    <div class="cartTitle text-center">
        <h1>Shopping Cart</h1>
    </div>
    <div class="cartContents">
        <?php

        if (isset($_SESSION['cart']) !== '') {

            $books = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
            
            foreach($books as $bookId => $quantity) {
                // debugging
                $book = getBook($bookId);
                $total = $book['bookPrice'] * $quantity;
                $cartTotal += $total;
                $cartTotalQuantity += $quantity;
                //print_r($book);
                if ($quantity > 0) {
                    echo("
                        <div class='cartBookContainer'>
                            <div class='cartBookDivLeft'>
                                <div class='cartBookImg'>
                                    <img src='model/$book[bookImgURL]' alt='Book Image' title='$book[bookName]'>
                                </div>
                            </div>

                            <div class='cartBookDivRight'>
                                <div class='cartBookTitle'>Title: $book[bookName]</div>
                                <div class='cartBookPrice'>Price: $book[bookPrice]</div>
                                <div class='cartBookQuantity'>Quantity: $quantity</div>
                    ");

                    if ($quantity == 1) {
                        echo("
                            <div class='cartDivRightBottom'>
                                <div class='cartBookPriceTotal'>Total: $" . number_format($total, 2) . "</div>
                                <div class='cartRemoveBook' id='cartRemoveBook' name='cartRemoveBook'>
                                    <form method='post' action=''>
                                        <button class='removeBookFromCart btn btn-secondary' id='removeBookFromCart' name='removeBookFromCart'>Remove Book</button>
                                        <input type='hidden' id='bookIdRemove' name='bookIdRemove' value='$bookId'>
                                    </form>
                                </div>
                            </div>
                        ");
                    } else {
                        echo("
                            <div class='cartDivRightBottom'>
                                <div class='cartBookPriceTotal'>Total: $" . number_format($total, 2) . "</div>
                                <div class='cartRemoveBook' id='cartRemoveBook' name='cartRemoveBook'>
                                    <form method='post' action=''>
                                        <input type='number' id='removeFromQuantity' name='removeFromQuantity' min='1' step='1' style='width: 55px;' value='1'>
                                        <button class='removeBookFromCart btn btn-secondary' id='removeBookFromCart' name='removeBookFromCart'>Remove Books</button>
                                        <input type='hidden' id='bookIdRemove' name='bookIdRemove' value='$bookId'>
                                    </form>
                                </div>
                            </div>
                        ");
                    } 
                    echo("
                            </div>
                        </div>
                    ");
                } else {
                    // allows the page to refresh properly if no books exist in the array
                    if (getTotalQuantity() === 0) {
                        clearCart();
                    }
                }
            }
        }
        if (empty($_SESSION['cart'])) {
            echo("
                <div class='cartEmptyDiv text-center'>
                    <h3>Oh no! Your cart is empty &#128549;</h3>
                    <p>Check out our <a href='books.php' title='Books'>Book</a> page to fill up your cart.</p>
                </div>
            ");
         } else {
            echo("
            <div class='cartTotalBottom text-center'>
                <h3>Cart Total</h3>
                <div class='cartTotalNumbers'>
                    <div>Quantity: " . $cartTotalQuantity . "</div>
                    <div>Total Price: $ " . number_format($cartTotal, 2) . "</div>
                </div>
            </div>
            <div class='clearCart text-center'>
                <form method='post' action=''>
                    <button id='clearCartButton' name='clearCartButton' class='btn btn-primary mb-3'>Clear Cart</button>
                </form>
            </div>
            ");
        }
        ?>
    </div>

</div>