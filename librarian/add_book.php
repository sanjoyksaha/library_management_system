<?php 
    require_once ('include/header.php');
    require_once ('include/sidebar.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
    include('include/add_book_function.php');
    ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:avoid(0)">Add Book</a></li>
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
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header alert alert-danger">
                        <h3 class="card-title">Add Book</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?= $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" data-parsley-validate>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="book_name" class="form-control" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Book Name is required" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Image</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" name="book_image" class="form-control-file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Author Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="book_author_name" class="form-control" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Book Author Name is required" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Publication Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="book_publication_name" class="form-control" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Book Publication Name is required" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Purchase Date</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="book_purchase_date" class="form-control" id="datepicker" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Book Purchase Date is required" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Price</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="book_price" class="form-control" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Book Price is required" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Book Quantity</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="book_quantity" class="form-control" required="" data-parsley-trigger="change focusout" data-parsley-required-message = "Book Quantity is required" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="">Available Quantity</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="available_quantity" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 offset-3">
                                    <input type="submit" name="submit" value="ADD" class="btn btn-outline-dark">
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