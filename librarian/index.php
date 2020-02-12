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
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:avoid(0)">Dashboard</a></li>
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
                $students = mysqli_query($conn, "SELECT * FROM students");
                $active_std = mysqli_query($conn, "SELECT status FROM students WHERE status = 1");
                $inactive_std = mysqli_query($conn, "SELECT status FROM students WHERE status = 0");
                $department = mysqli_query($conn, "SELECT * FROM departments");
                $books_item = mysqli_query($conn, "SELECT * FROM books");
                $books_qnty = mysqli_query($conn, "SELECT SUM(book_quantity) AS total_qnty FROM books");
                $books_available_qnty = mysqli_query($conn, "SELECT SUM(available_quantity) AS total_available_qnty FROM books");
                $admins = mysqli_query($conn, "SELECT * FROM librarian");

                $students_count = mysqli_num_rows($students);
                $active_std_count = mysqli_num_rows($active_std);
                $inactive_std_count = mysqli_num_rows($inactive_std);
                $tt_department = mysqli_num_rows($department);
                $tt_books_item = mysqli_num_rows($books_item);
                $qnty = mysqli_fetch_assoc($books_qnty);
                $available_qnty = mysqli_fetch_assoc($books_available_qnty);
                $admin_count = mysqli_num_rows($admins);

                $issued_books = ($qnty['total_qnty'] - $available_qnty['total_available_qnty']);

                ?>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $students_count;?></h3>
                            <p>Total Students</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box" style="background: #f5f6fa;">
                        <div class="inner">
                            <h3><?php echo $active_std_count ;?></h3>
                            <p>Active Students</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3><?php echo $inactive_std_count ;?></h3>
                            <p>Inactive Students</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-times"></i>
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
                            <h3><?= $qnty['total_qnty'];?></h3>
                            <p>Total Books</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $available_qnty['total_available_qnty']?></h3>
                            <p>Available Books</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book-reader"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box" style="background: #ff7f50;">
                        <div class="inner">
                            <h3><?php echo $issued_books;?></h3>
                            <p>Issued Books</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book-dead"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $admin_count;?></h3>
                            <p>Admin</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
                <div class="card col-md-12" id="request">
                    <div class="card-header alert alert-danger">
                        <div class="card-title">
                            <h3>New Student Requests For Activation</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bodered">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Student Name</th>
                                    <th>Roll</th>
                                    <th>Reg. No</th>
                                    <th>Phone No</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM students WHERE status = 0");
                                $i = 0;
                                while($result = mysqli_fetch_assoc($query)):
                                    $id= $result['department_id'];
                                    $dep = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$id'");
                                while($department = mysqli_fetch_assoc($dep)):
                            ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= $result['f_name'].' '.$result['l_name']?></td>
                                <td><?= $result['roll']?></td>
                                <td><?= $result['reg_no']?></td>
                                <td><?= $result['phone_no']?></td>
                                <td><?= $department['department_name']?></td>
                                <td>
                                    <?php
                                    if($result['status'] == 0){
                                        ?>
                                        <a href="include/index_active_status.php?inactive_id=<?= base64_encode($result['id']) ?>" class="btn btn-outline-success btn-sm"><i class="fas fa-check"></i></a>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                                endwhile; endwhile;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card col-md-12">
                    <div class="card-header alert alert-danger">
                        <div class="card-title">
                            <h3>Issued Books</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 25%">SL No</th>
                                <th style="width: 50%">Book Name</th>
                                <th style="width: 25%">Total Issued Books</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = mysqli_query($conn, "SELECT DISTINCT issue_book.book_id, books.book_name FROM issue_book INNER JOIN books ON books.id = issue_book.book_id WHERE return_date = ''");
                                $i = 0;
                                while ($result = mysqli_fetch_assoc($query)):
                                    $id = $result['book_id'];
                                    $query1 = mysqli_query($conn, "SELECT COUNT(book_id) as total FROM issue_book WHERE book_id = '$id' && return_date = '' ");
                                    while ($result1 = mysqli_fetch_assoc($query1)):
                            ?>
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $result['book_name'] ?></td>
                                        <td><?= $result1['total'] ?></td>
                                    </tr>
                                <?php endwhile; endwhile; ?>
                            </tbody>
                        </table>
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






