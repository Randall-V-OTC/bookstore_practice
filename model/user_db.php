<?php

    // a switch statment to call the correct directory since we're calling this page from several others
    // and the directories keep throwing warnings and errors
    switch (basename($_SERVER['SCRIPT_NAME'])) {

        case "index.php": 
            include "functions/bookuser.php";
            break;
        case "bookview.php":
            include ".." . DIRECTORY_SEPARATOR . "functions/bookuser.php";
            break;
        default:
            break;

    }

    $host = "localhost";
    $db = "bookstore";
    $user = "root";
    $pass = "";
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

    function registerUser($username, $password) {

        // globalize the needed variables so they're in the scope of this function
        global $user, $pass, $dsn;

        // hash the users password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // try to open the db and instantiate a new PDO object to use for db functions
        try {
            $db = new PDO($dsn, $user, $pass);
        }
        catch (PDOException $ex) {
            echo("<script>console.log('PDOException in user_db.php: registerUser() -> $ex->getMessage.');</script>");
        }

        // initial insert query using the prepare function to help prevent sql injection
        $initQuery = $db->prepare("INSERT INTO `user` (`user_id`, `user_name`, `user_password`) 
        VALUES (NULL, ':username', ':password');");

        // bind the data values to the above query (again to help prevent sql injection attacks)
        $initQuery->bindParam(':username', $username);
        $initQuery->bindParam(':password', $hashedPassword);

        // execute the query now that everything is wrapped and protected from sql injection
        $initQuery->execute();

    }

    function userExists($username) {

        // globalize the needed variables so they're in the scope of this function
        global $user, $pass, $dsn;

        // try to open the db and instantiate a new PDO object to use for db functions
        try {
            $db = new PDO($dsn, $user, $pass);
        }
        catch (PDOException $ex) {
            echo("<script>console.log('PDOException in user_db.php: registerUser() -> $ex->getMessage.');</script>");
        }

        // initial insert query using the prepare function to help prevent sql injection
        $initQuery = $db->prepare("SELECT * FROM `user`;");
        $initQuery->execute();
        $initFetch = $initQuery->fetchAll(PDO::FETCH_ASSOC);

        foreach ($initFetch as $row) {
            if ($row['user_name'] === $username) {
                return true;
            }
        }

        return false;

    }