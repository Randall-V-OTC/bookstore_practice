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
        <img src="<?php echo '..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . $imgPath; ?>" alt="Book Image" title="<?= $bookTitle ?>">
    </div>

    <!-- Right Column: Book Details -->
    <div class="bookDivRight">
        <div class="bookTitle"><?php echo($bookTitle); ?></div>
        <div class="bookAuthor"><?php echo("Author:<br>" . $bookAuthor); ?></div>
        <div class="bookPrice"><?php echo("Price:<br>" . $bookPrice); ?></div>
    </div>

    <!-- Second Row: Add to Cart Button -->
    <div class="bookDivBottom">
        <form action="" method="post">
            <button class="btn btn-primary" name="submit">Add to cart</button>
            <input type="hidden" name="bookId" value="<?php echo $bookId; ?>">
        </form>
    </div>
</div>
