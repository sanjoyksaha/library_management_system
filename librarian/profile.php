<?php
require_once ('include/header.php');
require_once ('include/sidebar.php');

if(isset($_POST['edit_profile'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    //$password = $_POST['password'];
    $phone_no = $_POST['phone_no'];

//    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = mysqli_query($conn, "UPDATE librarian SET `name` ='$name', `email` ='$email', `user_name` ='$user_name',  `phone_no` = '$phone_no' WHERE id= '$id'");
    if($query)
    {
        $success = "Profile Updated Successfully.";
    }else{
        $error = "Something Went Wrong";
    }

}
?>
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
                                $user_name = $_SESSION['librarian_id'];
                                    $query = mysqli_query($conn, "SELECT * FROM librarian WHERE id = '$user_name'");
                                    while($result = mysqli_fetch_assoc($query)):
                                ?>
                                <tr>
                                    <td>Name</td>
                                    <td><?= $result['name']?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?= $result['email']?></td>
                                </tr>
                                <tr>
                                    <td>User Name</td>
                                    <td><?= $result['user_name']?></td>
                                </tr>
                                <tr>
                                    <td>Phone No</td>
                                    <td><?= $result['phone_no']?></td>
                                </tr>

                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#book-<?= $result['id']?>">Edit Profile</button>
<!--                            <a href="javascript:avoid(0)" class="btn btn-outline-info btn-sm"  "><i class="fas fa-eye"></i></a>-->
                        </div>
                        <?php endwhile;?>
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
    <!-- Book Info Modal Start -->
<?php
$query = mysqli_query($conn, "SELECT * FROM librarian");
while($profile= mysqli_fetch_assoc($query)):
    ?>
    <div class="modal fade" id="book-<?= $profile['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header alert alert-info">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo ($_SERVER['PHP_SELF']);?>" method="POST">
                        <input type="hidden" name="id" value="<?= $profile['id']?>">
                        <table id="example1" class="table table-bordered table-striped">
                            <tr>
                                <th class="w-25">Name</th>
                                <td><input type="text" name="name" class="form-control" value="<?= $profile['name'] ?>"></td>
                            </tr>
                            <tr>
                                <th class="w-25">Email</th>
                                <td><input type="text" name="email" class="form-control" value="<?= $profile['email']?>"></td>
                            </tr>
                            <tr>
                                <th class="w-25">User Name</th>
                                <td><input type="text" name="user_name" class="form-control" value="<?= $profile['user_name'] ?>"></td>
                            </tr>
<!--                            <tr>-->
<!--                                <th class="w-25">Password</th>-->
<!--                                <td><input type="text" name="password" class="form-control"></td>-->
<!--                            </tr>-->
                            <tr>
                                <th class="w-25">Phone No</th>
                                <td><input type="text" name="phone_no" class="form-control" value="<?= $profile['phone_no']?>"></td>
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
<?php

?>
    <!-- Book Info Modal End -->

<?php require_once ('include/footer.php');?>