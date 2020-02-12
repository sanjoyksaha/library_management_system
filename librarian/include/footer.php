<?php
    if(!isset($_SESSION['admin_login'])){
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
    <strong> &copy; 2019-<?php echo date('Y');?> <a href="#"><?= $result['name']?></a>.</strong> All rights reserved.
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
<script src="../asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="https://kit.fontawesome.com/dd74dfb74e.js" crossorigin="anonymous"></script> -->
<script src="../asset/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../dist/js/parsley.min.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="../asset/dist/js/demo.js"></script>-->
<script>
    $(function () {
        $("#example1").DataTable();
    });

    $( function() {
        $( "#datepicker" ).datepicker({dateFormat: "dd-mm-yy"});
    } );

    setTimeout(function () {
        $('.loader_bg').fadeToggle();
    }, 1500);

    $(document).on('click', '.edit_department', function (event) {
        event.preventDefault();
        var dep_id = $(this).attr('id');
        console.log(dep_id);
        $.ajax({
            url:"include/fetch_data.php",
            method:"POST",
            data:{id:dep_id},
            dataType:"json",
            success:function(data){
                $('#id').val(data.id);
                $('#department_name').val(data.department_name);
                $('#dep_modal').modal('show');
            }
        });
    });

    $("#update_department").on('submit', function (event) {
        event.preventDefault();
        //console.log('hello');
        var dep_id = $("#id").val();
        var dep_name = $('#department_name').val();
        if($("#department_name").val() == ''){
            $('.error').html('Department Name Is Required.');
        }else{
            $.ajax({
                url:"include/edit_function.php",
                method:"POST",
                data: {id:dep_id, dep_name:dep_name},
                success:function(data){
                    $('#dep_modal').modal('hide');

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)

                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: data
                    })
                    setInterval('location.reload()', 1500);
                }

            });

        }

    });

    $(".delete").on('click', function(event){
        event.preventDefault();
        var dep_id = $(this).attr('id');
        console.log(dep_id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'include/delete_function.php',
                    method: 'POST',
                    data:{
                        dep_id: dep_id
                    },
                    success: function(data)
                    {
                        console.log(data);
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Your Data has been deleted.',
                            icon:'success',
                            showConfirmButton: false
                        })
                        
                        //window.location.reload(true);
                        setInterval('location.reload()', 1000);
                    },
                    error: function(data)
                    {
                        Swal.fire(
                            'Failed!',
                            'Something Went Wrong.',
                            'error'
                        )
                    }
                });
            }
            else{
                Swal.fire({
                    title: 'Opps!',
                    text: "Data Isn't Deleted!!",
                    icon: 'info',
                    timer: 1000,
                    showConfirmButton: false
                })
            }
        })
    });
</script>
</body>
</html>