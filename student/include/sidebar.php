<?php

$page = explode('/', $_SERVER['PHP_SELF']);
$page = end($page);

//session_start();

if(!isset($_SESSION['student_login'])){
    header("location:login.php");
}

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM settings");
    while($result = mysqli_fetch_assoc($query)):
        ?>
        <a href="index.php" class="brand-link">
            <img src="../dist/images/settings/<?= $result['image']?>" alt="" class="brand-image img-circle elevation-2" style="opacity: .8;">
            <span class="brand-text font-weight-light"><?= $result['name']?></span>
        </a>
    <?php endwhile;?>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <?php
            $id = $_SESSION['student_id'];
            $query = mysqli_query($conn, "SELECT * FROM students WHERE id = '$id'");
            $result = mysqli_fetch_assoc($query);
            ?>

            <div class="image">
                <img src="../dist/images/students/<?= $result['img']?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="profile.php" class="d-block"><?= $result['f_name'].' '.$result['l_name']?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?= $page == 'index.php' ? 'active' : ''?>">
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= $page == 'all_issue_book.php' ? 'menu-open' : '' ?><?= $page == 'books_record.php' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $page == 'all_issue_book.php' ? 'active' : '' ?><?= $page == 'books_record.php' ? 'active' : '' ?>">
                      <p>Issue Books<i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="all_issue_book.php"
                               class="nav-link <?= $page == 'all_issue_book.php' ? 'active' : '' ?>">
                                <!-- <i class="fas fa-plus"></i> -->
                                <p>All Issue Books</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="books_record.php" class="nav-link <?= $page == 'books_record.php' ? 'active' : '' ?>">
                                <!-- <i class="fas fa-plus"></i> -->
                                <p>Books Record</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="books.php" class="nav-link <?= $page == 'books.php' ? 'active' : ''?>">
                        <p>Books</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="search_books.php" class="nav-link <?= $page == 'search_books.php' ? 'active' : ''?>">
                        <p>Search Books</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link <?= $page == 'profile.php' ? 'active' : ''?>">
                        <p>Profile</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>