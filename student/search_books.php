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
                    <h1 class="m-0 text-dark">Search Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:avoid(0)">Search Books</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header alert alert-danger">
                        <h3 class="card-title">Search Books</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 col-6">
                                        <div class="input-group mb-4 col-md-12">
                                            <input class="form-control" type="text" name="book_name" id="search_book" placeholder="Search Book">
                                            <div class="input-group-append">
                                                <a href="javascript:avoid(0)" class="btn btn-light">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="content">
                            <div class="container-fluid">
                                <div class="row" >
                                    <div class="col-lg-6 col-6" id="result">
                                    </div>
                                </div>
                            </div>
                        </div>


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
