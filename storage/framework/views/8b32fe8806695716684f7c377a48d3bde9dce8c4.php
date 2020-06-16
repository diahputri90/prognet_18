<?php $__env->startSection('judul','Admin | Detail Kurir Page'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Detail Kurir</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td>Nama Kurir</td>
                          <td><?php echo e($courier->courier); ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <button type="button" class="btn btn-warning btn-icon-text" onclick="/createProduct">
                          <i class="mdi mdi-file-restore btn-icon-prepend"></i>     
                          <a href="<?php echo e(route('couriers.edit', $courier->id)); ?>" style="color: white;">Edit Kurir</a>
                  </button>
                  </div>
                </div>
              </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/courier/show.blade.php ENDPATH**/ ?>