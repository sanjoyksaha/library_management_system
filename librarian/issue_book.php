<?php
    require_once ('include/header.php');
    require_once ('include/sidebar.php');
    require_once ('include/issue_book_function.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Issue Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:avoid(0)">Issue Book</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
    if(isset($success)){
        ?>
        <div class="col-md-12 alert alert-success alert-dismissible fade show msg" role="alert">
            <strong><?= $success;?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    ?>
    <?php
    if(isset($error)){
        ?>
        <div class="alert alert-danger alert-dismissible fade show msg" role="alert">
            <strong><?= $error;?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    ?>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="card">
                        <div class="card-header alert alert-danger">
                            <h3 class="card-title">Issue Book</h3>
                        </div>
                        <div class="card-body">
<!--                            Search Student Start-->
                            <div class="col-md-12">
                                <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="form-inline">
                                    <div class="form-group row col-md-5">
                                        <div class="col-md-3">
                                            <label for="">Name</label>
                                        </div>
                                        <select name="student_name" id="" class="form-control col-md-9">
                                            <option value="">--Select</option>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT id, f_name, l_name, roll FROM students WHERE status = '1'");
                                            while ($result = mysqli_fetch_assoc($query)):
                                                ?>
                                                <option value="<?= $result['id'] ?>"><?= $result['f_name'] . ' ' . $result['l_name'].' ('. $result['roll'].')' ?></option>
                                            <?php
                                            endwhile;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group row col-md-5">
                                        <div class="col-md-3">
                                            <label for="">Roll</label>
                                        </div>
                                        <select name="student_roll" id="" class="form-control col-md-9">
                                            <option value="">--Select</option>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT id, roll FROM students WHERE status = '1'");
                                            while ($result = mysqli_fetch_assoc($query)):
                                                ?>
                                                <option value="<?= $result['id'] ?>"><?= $result['roll'] ?></option>
                                            <?php
                                            endwhile;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group row col-md-2">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-outline-info" name="search_student">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- Search Student End-->
                            <?php
                                if(isset($_POST['search_student']))
                                {
                                    $student_name = $_POST['student_name'];
                                    $student_roll = $_POST['student_roll'];
                                    $query = mysqli_query($conn, "SELECT * FROM students WHERE id = '$student_name' && id = '$student_roll'");
                                    $result = mysqli_fetch_assoc($query);
                            ?>
                            <div class="col-md-12 my-4">
                                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="">Student Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"
                                                   value="<?= $result['f_name'] . ' ' . $result['l_name'] ?>">
                                            <input type="hidden" name="student_id" value="<?= $result['id']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="">Book Name</label>
                                        </div>
                                        <select name="book_id" id="" class="form-control col-md-9">
                                            <option value="">--Select</option>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT * FROM books WHERE available_quantity > 0");
                                            while ($result = mysqli_fetch_assoc($query)):
                                                ?>
                                                <option value="<?= $result['id'] ?>"><?= $result['book_name'] ?></option>
                                            <?php
                                            endwhile;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="">Date</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="issue_date" class="form-control" value="<?php date_default_timezone_set('Asia/Dhaka'); echo date('d-m-Y')?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4 offset-3">
                                            <input type="submit" name="issue_book" value="Save" class="btn btn-outline-dark">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <?php
                                }
                            ?>
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






