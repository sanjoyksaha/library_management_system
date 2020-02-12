<?php

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $phone_no = $_POST['phone_no'];

    $errors = array();
    if(empty($name)){
        $errors['name'] = "Name Field is required";
    }
    if(empty($email)){
        $errors['email'] = "Email Field is required";
    }
    if(empty($user_name)){
        $errors['user_name'] = "User Name Field is required";
    }
    if(empty($password)){
        $errors['password'] = "Password Field is required";
    }
    if(empty($phone_no)){
        $errors['phone_no'] = "Phone No Field is required";
    }

    //print_r ($errors);
    if(count($errors) == 0){

        $email_validate = mysqli_query($conn, "SELECT * FROM librarian WHERE email = '$email'");
        $email_check = mysqli_num_rows($email_validate);
        if($email_check == 0){
            $username_validate = mysqli_query($conn, "SELECT * FROM librarian WHERE user_name = '$user_name'");
            $username_check = mysqli_num_rows($username_validate);
            if($username_check == 0)
            {
                if(strlen($user_name) >= 4){
                    if(strlen($password) >= 5){
//                        $password_hash = password_hash($password, PASSWORD_DEFAULT);

                        $result = mysqli_query($conn, "INSERT INTO `librarian`(`name`, `email`, `user_name`, `password`, `phone_no`) VALUES ('$name', '$email', '$user_name', '$password', '$phone_no')");

                        if($result){
                            $success = "Registration Successfully...";
                        }else{
                            $error = "Something Went Wrong";
                        }
                    }else{
                        $error = "Password Must Be 5 Characters Or More";
                    }
                }else{
                    $error = "User Name Must Be 4 Characters Or More.";
                }
            }
            else{
                $error = "This User Name Already Exists. Try Another One..";
            }
        }else{
            $error = "This Email Already Exists. Try Another One...";
        }
       
    }


}
?>