<?php
// require_once ("../include/connection.php");
if(isset($_POST['register'])){
    //print_r($_POST);
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $department = $_POST['department'];
    $roll = $_POST['roll'];
    $reg_no = $_POST['reg_no'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $phone_no = $_POST['phone_no'];

    $errors = array();
    if(empty($f_name)){
        $errors['f_name'] = "First Name Field is required";
    }
    if(empty($l_name)){
        $errors['l_name'] = "Last Name Field is required";
    }
    if(empty($department)){
        $errors['department'] = "Department Field is required";
    }
    if(empty($roll)){
        $errors['roll'] = "Roll No Field is required";
    }
    if(empty($reg_no)){
        $errors['reg_no'] = "Registration No Field is required";
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

        $email_validate = mysqli_query($conn, "SELECT * FROM students WHERE email = '$email'");
        $email_check = mysqli_num_rows($email_validate);
        if($email_check == 0){
            $username_validate = mysqli_query($conn, "SELECT * FROM students WHERE user_name = '$user_name'");
            $username_check = mysqli_num_rows($username_validate);
            if($username_check == 0)
            {
                if(strlen($user_name) >= 6){
                    if(strlen($password) >= 8){
                        $password_hash = password_hash($password, PASSWORD_DEFAULT);

                        $result = mysqli_query($conn, "INSERT INTO `students`(`f_name`, `l_name`, `department`, `roll`, `reg_no`, `email`, `user_name`, `password`, `phone_no`, `status`) VALUES ('$f_name', '$l_name', '$department','$roll','$reg_no','$email', '$user_name', '$password_hash', '$phone_no', '0')");

                        if($result){
                            $success = "Registration Successfully...";
                        }else{
                            $error = "Something Went Wrong";
                        }
                    }else{
                        $error = "Password Must Be 8 Characters Or More";
                    }
                }else{
                    $error = "User Name Must Be 6 Characters Or More.";
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