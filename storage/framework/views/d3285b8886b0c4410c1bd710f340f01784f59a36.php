<?php $__env->startSection('judul','Admin | Kategori Page'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List Kategori</h4>
                  <button type="button" class="btn-sm btn-success btn-icon-text" onclick="/createProduct">
                          <i class="mdi mdi-upload btn-icon-prepend"></i>     
                          <a href="<?php echo e(route('categories.create')); ?>" style="color: white;">Tambah Kategori</a>
                  </button>
                  <button type="button" class="btn-sm btn-danger btn-icon-text" onclick="">
                      <i class="mdi  mdi-delete btn-icon-prepend"></i>
                      <a href="/categories-trash" style="color: white">Trash</a>
                  </button>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            <th>No</th>
                            Nama Kategori
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $product_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><?php echo e($category->category_name); ?></td>
                          <td>
                              <a class="btn-sm btn-info" href="<?php echo e(route('categories.show',$category->id)); ?>"><i class="mdi mdi-eye"></i></a>
    
                              <a class="btn-sm btn-warning" href="<?php echo e(route('categories.edit',$category->id)); ?>"><i class="mdi mdi-pencil"></i></a>
                              
                              <a class="btn-sm btn-danger" href="/categories/delete/<?php echo e($category->id); ?>" onclick="return confirm('Apa yakin ingin menghapus data ini?')"><i class="mdi mdi-delete"></i></a>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                    <?php echo $product_categories->links(); ?>

                  </div>
                </div>
              </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/category/home.blade.php ENDPATH**/ ?>