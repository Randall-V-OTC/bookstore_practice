<?php
    $imgPath = isset($imgPath) ? $imgPath : "";
    $bookTitle = isset($bookTitle) ? $bookTitle : "Book Title";
    $bookAuthor = isset($bookAuthor) ? $bookAuthor : "Book Author";
    $bookPrice = isset($bookPrice) ? $bookPrice : "Book Price";
    $bookId = isset($bookId) ? $bookId : "";
?>

<div class="bookComponent">
    <!-- Left Column: Book Image -->
    <div>
        <img src="<?php echo 'model' . DIRECTORY_SEPARATOR . $imgPath; ?>" alt="Book Image" title="<?= $bookTitle ?>">
    </div>

    <!-- Right Column: Book Details -->
    <div class="bookDivRight">
        <div class="bookTitle"><?php echo($bookTitle); ?></div>
        <div class="bookAuthor"><?php echo("Author:<br>" . $bookAuthor); ?></div>
        <div class="bookPrice"><?php echo("Price:<br>$" . $bookPrice); ?></div>
    </div>

    <!-- Second Row: Add to Cart Button -->
    <div class="bookDivBottom">
        <form action="" method="post" style="margin: 1rem;">
            <span style="padding-top: 10px;">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" step="1" min="1" style="width: 55px;" value="1">
            </span>
            <button class="btn btn-primary" name="addToCart" id="addToCart">Add to cart</button>
            <input type="hidden" id="bookId" name="bookId" value="<?php echo $bookId; ?>">
        </form>
    </div>
</div>
