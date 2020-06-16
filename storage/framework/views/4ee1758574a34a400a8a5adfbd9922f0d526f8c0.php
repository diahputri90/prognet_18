<?php $__env->startSection('judul','Admin | Tambah Diskon Page'); ?>
<?php $__env->startSection('content'); ?>
<div style="margin-top:50px ">
    <div class="container">
        <div class="row align-items-centre">
            <div class="col-lg-2">
            </div>
            <div class="col-md-8">
                <div class="component">
                    <div class="card">
                        <form class="form-signin" action="<?php echo e(route('discounts.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                        <div class="card-header">
                            <center>
                                <span>Tambah Diskon</span>
                            </center>
                        </div>
                    <div class="card-body">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" aria-label="Nama Produk" aria-describedby="basic-addon1" name="id_product" value="<?php echo e($product->id); ?>" readonly="readonly" hidden="hidden">
                        </div>
                        <div class="form-group">
                            <label>Nama Product</label>
                            <input type="text" class="form-control" aria-label="Nama Produk" aria-describedby="basic-addon1" name="product_name" value="<?php echo e($product->product_name); ?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" aria-label="Harga" aria-describedby="basic-addon1" name="product_name" value="<?php echo e($product->price); ?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Besar Diskon</label>
                            <input type="text" class="form-control" placeholder="Besar Diskon" aria-label="Nama Produk" aria-describedby="basic-addon1" name="percentage">
                        </div>
                        <div class="form-group">
                            <label>Mulai</label>
                            <input type="date" class="form-control" aria-label="Mulai" aria-describedby="basic-addon1" name="start">
                        </div>
                        <div class="form-group">
                            <label>Berakhir</label>
                            <input type="date" class="form-control" aria-label="Berakhir" aria-describedby="basic-addon1" name="end">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-footer">
                            <button class="btn btn-md btn-outline-success" type="submit">Tambah</button>
                        </div>
                        </form>
                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/discount/create.blade.php ENDPATH**/ ?>