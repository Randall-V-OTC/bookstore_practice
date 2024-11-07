<?php

    include "model/user_db.php";

    session_start();
    
    $loggedIn = false;

    $logout = filter_input(INPUT_GET, 'lo');

    if ($logout === 'y') {
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 4200, "/");
        }
        session_destroy();
    } else {

        $input_user = filter_input(INPUT_POST, 'username');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (userExists($_POST['username'])) {
                $loggedIn = true;
            } else {
                $loggedIn = false;
            }
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randall's Bookstore</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php

        if ($loggedIn) {
            echo('logged in');
        } else {

            include "view/login.php";
            include "model/book_db.php";

            print_r($bookArr);

            echo($bookArr[0]->bookName."<br>");

            foreach ($bookArr as $book) {
                echo("<br>Name: $book->bookName <br>");
            }

        }

?>
</body>
</html>