<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Ethjobs</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/fontawesome/css/all.min.css')); ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/bootstrap-iconpicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap-daterangepicker/daterangepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/components.css')); ?>">

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Main Content -->
            <div class="main-content">
                <?php echo $__env->yieldContent('contents'); ?>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <?php echo e(date('Y')); ?> <div class="bullet"></div> Design By <a href="dashboard">EthJobs</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('admin/assets/modules/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/stisla.js')); ?>"></script>

    <!-- JS Libraies -->
    <script src="<?php echo e(asset('admin/assets/modules/sweetalert/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/select2/dist/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

    <!-- Template JS File -->
    <script src="<?php echo e(asset('admin/assets/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/custom.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

        $(".delete-item").on('click', function(e) {
            e.preventDefault();

            swal({
                    title: 'Are you sure?',
                    text: 'Once deleted, you will not be able to recover this data!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        let url = $(this).attr('href')

                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {_token: "<?php echo e(csrf_token()); ?>"},
                            success: function(response) {
                                window.location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr);
                                swal(xhr.responseJSON.message, {
                                    icon: 'error',
                                });
                            }
                        })
                    }
                });
        });
    </script>

    <script>
    $(".export-database").on('submit', function(e) {
        e.preventDefault();

        swal({
            title: 'Are you sure?',
            text: 'This action will export the entire database!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willExport) => {
            if (willExport) {
                let url = $(this).attr('action');

                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {_token: "<?php echo e(csrf_token()); ?>"},
                    beforeSend: function() {
                        swal('Exporting database, please wait...', {
                            icon: 'info',
                            buttons: false,
                            closeOnClickOutside: false
                        });
                    },
                    success: function(response) {
                        swal(response.message, {
                            icon: 'success',
                        });

                        // Redirect to the download URL or perform any other action
                        window.location.href = response.download_url;
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        swal(xhr.responseJSON.message, {
                            icon: 'error',
                        });
                    }
                })
            }
        });
    });
</script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\EthJobs-Portal\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>