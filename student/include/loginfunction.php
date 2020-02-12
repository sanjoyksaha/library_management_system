<?php

session_start();
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "Select * From students Where email = '$email' or user_name = '$email'");

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])){
                if($row['status'] == 1){
                    $_SESSION['student_login'] = $email;
                    $_SESSION['student_id'] = $row['id'];
                    header("location:index.php");
                }else{
                    $error = "Your Registration Confirmation Is Not Complete. Please Contact With Librarian.";
                }
            }else{
                $error = "Invalid Password";
            }
        }else{
            $error = "Email Or User Name Invalid";
        }


    }

?>