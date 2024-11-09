<?php
    
?>

<nav class="navbar navbar-expand-lg navbar-light header">
  <div class="navbar-brand text-uppercase">Bookstore</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/bookstore_practice/books.php">Books</a>
      </li>
    </ul>
    <button type="button" class="btn btn-primary mr-4 p-1" title="Shopping Cart" onclick="window.location.href='/bookstore_practice/shopping-cart.php'">
        <img class="cartIcon" src="model/images/cart.png"> <span class="badge badge-light">0</span>
    <span class="sr-only">items in cart</span>
    </button>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>