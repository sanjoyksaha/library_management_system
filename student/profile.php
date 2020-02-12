<?php
require_once ('include/header.php');
require_once ('include/sidebar.php');
?>
    <!-- Settings Info Modal Start -->
<?php
$query = mysqli_query($conn, "SELECT * FROM students");
while($student_info= mysqli_fetch_assoc($query)):
    ?>
    <div class="modal fade" id="book-<?= $student_info['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header alert alert-info">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="include/edit_function.php" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        <input type="hidden" name="id" value="<?= $student_info['id']?>">
                        <table id="example1" class="table table-bordered table-striped">
                            <tr>
                                <th class="w-25">First Name</th>
                                <td><input type="text" name="f_name" class="form-control" value="<?= $student_info['f_name']?>" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "First Name is required" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <th class="w-25">Last Name</th>
                                <td><input type="text" name="l_name" class="form-control" value="<?= $student_info['l_name'] ?>" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Last Name is required" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <th class="w-25">Department</th>
                                <td><select name="department" id="department" class="form-control">

                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM departments ORDER BY department_name");
                                        while($result = mysqli_fetch_assoc($query)):
                                            ?>
                                            <option <?= $result['id'] == $student_info['department_id'] ? 'selected': ''?> value="<?= $result['id']?>"><?= $result['department_name']?></option>
<!--                                            <option value="--><?//= $result['id']?><!--">--><?//= $result['department_name']?><!--</option>-->
                                        <?php
                                        endwhile;
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <th class="w-25">Roll</th>
                                <td><input type="text" name="roll" class="form-control" value="<?= $student_info['roll'] ?>" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Roll is required" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <th class="w-25">Reg No</th>
                                <td><input type="text" name="reg_no" class="form-control" value="<?= $student_info['reg_no'] ?>" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Reg No is required" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <th class="w-25">Email</th>
                                <td><input type="text" name="email" class="form-control" value="<?= $student_info['email']?>" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Email is required" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <th class="w-25">User Name</th>
                                <td><input type="text" name="user_name" class="form-control" value="<?= $student_info['user_name'] ?>" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "User Name is required" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <th class="w-25">Password</th>
                                <td><input type="text" name="password" class="form-control" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Password is required" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <th class="w-25">Phone No</th>
                                <td><input type="text" name="phone_no" class="form-control" value="<?= $student_info['phone_no'] ?>" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Phone is required" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <th class="w-25">Image</th>
                                <td><input type="file" name="img" class="form-control" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Image is required" autocomplete="off">
                                    <img src="../dist/images/students/<?= $student_info['img']?>" alt="Image" style="width: 150px; height: 120px;" ></td>

                            </tr>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit_profile" class="btn btn-danger">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php
endwhile;
?>
    <!-- Settings Info End -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:avoid(0)">Profile</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <?php
        if(isset($success)){
            ?>
            <div class="alert alert-success alert-dismissible fade show msg" role="alert">
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
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card col-md-6 offset-2">
                        <div class="card-header alert alert-danger">
                            <h3 class="card-title">Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <?php
                                $student_info = $_SESSION['student_id'];
                                $query = mysqli_query($conn, "SELECT * FROM students WHERE id = '$student_info' ");
                                while($result = mysqli_fetch_assoc($query)):
                                $id= $result['department_id'];
                                $dep = mysqli_query($conn, "SELECT * FROM departments WHERE id = '$id'");
                                while($department = mysqli_fetch_assoc($dep)):

                                ?>
                                <tr>
                                    <td>Name</td>
                                    <td><?= $result['f_name'] . ' ' . $result['l_name']?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?= $result['email']?></td>
                                </tr>
                                <tr>
                                    <td>Department</td>
                                    <td><?= $department['department_name']?></td>
                                </tr>
                                <tr>
                                    <td>Roll</td>
                                    <td><?= $result['roll']?></td>
                                </tr>
                                <tr>
                                    <td>Reg No</td>
                                    <td><?= $result['reg_no']?></td>
                                </tr>
                                <tr>
                                    <td>User Name</td>
                                    <td><?= $result['user_name']?></td>
                                </tr>
                                <tr>
                                    <td>Phone No</td>
                                    <td><?= $result['phone_no']?></td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td><img src="../dist/images/students/<?= $result['img']?>" alt="" style="height: 120px; width: 150px;"></td>
                                </tr>

                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#book-<?= $result['id']?>">Edit Profile</button>
                            <!--                            <a href="javascript:avoid(0)" class="btn btn-outline-info btn-sm"  "><i class="fas fa-eye"></i></a>-->
                        </div>
                        <?php endwhile; endwhile;?>
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