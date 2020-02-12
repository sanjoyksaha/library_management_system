<?php
require_once "../../include/connection.php";
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$id'");
    $result = mysqli_fetch_assoc($query);
    echo json_encode($result);

}