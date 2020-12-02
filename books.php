<?php
include("api_functions.php");
include("db_connect.php");
$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
         if(!empty($_GET{"isbn"})) {
             $isbn = strval($_GET{"isbn"});
             getBook($isbn);
         } else {
             getAllBooks();
         }
         break;

    case 'POST':
        if(!empty($_GET["isbn"]) && !empty($_POST["name"]) && !empty($_POST["author"]) && !empty($_POST["release_date"])) {
            $isbn = strval($_GET{"isbn"});
            $name = strval($_POST{"name"});
            $author = strval($_POST{"author"});
            $release_date = intval($_POST["release_date"]);
            updateBook($isbn, $name, $author, $release_date);
        } else {
            if(!empty($_POST["isbn"]) && !empty($_POST["name"]) && !empty($_POST["author"]) && !empty($_POST["release_date"])) {
                $isbn = strval($_POST{"isbn"});
                $name = strval($_POST{"name"});
                $author = strval($_POST{"author"});
                $release_date = intval($_POST["release_date"]);
                addBook($isbn, $name, $author, $release_date);
            } else {
                header("HTTP/1.0 400 Incorrect Arguments");
                break;
            }
        }
        break;

    case 'DELETE':
        if(!empty($_GET{"isbn"})) {
            $isbn = strval($_GET{"isbn"});
            deleteBook($isbn);
        }
        break;

    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

?>