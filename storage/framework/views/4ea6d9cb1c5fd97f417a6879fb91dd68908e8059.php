<?php $__env->startSection('judul','Admin | Cek Order Page'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List Order <?php echo e($status); ?></h4>
                  <?php if($message = Session::get('notif')): ?>
                    <div class="alert alert-danger alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong><?php echo e($message); ?></strong>
                    </div>
                  <?php endif; ?>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                         Tanggal Transaksi
                          </th>
                          <th>
                            Nama User
                          </th>
                          <th>
                            Alamat
                          </th>
                          <th>
                            Total
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><?php echo e($transaction->created_at); ?></td>
                          <td><?php echo e($transaction->name); ?></td>
                          <td><?php echo e($transaction->address); ?></td>
                          <td>Rp. <?php echo e($transaction->total); ?></td>
                          <td><?php echo e($transaction->status); ?></td>
                          <td>
                              <a class="btn-sm btn-info" href="cek/<?php echo e($transaction->id); ?>"><i class="mdi mdi-eye"></i></a>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                    <?php echo $transactions->links(); ?>

                  </div>
                </div>
              </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.detail_transaksi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/admin/cek_order.blade.php ENDPATH**/ ?>