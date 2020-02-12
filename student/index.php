<?php require_once ('include/header.php'); ?>
<?php require_once ('include/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    $id = $_SESSION['student_id'];
                    $books_item = mysqli_query($conn, "SELECT * FROM books");
                    $query = mysqli_query($conn, "SELECT * FROM issue_book WHERE student_id = '$id' && return_date = ''");
                    $department = mysqli_query($conn, "SELECT * FROM departments");
                    $tt_issue_books = mysqli_num_rows($query);
                    $tt_department = mysqli_num_rows($department);
                    $tt_books_item = mysqli_num_rows($books_item);

                    ?>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><?php echo $tt_books_item;?></h3>
                                <p>Item Of Books</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $tt_issue_books; ?></h3>
                                <p>Total Issue Books</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-book-reader"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box" style="background: #B53471;">
                            <div class="inner">
                                <h3><?php echo $tt_department;?></h3>
                                <p>Total Departments</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-university"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php require_once ('include/footer.php');?>






