<?php 
    require_once ('include/header.php'); 
    require_once ('include/sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Return Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:avoid(0)">Return Book</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $book_id = $_GET['bookid'];
        date_default_timezone_set('Asia/Dhaka');
        $date = date('d-m-Y');
        $query = mysqli_query($conn, "UPDATE issue_book SET return_date = '$date' where id = '$id';");
        if ($query) {
            mysqli_query($conn, "UPDATE books SET available_quantity = available_quantity+1 WHERE id = '$book_id'");
            ?>
                    <script type="text/javascript">
                        alert('Book Return Successfully.');
                        javascript:history.go(-1);
                    </script>

                    <?php
        } else {

            ?>
                    <script type="text/javascript">
                        alert('Something Went Wrong.');
                    </script>
                    <?php
        }

    }
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header alert alert-danger">
                        <h3 class="card-title">Return Book</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width:10%">SL</th>
                                <th style="width:10%">St. Name</th>
                                <th style="width:10%">St.Roll</th>
                                <th style="width:10%">St.Phone</th>
                                <th style="width:10%">St.Department</th>
                                <th style="width:15%">Book Name</th>
<!--                                <th style="width:10%">Book Image</th>-->
                                <th style="width:15%">Issue Date</th>
                                <th style="width:10%">Return Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = mysqli_query($conn, "SELECT issue_book.id, issue_book.book_id, issue_book.issue_date, students.f_name, students.l_name, students.roll, students.phone_no, students.department_id, books.book_name, books.book_image FROM issue_book INNER JOIN students ON students.id = issue_book.student_id INNER JOIN books ON books.id = issue_book.book_id WHERE issue_book.return_date = ''");
                                    $i = 0;
                                    while($result = mysqli_fetch_assoc($query)):
                                        $dep_id = $result['department_id'];
                                    $dep = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$dep_id'");
                                    while($dep_name = mysqli_fetch_assoc($dep)):
                                ?>
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $result['f_name'].' '. $result['l_name']?></td>
                                        <td><?= $result['roll']?></td>
                                        <td><?= $result['phone_no']?></td>
                                        <td><?= $dep_name['department_name']?></td>
                                        <td><?= $result['book_name']?></td>
<!--                                        <td><img src="../dist/images/book/--><?//= $result['book_image']?><!--" alt="" style="width: 50px; height: 50px;"></td>-->
                                        <td><?= date('M d, Y', strtotime($result['issue_date']))?>
                                        </td>
                                        <td><a href="return_book.php?id=<?= $result['id']?>&bookid=<?= $result['book_id']?>">Return Book</a></td>
                                    </tr>
                                <?php
                                    endwhile; endwhile;
                                ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>St. Name</th>
                                <th>St.Roll</th>
                                <th>St.Phone</th>
                                <th>St.Department</th>
                                <th>Book Name</th>
<!--                                <th>Book Image</th>-->
                                <th>Issue Date</th>
                                <th>Return Date</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php require_once ('include/footer.php');?>