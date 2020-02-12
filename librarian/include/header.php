<?php
    require_once ('../include/connection.php');

    session_start();

    if(!isset($_SESSION['admin_login'])){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../asset/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../asset/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../asset/plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="../asset/plugins/jquery-ui/jquery-ui.theme.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="../dist/css/parsley-custom.css">
    <style>
        .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active, .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
            background-color: #0a4586;
        }

        [class*=sidebar-dark-] .nav-treeview > .nav-item > .nav-link.active, [class*=sidebar-dark-] .nav-treeview > .nav-item > .nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview > .nav-item > .nav-link.active:hover {
            background-color: #098596;
            color: #080100;
        }
        .loader_bg{
            position: fixed;
            z-index: 999999;
            background: #fff;
            width: 100%;
            height: 100%;
        }
        .loader{
            border: 0 solid transparent;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            position: absolute;
            top: calc(50vh - 75px);
            left: calc(50vw - 75px);
        }

        .loader:before, .loader:after{
            content: '';
            border: 1rem solid #ff5733;
            border-radius: 50%;
            width: inherit;
            height: inherit;
            position: absolute;
            top: 0;
            left: 0;
            animation: loader 2s linear infinite;
            opacity: 0;
        }
        .loader:before{
            animation-delay: .5s;
        }
        @keyframes loader {
            0%{
                transform: scale(0);
                opacity: 0;
            }
            50%{
                opacity: 1;
            }
            100%{
                transform: scale(1);
                opacity: 0;
            }
        }

    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="loader_bg">
    <div class="loader"></div>
</div>
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php" class="nav-link">Dashboard</a>
            </li>
        </ul>
        

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <?php
                $query= mysqli_query($conn, "SELECT * FROM students WHERE status = '0'");
                $count = mysqli_num_rows($query);
            ?>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-danger navbar-badge"><?php echo $count; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header"><?php echo $count; ?> Notifications</span>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> <?php echo $count; ?> new student requests
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="index.php?#request" class="dropdown-item dropdown-footer">See All Requests</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-slide="true" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->