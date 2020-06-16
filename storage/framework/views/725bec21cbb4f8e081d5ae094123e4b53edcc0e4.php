<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $__env->yieldContent('judul'); ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/vendors/base/vendor.bundle.base.css')); ?>">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/style.css')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   
</head>
<body class="index">
	<?php echo $__env->yieldContent('content'); ?>

  <!-- plugins:js -->
  <script src="<?php echo e(asset('assets/admin/vendors/base/vendor.bundle.base.js')); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo e(asset('assets/admin/vendors/chart.js/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/vendors/datatables.net/jquery.dataTables.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')); ?>"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo e(asset('assets/admin/js/off-canvas.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/js/hoverable-collapse.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/js/template.js')); ?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo e(asset('assets/admin/js/dashboard.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/js/data-table.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/js/jquery.dataTables.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/js/dataTables.bootstrap4.js')); ?>"></script>
  <!-- End custom js for this page-->

</body>
</html><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/layouts/admin.blade.php ENDPATH**/ ?>