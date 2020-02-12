<?php
require_once ('include/header.php');
require_once ('include/sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
    //include('include/edit_book_function.php');
    if(isset($_GET['bookUpdate'])) {
        $id = base64_decode($_GET['bookUpdate']);
        $query = mysqli_query($conn, "SELECT * FROM books WHERE id = '$id' ");
        $data = mysqli_fetch_assoc($query);
    }
    ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:avoid(0)">Edit Book</a></li>
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
                        <h3 class="card-title">Edit Book</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="include/edit_function.php" method="POST" enctype="multipart/form-data" data-parsley-validate>
                            <input type="hidden" name="id" value="<?= $data['id']?>">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="book_name" class="form-control" value="<?= $data['book_name']?>" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Book Name is required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Image</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" name="book_image" class="form-control-file">
                                    <img src="../dist/images/book/<?= $data['book_image']?>" alt="" style="width:120px; height:100px;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Author Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="book_author_name" class="form-control" required="" value="<?= $data['book_author_name']?>" data-parsley-trigger="change focusout" data-parsley-required-message = "Book Author Name is required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Publication Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="book_publication_name" class="form-control" required="" value="<?= $data['book_publication_name']?>" data-parsley-trigger="change focusout" data-parsley-required-message = "Book Publication Name is required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Purchase Date</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="book_purchase_date" class="form-control" id="datepicker" value="<?= $data['book_purchase_date']?>" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Book Purchase Date is required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Price</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="book_price" class="form-control" required="" value="<?= $data['book_price']?>" data-parsley-trigger="change focusout" data-parsley-required-message = "Book Price is required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Quantity</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="book_quantity" class="form-control" required="" value="<?= $data['book_quantity']?>" data-parsley-trigger="change focusout" data-parsley-required-message = "Book Quantity is required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Available Quantity</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="available_quantity" class="form-control" value="<?= $data['available_quantity']?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 offset-3">
                                    <input type="submit" name="edit_book" value="Update" class="btn btn-outline-dark">
                                </div>
                            </div>
                        </form>
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
