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
                    <h1 class="m-0 text-dark">All Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:avoid(0)">All Books</a></li>
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
                        <h3 class="card-title">All Books</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">
<!--                                    <div class="col-lg-12 col-6">-->
<!--                                        <form action="" method="POST">-->
<!--                                            <div class="input-group mb-4 col-md-6 offset-2">-->
<!--                                                <input class="form-control" type="text" name="book_name" id="search_book" placeholder="Search Book">-->
<!--                                                <div class="input-group-append">-->
<!--                                                    <button class="btn btn-light" type="submit" name="search_book">-->
<!--                                                        <i class="fas fa-search"></i>-->
<!--                                                    </button>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </form>-->
<!--                                    </div>-->
<!--                                    --><?php
//                                        if(isset($_POST['search_book'])){
//                                            $book_name = $_POST['book_name'];
//                                        $query = mysqli_query($conn, "SELECT * FROM books WHERE book_name LIKE '%$book_name%'");
//                                        while ($result = mysqli_fetch_assoc($query)):
//                                    ?>
<!--                                    <div class="col-lg-3 col-6" >-->
<!--                                        <div class="small-box bg-seconday" style="height: 300px;">-->
<!--                                            <div class="text-center">-->
<!--                                                <img src="../dist/images/book/--><?//= $result['book_image']?><!--" alt="" style="width: 200px; height: 150px;" class="img-fluid img-thumbnail mt-3">-->
<!--                                            </div>-->
<!--                                            <div class="text-center justify-content-center">-->
<!--                                                <p class="mt-2 mb-0"><sapn class="font-weight-bolder text-info">Name:</sapn> --><?//= $result['book_name'] ?><!--</p>-->
<!--                                                <p class="mb-0"><sapn class="font-weight-bolder text-info">Author Name:</sapn> --><?//= $result['book_author_name']?><!--</p>-->
<!--                                                <p class="mb-0"><sapn class="font-weight-bolder text-info">Available Quantity:</sapn> --><?//= $result['available_quantity'] ?><!--</p>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <?php
//                                    endwhile;
//                                        }else {
                                            $query = mysqli_query($conn, "SELECT * FROM books ");
                                            while ($result = mysqli_fetch_assoc($query)):

                                                ?>
                                                <div class="col-lg-3 col-6" id="result">
                                                    <div class="small-box bg-seconday" style="height: 300px;">
                                                        <div class="text-center">
                                                            <img src="../dist/images/book/<?= $result['book_image'] ?>"
                                                                 alt="" style="width: 200px; height: 150px;"
                                                                 class="img-fluid img-thumbnail mt-3">
                                                        </div>
                                                        <div class="text-center justify-content-center">
                                                            <p class="mt-2 mb-0">
                                                                <sapn class="font-weight-bolder text-info">Name:
                                                                </sapn> <?= $result['book_name'] ?></p>
                                                            <p class="mb-0">
                                                                <sapn class="font-weight-bolder text-info">Author
                                                                    Name:
                                                                </sapn> <?= $result['book_author_name'] ?></p>
                                                            <p class="mb-0">
                                                                <sapn class="font-weight-bolder text-info">Available
                                                                    Quantity:
                                                                </sapn> <?= $result['available_quantity'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            endwhile;
                                    ?>
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
