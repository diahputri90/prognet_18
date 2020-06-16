<?php $__env->startSection('judul','User | Invoice Page'); ?>
<?php $__env->startSection('content'); ?>
    <div class="breadcumb_area bg-img" style="background-image: url(assets/user/img/bg-img/breadcumb.jpg); margin-top: 5%">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Invoice</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout_area section-padding-100">
        <div class="container">
            <div class="row">
    		<div class="col-12 col-md-6 col-lg-12 ml-lg-center">
    			<div class="table-responsive">
                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<th>No</th>
                    			<th>Tanggal Memesan</th>
                    			<th>Action</th>
                    		</tr>
                    		<tbody>
                    			<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    			<tr>
                    				<td><?php echo e($loop->iteration); ?></td>
                    				<td><?php echo e($transaction->date_order); ?></td>
                    				<td><a href="/users/invoice/<?php echo e($transaction->id); ?>" class="btn btn-info">Cek</a></td>
                    			</tr>
                    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    		</tbody>
                    	</thead>
                    </table>
                    <?php echo $transactions->links(); ?>

                    </div>
                </div>
               </div>
              </div>
             </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/user/invoice.blade.php ENDPATH**/ ?>