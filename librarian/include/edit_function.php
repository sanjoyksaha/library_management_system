<?php
require_once "../../include/connection.php";
//update book
if(isset($_POST['edit_book'])) {
    $id = $_POST['id'];
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

    //delete old image
    $data = mysqli_query($conn, "SELECT * FROM books WHERE id = '$id' ");
    while ($get_img = mysqli_fetch_assoc($data)) {
        if (file_exists('../../dist/images/book/'.$get_img['book_image'])) {
            unlink('../../dist/images/book/'.$get_img['book_image']);
        }
    }
    $result = mysqli_query($conn, "UPDATE books SET book_name ='$book_name', book_image = '$image_name', book_author_name = '$book_author_name', book_publication_name = '$book_publication_name', book_purchase_date = '$book_purchase_date', book_price = '$book_price', book_quantity = '$book_quantity', available_quantity = '$available_quantity', librarian_username = '$librarian_username' WHERE id = '$id'");

    if($result)
    {
        move_uploaded_file($tbook_image, '../../dist/images/book/'.$image_name);
        header('location:../books_list.php');
        $success = "Book Updated Successfully.";
    }else
    {
        $error = "Something Went Wrong";
    }
}

//update settings
if(isset($_POST['edit_settings'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $image = $_FILES['image']['name'];
    $t_image = $_FILES['image']['tmp_name'];

    $image_extension = explode('.',$image);
    $image_end = end($image_extension);
    $image_name = md5(time().$image).'.'.$image_end;
    //echo $id;

    $data = mysqli_query($conn, "SELECT * FROM settings WHERE id = '$id' ");
    while ($get_img = mysqli_fetch_assoc($data)) {
        if (file_exists('../../dist/images/settings/'.$get_img['image'])) {
            unlink('../../dist/images/settings/'.$get_img['image']);
        }
    }

    $result = mysqli_query($conn, "UPDATE settings SET name ='$name', email = '$email', address = '$address', phone = '$phone', image = '$image_name' WHERE id = '$id'");

    if($result)
    {
        move_uploaded_file($t_image, '../../dist/images/settings/'.$image_name);
        header('location:../settings.php');
        $success = "Settings Updated Successfully.";
    }else
    {
        $error = "Something Went Wrong";
    }
}


//update department
if(isset($_POST['id'])){
    $id= $_POST['id'];
    $dep_name = $_POST['dep_name'];
    $output = '';
    $message = '';
    $query = mysqli_query($conn, "UPDATE `departments` SET `department_name`='$dep_name' WHERE `id` = '$id'");

    if($query){
        $message = 'Department Updated Successfully.';
//        $output .= '<div class="col-md-12 alert alert-success alert-dismissible fade show msg" role="alert">
//                        <strong >'. $message .'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }

   echo $message;
}