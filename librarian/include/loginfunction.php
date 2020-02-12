<?php
session_start();
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        //print_r($_POST);

        $result = mysqli_query($conn, "Select * From librarian Where email = '$email' or user_name = '$email'");

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if($row['password'] == $password){
                $_SESSION['admin_login'] = $email;
                $_SESSION['librarian_username'] = $row['user_name'];
                $_SESSION['librarian_id'] = $row['id'];
                header("location:index.php");
            }else{
                $error = "Invalid Password";
            }
        }else{
            $error = "Email Or User Name Invalid";
        }


    }

?>

<!--$row['password'] == $password-->