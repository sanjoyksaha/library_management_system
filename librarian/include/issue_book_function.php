<?php
//require_once ('../../include/connection.php');
if(isset($_POST['issue_book']))
{
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $issue_date = $_POST['issue_date'];

    $query = mysqli_query($conn, "INSERT INTO `issue_book`(`student_id`, `book_id`, `issue_date`, `return_date`) VALUES ('$student_id', '$book_id', '$issue_date', '')");

    if($query)
    {
        mysqli_query($conn, "UPDATE books SET available_quantity = available_quantity-1 WHERE id = '$book_id'");
        //header('location: ../issue_book.php');
        $success = "Book Issued Successfully.";
    }else
    {
        $error = "Something Went Wrong.";
    }
}