<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $__env->yieldContent('judul'); ?></title>
	<link rel="stylesheet" href="<?php echo e(asset('assets/admin/vendors/mdi/css/materialdesignicons.min.css')); ?>">
  	<link rel="stylesheet" href="<?php echo e(asset('assets/admin/vendors/base/vendor.bundle.base.css')); ?>">
  	<!-- endinject -->
  	<!-- inject:css -->
  	<link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/style.css')); ?>">
  	<!-- endinject -->
  	<link rel="shortcut icon" href="<?php echo e(asset('assets/admin/images/favicon.png')); ?>" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
   <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.html"><img src="<?php echo e(asset('assets/admin/images/logo.svg')); ?>" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo e(asset('assets/admin/images/logo-mini.svg')); ?>" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown mr-1">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
             <?php if(Auth::check()): ?>
                <?php 
                  $id = 8;
                  $admin = App\Admin::find(1);
                  $notif_count = $admin->unreadNotifications->count();
                  $notifications = DB::table('admin_notifications')->where('notifiable_id',$id)->where('read_at',NULL)->orderBy('created_at','desc')->get();
                ?>
              <i class="mdi mdi-bell mx-0"></i>
              <?php if($notif_count != 0): ?><span class="count"><?php echo e($notif_count); ?></span><?php endif; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifikasi</p>
              <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $notif->data; ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <a href="/admin/marknotifadmin" class="btn btn-block" style="background-color: #ffd8ca; color: green;">Baca Semua</a>
            </div>
            <?php endif; ?>
          </li>
          <li class="nav-item dropdown mr-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-message-text mx-0"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Cek Pesanan</p>
              <a class="dropdown-item" href="admin/order/new">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="mdi mdi-new-box mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Pesanan Baru</h6>
                </div>
              </a>
              <a class="dropdown-item" href="admin/order/process">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="mdi mdi-truck mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Pesanan Diproses</h6>
                </div>
              </a>
              <a class="dropdown-item" href="admin/order/success">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="mdi mdi-checkbox-marked-circle-outline mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Pesanan Sampai</h6>
                </div>
              </a>
              <a class="dropdown-item" href="admin/order/cancel">
                <div class="item-thumbnail">
                  <div class="item-icon bg-danger">
                    <i class="mdi mdi-block-helper mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Pesanan Dibatalkan</h6>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php echo e(Auth::user()->name); ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
             <a href="<?php echo e(url('/admin/logout')); ?>" class="dropdown-item"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout text-primary"></i> Logout</a>
                    <form id="logout-form" action="<?php echo e(url('/admin/logout')); ?>" method="GET" style="display: none;">
                    <?php echo csrf_field(); ?>
                    </form> 
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/admin">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Master Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('products.index')); ?>">Produk</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('categories.index')); ?>">Kategori</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo e(route('couriers.index')); ?>">Kurir</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
<?php echo $__env->yieldContent('content'); ?>
  <script src="<?php echo e(asset('assets/admin/vendors/base/vendor.bundle.base.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/js/off-canvas.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/js/hoverable-collapse.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/js/template.js')); ?>"></script>
</body>
</html><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/layouts/table.blade.php ENDPATH**/ ?>