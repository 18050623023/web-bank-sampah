<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo e(asset('template')); ?>/assets/images/dlh.png" type="image/png" />
    <!--plugins-->
    <link href="<?php echo e(asset('template')); ?>/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="<?php echo e(asset('template')); ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?php echo e(asset('template')); ?>/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?php echo e(asset('template')); ?>/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Datatables-->
    <link href="<?php echo e(asset('template')); ?>/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?php echo e(asset('template')); ?>/assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?php echo e(asset('template')); ?>/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo e(asset('template')); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('template')); ?>/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('template')); ?>/assets/css/app.css" rel="stylesheet">
    <link href="<?php echo e(asset('template')); ?>/assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/css/dark-theme.css" />
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/css/semi-dark.css" />
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/css/header-colors.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <style>
        #map {
            height: 580px;
        }
    </style>

    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <?php echo $__env->yieldContent('conten'); ?>
            </div>
        </div>

        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\bank-sampah\resources\views/layouts/master.blade.php ENDPATH**/ ?>