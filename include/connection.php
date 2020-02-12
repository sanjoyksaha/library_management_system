<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "library_management_system";

$conn = new mysqli($server, $username, $password, $db_name);
// mysqli_query($conn,'SET CHARACTER SET utf8');
// mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
// if(!$conn){
//    die ("Connection Failed: ". mysqli_connect_error);
// }
// else{
//    echo "Database Connected";
// }



?>