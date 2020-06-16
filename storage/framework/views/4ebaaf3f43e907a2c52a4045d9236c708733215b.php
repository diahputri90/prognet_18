<?php $__env->startSection('judul','Admin | Detail Pembayaran Page'); ?>
<?php $__env->startSection('content'); ?>
<div style="margin-top:50px ">
    <div class="container">
        <div class="row align-items-centre">
            <div class="col-lg-2">
            </div>
            <div class="col-md-8">
                <div class="component">
                    <div class="card">
                        <form class="form-signin" action="/order/update/<?php echo e($transaction->id); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>

                        <div class="card-header">
                            <center>
                                <span>Detail Transaksi Pembayaran</span>
                            </center>
                        </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Pemesan</label>
                            <input type="text" class="form-control" placeholder="Nama Produk" value="<?php echo e($transaction->name); ?>" aria-label="Nama Produk" aria-describedby="basic-addon1" name="name" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pemesanan</label>
                            <input type="date" class="form-control" placeholder="Harga Satuan" value="<?php echo e($transaction->created_at); ?>" aria-label="Harga Satuan" aria-describedby="basic-addon1" name="date_order" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Sub Total</label>
                            <input type="text" class="form-control" placeholder="Deskripsi Produk" value="<?php echo e($transaction->sub_total); ?>"  aria-label="Deskripsi Produk" aria-describedby="basic-addon1" name="sub_total" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Ongkos Kirim</label>
                            <input type="text" class="form-control" placeholder="Stock" aria-label="Stock" value="<?php echo e($transaction->shipping_cost); ?>" aria-describedby="basic-addon1" name="ongkir" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Total</label>
                            <input type="text" class="form-control" placeholder="Berat Produk" aria-label="Berat Produk" value="<?php echo e($transaction->total); ?>"  aria-describedby="basic-addon1" name="total" readonly="">
                        </div>
                        <?php if($transaction->status == 'expired' || $transaction->status == 'canceled'): ?>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" placeholder="Berat Produk" aria-label="Berat Produk" value="<?php echo e($transaction->status); ?>"  aria-describedby="basic-addon1" name="total" readonly="">
                        </div>
                        <?php else: ?>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="unverified" <?php if($transaction->status == "unverified"): ?> selected="selected" <?php endif; ?>>Unverified</option>
                                <option value="verified" <?php if($transaction->status == "verified"): ?> selected="selected" <?php endif; ?>>Verified</option>
                                <option value="delivered" <?php if($transaction->status == "delivered"): ?> selected="selected" <?php endif; ?>>Delivered</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>
                        <?php endif; ?>
                    </div>
                        <div class="card-footer">
                            <span><button class="btn btn-md btn-success" type="submit"  onclick="return confirm('Apa yakin ingin mengubah status pembayaran?')" style="margin-right: 20px;">Edit</button></span><span><a href="<?php echo e(URL::to( '/image/proof_of_payment/'.$transaction->proof_of_payment)); ?>" target="_blank" class="btn btn-info">Lihat Bukti Pembayaran</a></span>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/admin/edit_status_order.blade.php ENDPATH**/ ?>