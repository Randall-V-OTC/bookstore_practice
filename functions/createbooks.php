<?php

    include "book.php";

    $bookArr = [
        [new book(1, "Harry Potter", "J.K. Rowling", 540)],
        [new book(2, "Wutherington Heights", "Unknown", 609)],
        [new book(3, "Some Other Book", "Who Knows", 123)]
    ];

    print_r($bookArr);