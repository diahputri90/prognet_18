<?php $__env->startSection('judul','Admin | Diskon Produk Page'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-11 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List Diskon <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($products->product_name); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></h4>
                  <?php if ($max_date < date('Y-m-d')|| is_null($max_date)):?>
                    <span>
                  <button type="button" class="btn-sm btn-success btn-icon-text" onclick="">
                      <i class="mdi mdi-upload btn-icon-prepend"></i>     
                      <a href="/discounts/add/<?php echo e($id); ?>" style="color: white;">Tambah Diskon</a>
                  </button>
                  </span>
                <?php endif; ?>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                            Diskon (%)
                          </th>
                          <th>
                            Mulai Berlaku
                          </th>
                          <th>
                            Akhir Berlaku
                          </th>
                          <th>
                            Keterangan
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><?php echo e($discount->percentage); ?></td>
                          <td><?php echo e($discount->start); ?></td>
                          <td><?php echo e($discount->end); ?></td>
                          <td>
                            <?php if ($discount->end < date('Y-m-d')) {
                                echo "Masa Berlaku Habis";
                            }     else{
                                echo "Masih Berlaku";
                            } ?>
                          </td>
                          <td>
                              <a class="btn-sm btn-warning" href="<?php echo e(route('discounts.edit',$discount->id)); ?>"><i class="mdi mdi-pencil"></i></a>
                              
                              <a class="btn-sm btn-danger" href="/discounts/delete/<?php echo e($discount->id); ?>" onclick="return confirm('Apa yakin ingin menghapus data ini?')"><i class="mdi mdi-delete"></i></a>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                    <?php echo $discounts->links(); ?>

                  </div>
                </div>
              </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/discount/home.blade.php ENDPATH**/ ?>