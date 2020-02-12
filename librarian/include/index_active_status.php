<?php
require_once('../../include/connection.php');

$inactive_id=base64_decode($_GET['inactive_id']);
//echo $inactive_id;
mysqli_query($conn, "UPDATE students SET status = '1' WHERE id = '$inactive_id'");
header('location: ../index.php');
