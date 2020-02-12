<?php

require_once "../../include/connection.php";

//delete book
//print_r($_GET['bookDelete']);
if(isset($_GET['bookDelete']))
{
	$id = base64_decode($_GET['bookDelete']);
	$data = mysqli_query($conn, "SELECT * FROM books WHERE id = '$id' ");
	while($get_img = mysqli_fetch_assoc($data))
    {
        if(file_exists('../../dist/images/book/'.$get_img['book_image']))
        {
            unlink('../../dist/images/book/'.$get_img['book_image']);
        }
    }
    $result = mysqli_query($conn, "DELETE FROM books WHERE id = '$id' ");
	if($result)
    {
        header('location: ../books_list.php');
        $success = "Data Has Been Deleted Successfully.";
    }else{
	    $error = "Something Went Wrong.";
    }

}

//delete department
if(isset($_POST['dep_id'])){
    $id = $_POST['dep_id'];
    $query = mysqli_query($conn, "DELETE FROM departments WHERE id = '$id' ");
}
