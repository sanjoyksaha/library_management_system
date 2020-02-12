<?php
    //require_once ('../include/connection.php');

    $page = explode('/', $_SERVER['PHP_SELF']);
    $page = end($page);
    if (!isset($_SESSION['admin_login'])) {
        header("location:login.php");
    }

//    print_r($result);

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-teal elevation-4">
    <!-- Brand Logo -->
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
<!--            <div class="image">-->
<!--                <img src="../asset/dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">-->
<!--            </div>-->
            <?php
            $admin_info = $_SESSION['librarian_id'];

            $query = mysqli_query($conn, "SELECT * FROM librarian WHERE id = '$admin_info'");
            $result = mysqli_fetch_assoc($query);?>
            <div class="info">
                <a href="#" class="d-block"><?= $result['name']?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
<!--                Dashboard Menu Start-->
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?= $page == 'index.php' ? 'active' : ''?>">
                        <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                        <p>Dashboard</p>
                    </a>
                </li>
<!--                Dashboard Menu End-->
<!--                All Students Menu Start-->
                <li class="nav-item">
                    <a href="all_students.php" class="nav-link <?= $page == 'all_students.php' ? 'active' : ''?>">
                        <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                        <p>All Students</p>
                    </a>
                </li>
<!--                All Students Menu End-->
<!--                Department Menu Start-->
                <li class="nav-item has-treeview">
                    <a href="departments.php" class="nav-link <?= $page == 'departments.php'? 'active' : ''?>">
                      <p>Department</p>
                    </a>
                </li>
<!--                Department Menu End-->
<!--                Books Menu Start-->
                <li class="nav-item has-treeview <?= $page == 'add_book.php' ? 'menu-open' : '' ?><?= $page == 'books_list.php' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $page == 'add_book.php' ? 'active' : '' ?><?= $page == 'books_list.php' ? 'active' : '' ?>">
                      <p>Books<i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="add_book.php" class="nav-link <?= $page == 'add_book.php' ? 'active' : '' ?>">
                          <i class="fas fa-plus"></i>
                          <p>Add Book</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="books_list.php" class="nav-link <?= $page == 'books_list.php' ? 'active' : '' ?>">
                          <i class="fas fa-list"></i>
                          <p>Books List</p>
                        </a>
                      </li>
                    </ul>
                </li>
<!--                Books Menu End-->
<!--                Issue book Menu Start-->
                <li class="nav-item">
                    <a href="issue_book.php" class="nav-link <?= $page == 'issue_book.php' ? 'active' : ''?>">
                        <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                        <p>Issue Book</p>
                    </a>
                </li>
<!--                Issue Book Menu End-->
<!--                Return book Menu Start-->
                <li class="nav-item">
                    <a href="return_book.php" class="nav-link <?= $page == 'return_book.php' ? 'active' : ''?>">
                        <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                        <p>Return Book</p>
                    </a>
                </li>
<!--                Return Book Menu End-->
<!--                Profile Menu Start-->
                <li class="nav-item">
                    <a href="profile.php" class="nav-link <?= $page == 'profile.php' ? 'active' : ''?>">
                        <p>Admin Profile</p>
                    </a>
                </li>
<!--                Profile Menu End-->
<!--                Profile Menu Start-->
                <li class="nav-item">
                    <a href="settings.php" class="nav-link <?= $page == 'settings.php' ? 'active' : ''?>">
                        <p>Settings</p>
                    </a>
                </li>
<!--                Profile Menu End-->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>