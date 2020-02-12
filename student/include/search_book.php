<?php
require_once ('../../include/connection.php');

if($_POST['search']) {

//    $query = mysqli_query($conn, "SELECT * FROM books WHERE book_name LIKE '%" . $_POST['search'] . "%'");
//    $output = '';
//    while ($result = mysqli_fetch_assoc($query)) {
//
//        $output .= '<div class="small-box bg-seconday" style="height: 300px;">';
//        $output .= '<div class="text-center">';
/*        $output .= '<img src="../dist/images/book/' . $result["book_image"] . '?>" alt="" style="width: 200px; height: 150px;" class="img-fluid img-thumbnail mt-3">';*/
//        $output .= '</div>';
//        $output .= '<div class="text-center justify-content-center">';
//        $output .= '<p class="mt-2 mb-0">';
//        $output .= '<sapn class="font-weight-bolder text-info">Name: </sapn>' . $result["book_name"] . '</p>';
//        $output .= '<p class="mb-0">';
//        $output .= '<sapn class="font-weight-bolder text-info">Author Name:</sapn>' . $result["book_author_name"] . '</p>';
//        $output .= ' <p class="mb-0"><sapn class="font-weight-bolder text-info">Available Quantity: </sapn>
//        ' . $result["available_quantity"] . '</p>';
//        $output .= '</div>';
//        $output .= '</div>';
//
//    }
//    echo json_encode($output);
    $query = mysqli_query($conn, "SELECT * FROM books WHERE book_name LIKE '%" . $_POST['search'] . "%'");
}else{
    $query = mysqli_query($conn, "SELECT * FROM books ");
}

$output = '';

while($result = mysqli_fetch_assoc($query)){
        $output .= '<div class="small-box bg-seconday" style="height: 300px;">';
        $output .= '<div class="text-center">';
            $output .= '<img src="../dist/images/book/' . $result["book_image"] . '?>" alt="" style="width: 200px; height: 150px;" class="img-fluid img-thumbnail mt-3">';
        $output .= '</div>';
        $output .= '<div class="text-center justify-content-center">';
        $output .= '<p class="mt-2 mb-0">';
        $output .= '<sapn class="font-weight-bolder text-info">Name: </sapn>' . $result["book_name"] . '</p>';
        $output .= '<p class="mb-0">';
        $output .= '<sapn class="font-weight-bolder text-info">Author Name:</sapn>' . $result["book_author_name"] . '</p>';
        $output .= ' <p class="mb-0"><sapn class="font-weight-bolder text-info">Available Quantity: </sapn>
        ' . $result["available_quantity"] . '</p>';
        $output .= '</div>';
        $output .= '</div>';
}

echo json_encode($output);









