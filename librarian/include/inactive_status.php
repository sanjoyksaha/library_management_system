<?php
require_once('../../include/connection.php');

$id=base64_decode($_GET['id']);
mysqli_query($conn, "UPDATE students SET status = '0' WHERE id = '$id'");
header('location: ../all_students.php');
