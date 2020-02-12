<?php
require_once ('include/header.php');
require_once ('include/sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
    if(isset($_POST['add_department'])){

        $dep_name = $_POST['department_name'];


        $query = mysqli_query($conn,"INSERT INTO departments(department_name) VALUES ('$dep_name')");
        if($query)
        {
            $success = "Department Added Successfully.";
        }else{
            $error = "Something Went Wrong.";
        }
    }
    ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Departments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:avoid(0)">Add Departments</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
    if(isset($success)){
        ?>
        <div class="col-md-6 alert alert-success alert-dismissible fade show msg" role="alert">
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
        <div class="col-md-6 alert alert-danger alert-dismissible fade show msg" role="alert">
            <strong><?= $error;?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header alert alert-danger">
                        <h3 class="card-title">Add Departments</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST" data-parsley-validate>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Department Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="department_name" class="form-control" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Department Name is required" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 offset-3">
                                    <input type="submit" name="add_department" value="ADD Department" class="btn btn-outline-dark">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header alert alert-danger">
                        <h3 class="card-title">Departments List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = mysqli_query($conn, "SELECT * FROM departments");
                                    while($result = mysqli_fetch_assoc($query)):
                                ?>
                                    <tr>
                                        <td><?= $result['department_name']?></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-primary btn-sm edit_department" id="<?= $result['id']?>">
                                                <i class="far fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger btn-sm delete" id="<?= $result['id']?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php
                                     endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="dep_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="update_department">
                    <input type="hidden" name="id" id="id" class="form-control"">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">Department Name</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="department_name" id="department_name" class="form-control" autocomplete="off">
                        <p class="text-light error"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light" name="edit_department" id="edit_department">Edit Department</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php require_once ('include/footer.php');?>