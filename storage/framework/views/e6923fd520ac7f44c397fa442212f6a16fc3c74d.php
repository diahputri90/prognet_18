<?php $__env->startSection('judul','Admin | Produk Page'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List Produk</h4>
                  <span>
                  <button type="button" class="btn-sm btn-success btn-icon-text" onclick="">
                      <i class="mdi mdi-upload btn-icon-prepend"></i>     
                      <a href="<?php echo e(route('products.create')); ?>" style="color: white;">Tambah Produk</a>
                  </button>
                  <button type="button" class="btn-sm btn-danger btn-icon-text" onclick="" style="margin: 10px">
                      <i class="mdi  mdi-delete btn-icon-prepend"></i>
                      <a href="/products-trash" style="color: white">Trash</a>
                  </button>
                  </span>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>
                            No
                          </th>
                          <th>
                         Nama Produk
                          </th>
                          <th>
                            Stock
                          </th>
                          <th>
                            Harga
                          </th>
                          <th>
                            Kategori
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($loop->iteration); ?></td>
                          <td><?php echo e($product->product_name); ?></td>
                          <td><?php echo e($product->stock); ?></td>
                          <td><?php echo e($product->price); ?></td>
                          <td> <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($product->id == $category->product_id): ?>
                                    <li><?php echo e($category->category_name); ?></li>
                                  <?php endif; ?>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </td>
                          <td>
                              <a class="btn-sm btn-success" href="<?php echo e(route('discounts.show', $product->id)); ?>"><i class="mdi mdi-cash-usd "></i></a>
                              <a class="btn-sm btn-info" href="<?php echo e(route('products.show',$product->id)); ?>"><i class="mdi mdi-eye"></i></a>
    
                              <a class="btn-sm btn-warning" href="<?php echo e(route('products.edit',$product->id)); ?>"><i class="mdi mdi-pencil"></i></a>
                              
                              <a class="btn-sm btn-danger" href="/products/delete/<?php echo e($product->id); ?>" onclick="return confirm('Apa yakin ingin menghapus data ini?')"><i class="mdi mdi-delete"></i></a>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                    <?php echo $products->links(); ?>

                  </div>
                </div>
              </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/product/home.blade.php ENDPATH**/ ?>