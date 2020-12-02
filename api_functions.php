<?php
function getAllBooks() {
    global $connect;
    $query = "SELECT * FROM books";
    $response = array();
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function getBook($isbn) {
    global $connect;
    $query = "SELECT * FROM books WHERE isbn=".$isbn." LIMIT 1";
    $response = array();
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function addBook($isbn, $name, $author, $release_date) {
    global $connect;
    $query = "INSERT INTO books(isbn, name, author, release_date) VALUES('".$isbn."', '".$name."', '".$author."', '".$release_date."')";

   if(mysqli_query($connect, $query)) {
       $response = array(
           'status' => 1,
           'status_message' => 'Book successfully added.'
       );
   } else {
       $response = array(
           'status' => 0,
           'status_message' => "Book insertion failed: ". mysqli_error($connect)
       );
   }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function updateBook($isbn, $name, $author, $release_date)
{
    global $connect;
    $query = "UPDATE books SET name='".$name."',author='".$author."', release_date='".$release_date."' WHERE isbn=".$isbn;

    if(mysqli_query($connect, $query)) {
        $response = array(
            'status' => 1,
            'status_message' => 'Book successfully updated.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => "Book update failed: ". mysqli_error($connect)
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function deleteBook($isbn) {
    global $connect;
    $query = "DELETE FROM books WHERE isbn=".$isbn;

    if(mysqli_query($connect, $query)) {
        $response = array(
            'status' => 1,
            'status_message' => 'Book successfully deleted.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => "Book delete failed: ". mysqli_error($connect)
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>