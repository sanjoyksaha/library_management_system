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
                    <h1 class="m-0 text-dark">Books List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:avoid(0)">Books List</a></li>
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
                <div class="card">
                    <div class="card-header alert alert-danger">
                        <h3 class="card-title">Books List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Author Name</th>
                                <th>Publication Name</th>
                                <th>Purchase Date</th>
                                <th>Price</th>
                                <th>Qnty</th>
                                <th>Available Qnty</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $result = mysqli_query($conn, "SELECT * FROM books ORDER BY id DESC");

                                $i = 1;
                                while($book= mysqli_fetch_assoc($result)):
                            ?>
                                    <tr>
                                        <td><?= $i++;?></td>
                                        <td><?= $book['book_name'] ?></td>
                                        <td><img src="../dist/images/book/<?= $book['book_image']?>" alt="" style="width: 50px; height: 50px;"></td>
                                        <td><?= $book['book_author_name'] ?></td>
                                        <td><?= $book['book_publication_name'] ?></td>
                                        <td><?= date('M d,Y', strtotime($book['book_purchase_date']))?></td>
                                        <td><?= $book['book_price']?></td>
                                        <td><?= $book['book_quantity']?></td>
                                        <td><?= $book['available_quantity']?></td>
                                        <td>
                                            <a href="javascript:avoid(0)" class="btn btn-outline-info btn-sm"  data-toggle="modal" data-target="#book-<?= $book['id']?>"><i class="fas fa-eye"></i></a>
                                            <a href="edit_book.php?bookUpdate=<?= base64_encode($book['id'])?>" class="btn btn-outline-secondary btn-sm"><i class="far fa-edit"></i></a>
                                            <a href="include/delete_function.php?bookDelete=<?= base64_encode($book['id'])?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you want to delete?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                endwhile;
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Author Name</th>
                                <th>Publication Name</th>
                                <th>Purchase Date</th>
                                <th>Price</th>
                                <th>Qnty</th>
                                <th>Available Qnty</th>
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
<!-- Book Info Modal Start -->
<?php
    $result = mysqli_query($conn, "SELECT * FROM books ORDER BY id DESC");
    while($book= mysqli_fetch_assoc($result)):
?>
<div class="modal fade" id="book-<?= $book['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h5 class="modal-title" id="exampleModalLabel">Book Info Of <span class="text-dark font-italic"><?= $book['book_name']?></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped">    
                    <tr>
                        <th class="w-25">Name</th>
                        <td><?= $book['book_name'] ?></td>
                    </tr>
                    <tr>
                        <th class="w-25">Image</th>
                        <td><img src="../dist/images/book/<?= $book['book_image']?>" alt="" style="width: 130px; height: 100px;"></td>
                    </tr>
                    <tr>
                        <th class="w-25">Author Name</th>
                        <td><?= $book['book_author_name'] ?></td>
                    </tr>
                    <tr>
                        <th class="w-25">Publication Name</th>
                        <td><?= $book['book_publication_name'] ?></td>
                    </tr>
                    <tr>
                        <th class="w-25">Purchase Date</th>
                        <td><?= date('M d,Y', strtotime($book['book_purchase_date']))?></td>
                    </tr>
                    <tr>
                        <th class="w-25">Price</th>
                        <td><?= $book['book_price']?></td>
                    </tr>
                    <tr>
                        <th class="w-25">Qnty</th>
                        <td><?= $book['book_quantity']?></td>
                    </tr>
                    <tr>
                        <th class="w-25">Available Qnty</th>
                        <td><?= $book['available_quantity']?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php 
    endwhile;
?>
<!-- Book Info Modal End -->

<?php require_once ('include/footer.php');?>