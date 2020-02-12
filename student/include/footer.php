<?php
//session_start();

if(!isset($_SESSION['student_login'])){
header("location:login.php");
}
?>
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        <strong><a href="https://www.facebook.com/sahaksanjoy">Developed By Sanjoy Kumar Saha</a></strong>
    </div>
    <?php
    date_default_timezone_set('Asia/Dhaka');
    $query = mysqli_query($conn, "SELECT * FROM settings");
    while($result = mysqli_fetch_assoc($query)):
        ?>
        <strong>&copy; 2019-<?php echo date('Y');?> <a href="#"><?= $result['name']?></a>.</strong> All rights reserved.
    <?php endwhile;?>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../asset/plugins/datatables/jquery.dataTables.js"></script>
<script src="../asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- <script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://kit.fontawesome.com/dd74dfb74e.js" crossorigin="anonymous"></script> -->
<script src="../asset/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../dist/js/parsley.min.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
<!-- <script src="../asset/dist/js/demo.js"></script> -->
<script>
    $(document).ready( function () {
        $('#example1').DataTable();
    });

    setTimeout(function () {
        $('.loader_bg').fadeToggle();
    }, 700);

    // $( function() {
    //     $( "#datepicker" ).datepicker({dateFormat: "dd-mm-yy"});
    // } );

    $("#search_book").keyup(function () {
        const search_book = $("#search_book").val();
        $.ajax({
            url: 'include/search_book.php',
            method: "POST",
            data: { search: search_book},
            dataType: "json",
            success: function (data) {
                $("#result").html(data);
            }
        });
    })
</script>
</body>
</html>