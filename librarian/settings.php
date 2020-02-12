<?php
require_once ('include/header.php');
require_once ('include/sidebar.php');
?>
<!-- Settings Info Modal Start -->
<?php
    $query = mysqli_query($conn, "SELECT * FROM settings");
    while($settings= mysqli_fetch_assoc($query)):
?>
<div class="modal fade" id="book-<?= $settings['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="include/edit_function.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $settings['id']?>">
                    <table id="example1" class="table table-bordered table-striped">
                        <tr>
                            <th class="w-25">Name</th>
                            <td><input type="text" name="name" class="form-control" value="<?= $settings['name'] ?>"></td>
                        </tr>
                        <tr>
                            <th class="w-25">Email</th>
                            <td><input type="text" name="email" class="form-control" value="<?= $settings['email']?>"></td>
                        </tr>
                        <tr>
                            <th class="w-25">Address</th>
                            <td><input type="text" name="address" class="form-control" value="<?= $settings['address'] ?>"></td>
                        </tr>
                        <tr>
                            <th class="w-25">Phone No</th>
                            <td><input type="text" name="phone" class="form-control" value="<?= $settings['phone'] ?>"></td>
                        </tr>
                        <tr>
                            <th class="w-25">Image</th>
                            <td><input type="file" name="image" class="form-control">
                                <img src="../dist/images/settings/<?= $settings['image']?>" alt="Image" style="width: 150px; height: 120px;"></td>

                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="edit_settings" class="btn btn-danger">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
    endwhile;
?>
<!-- Settings Info Modal End -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:avoid(0)">Settings</a></li>
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
                        <h3 class="card-title">Settings</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM settings");
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
                                <td>Address</td>
                                <td><?= $result['address']?></td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td><?= $result['phone']?></td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td><img src="../dist/images/settings/<?= $result['image']?>" alt="" style="height: 120px; width: 150px;"></td>
                            </tr>

                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#book-<?= $result['id']?>">Edit Settings</button>
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

<?php require_once ('include/footer.php');?>