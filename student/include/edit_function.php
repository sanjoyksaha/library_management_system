<?php
require_once ('../../include/connection.php');

if(isset($_POST['edit_profile'])){
    $id = $_POST['id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $department = $_POST['department'];
    $roll = $_POST['roll'];
    $reg_no = $_POST['reg_no'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $phone = $_POST['phone_no'];
    $image = $_FILES['img']['name'];
    $t_image = $_FILES['img']['tmp_name'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $image_extension = explode('.',$image);
    $image_end = end($image_extension);
    $image_name = md5(time().$image).'.'.$image_end;
//    print_r($_POST);
//    echo $password_hash;
//    print_r($_FILES);
//    exit();

    $data = mysqli_query($conn, "SELECT * FROM students WHERE id = '$id' ");
    while ($get_img = mysqli_fetch_assoc($data)) {
        if (file_exists('../../dist/images/students/'.$get_img['img'])) {
            unlink('../../dist/images/students/'.$get_img['img']);
        }
    }

    $result = mysqli_query($conn, "UPDATE students SET f_name ='$f_name', l_name = '$l_name', department = '$department', roll = '$roll', reg_no = '$reg_no', email = '$email', user_name = '$user_name', password = '$password_hash',  phone_no = '$phone', img = '$image_name', status = '1' WHERE id = '$id'");

    if($result)
    {
        move_uploaded_file($t_image, '../../dist/images/students/'.$image_name);
        header('location:../profile.php');
        $success = "Settings Updated Successfully.";
    }else
    {
        $error = "Something Went Wrong";
    }
}
