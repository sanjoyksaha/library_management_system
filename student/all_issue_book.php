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
                    <h1 class="m-0 text-dark">All Issue Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:avoid(0)">All Issue Books</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header alert alert-danger">
                        <h3 class="card-title">All Issue Books</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Book Name</th>
                                <th>Book Author Name</th>
                                <th>Book Image</th>
                                <th>Issue Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $id = $_SESSION['student_id'];
                                    $query = mysqli_query($conn, "SELECT issue_book.issue_date, issue_book.return_date, books.book_name, books.book_author_name, books.book_image FROM books INNER JOIN issue_book ON issue_book.book_id = books.id WHERE issue_book.student_id = '$id' && issue_book.return_date = ''");
                                    $i = 0;
                                    while($result = mysqli_fetch_assoc($query)):
                                ?>
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $result['book_name']?></td>
                                        <td><?= $result['book_author_name']?></td>
                                        <td><img src="../dist/images/book/<?= $result['book_image']?>" alt="" style="width: 60px; height: 60px;"></td>
                                        <td><?= date('M d, Y', strtotime($result['issue_date']))?></td>
                                    </tr>
                                <?php
                                    endwhile;
                                ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Book Name</th>
                                <th>Book Author Name</th>
                                <th>Book Image</th>
                                <th>Issue Date</th>
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