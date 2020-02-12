<?php 
    require_once ('include/header.php'); 
    require_once ('include/sidebar.php'); 

    require_once ('../include/connection.php');
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">All Students</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:avoid(0)">All Students</a></li>
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
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Dept.</th>
                                    <th>Roll</th>
                                    <th>Reg</th>
                                    <th>Email</th>
                                    <th>User Name</th>
<!--                                    <th>Image</th>-->
                                    <th>Phone No</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $query = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");

                                    $i = 1;
                                    while($student= mysqli_fetch_assoc($query)):
                                        $id= $student['department_id'];
                                        $dep = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$id'");
                                        while($department = mysqli_fetch_assoc($dep)):
                                ?>
                                        <tr>
                                            <td><?= $i++;?></td>
                                            <td><?= $student['f_name'] .' '. $student['l_name'] ?></td>
                                            <td><?= $department['department_name']?></td>
                                            <td><?= $student['roll'] ?></td>
                                            <td><?= $student['reg_no'] ?></td>
                                            <td><?= $student['email']?></td>
                                            <td><?= $student['user_name']?></td>
<!--                                            <td>--><?//= $student['img']?><!--</td>-->
                                            <td><?= $student['phone_no']?></td>
                                            <!-- <td><?= $student['status'] == 1 ? 'Active': 'Inactive'?></td> -->
                                            <td>
                                                <?php if($student['status'] == 1){?>
                                                <span class="badge badge-info">Active</span>
                                                <?php }else {?>
                                                   <span class="badge badge-danger">Inactive</span> 
                                                <?php }?>
                                            </td>
                                            <td>
                                                <?php 
                                                if($student['status'] == 1){
                                                ?>
                                                    <a href="include/inactive_status.php?id=<?= base64_encode($student['id']) ?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-times"></i></a>
                                                <?php 
                                                }else {
                                                ?>
                                                   <a href="include/active_status.php?id=<?= base64_encode($student['id']) ?>" class="btn btn-outline-success btn-sm"><i class="fas fa-check"></i></a>
                                                <?php 
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                <?php
                                    endwhile; endwhile;
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Dept.</th>
                                    <th>Roll</th>
                                    <th>Reg</th>
                                    <th>Email</th>
                                    <th>User Name</th>
<!--                                    <th>Image</th>-->
                                    <th>Phone No</th>
                                    <th>Status</th>
                                    <th>Action</th>
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