<?php $__env->startSection('judul','Admin | Edit Produk Page'); ?>
<?php $__env->startSection('content'); ?>
<div style="margin-top:50px ">
    <div class="container">
        <div class="row align-items-centre">
            <div class="col-lg-2">
            </div>
            <div class="col-md-8">
                <div class="component">
                    <div class="card">
                        <form class="form-signin" action="<?php echo e(route('products.update', $products->id)); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>

                        <div class="card-header">
                            <center>
                                <span>Edit Produk</span>
                            </center>
                        </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" placeholder="Nama Produk" value="<?php echo e($products->product_name); ?>" aria-label="Nama Produk" aria-describedby="basic-addon1" name="product_name">
                        </div>
                        <div class="form-group">
                            <label>Harga Satuan</label>
                            <input type="text" class="form-control" placeholder="Harga Satuan" value="<?php echo e($products->price); ?>" aria-label="Harga Satuan" aria-describedby="basic-addon1" name="price">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Produk</label>
                            <input type="text" class="form-control" placeholder="Deskripsi Produk" value="<?php echo e($products->description); ?>"  aria-label="Deskripsi Produk" aria-describedby="basic-addon1" name="description">
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="text" class="form-control" placeholder="Stock" aria-label="Stock" value="<?php echo e($products->stock); ?>" aria-describedby="basic-addon1" name="stock">
                        </div>
                        <div class="form-group">
                            <label>Berat Produk</label>
                            <input type="text" class="form-control" placeholder="Berat Produk" aria-label="Berat Produk" value="<?php echo e($products->weight); ?>"  aria-describedby="basic-addon1" name="weight">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="category">
                                <option value="Anak-Anak" <?php if($products->category == "Anak-Anak"): ?> selected="selected" <?php endif; ?>>Anak-Anak</option>
                                <option value="Pria" <?php if($products->category == "Pria"): ?> selected="selected" <?php endif; ?>>Pria</option>
                                <option value="Wanita" <?php if($products->category == "Wanita"): ?> selected="selected" <?php endif; ?>>Wanita</option>
                            </select>
                        </div>
<!--                         <div class="form-group">
                            
                            <select class="form-control" name="category_id[]" multiple="multiple">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($detail->category_id == $category->id ? 'selected' : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($category->category_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div> -->
                    </div>
                        <div class="card-footer">
                            <button class="btn btn-md btn-outline-success" type="submit"  onclick="return confirm('Apa yakin ingin mengubah data ini?')">Edit</button>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/product/edit.blade.php ENDPATH**/ ?>