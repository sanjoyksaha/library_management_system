<?php

if(isset($_POST['submit'])) {
    $book_name = $_POST['book_name'];
    $book_image = $_FILES['book_image']['name'];
    $tbook_image = $_FILES['book_image']['tmp_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_quantity = $_POST['book_quantity'];
    $available_quantity = $_POST['available_quantity'];
    $librarian_username = $_SESSION['librarian_username'];

    $image_extension = explode('.',$book_image);
    $image_end = end($image_extension);
    $image_name = md5(time().$book_image).'.'.$image_end;
    
    $result = mysqli_query($conn, "INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_quantity`, `available_quantity`, `librarian_username`) VALUES ('$book_name', '$image_name', '$book_author_name', '$book_publication_name', '$book_purchase_date ', '$book_price', '$book_quantity', '$available_quantity', '$librarian_username')");

    if($result)
    {
        move_uploaded_file($tbook_image, '../dist/images/book/'.$image_name);
        $success = "Book Added Successfully.";
    }else
    {
        $error = "Something Went Wrong";
    }
}
