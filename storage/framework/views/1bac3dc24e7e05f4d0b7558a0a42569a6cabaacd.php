<?php $__env->startSection('judul','Admin | Produk Page'); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">List Produk</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td>Nama Produk</td>
                          <td><?php echo e($products->product_name); ?></td>
                        </tr>
                        <tr>
                          <td>Rating Produk</td>
                          <td><?php echo e($products->product_rate); ?></td>
                        </tr>
                        <tr>
                          <td>Stock</td>
                          <td><?php echo e($products->stock); ?></td>
                        </tr>
                        <tr>
                          <td>Berat</td>
                          <td><?php echo e($products->weight); ?></td>
                        </tr>
                        <tr>
                          <td>Harga</td>
                          <td><?php echo e($products->price); ?></td>
                        </tr>
                        <tr>
                          <td>Deskripsi</td>
                          <td><?php echo e($products->description); ?></td>
                        </tr>
                        <tr>
                          <td>Jenis Kategori</td>
                          <td>
                            <?php echo e($products->category); ?>

                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                    <span>
                    <button type="button" class="btn btn-warning btn-icon-text" onclick="/createProduct">    
                          <a href="<?php echo e(route('products.edit',$products->id)); ?>" style="color: white;"><i class="mdi mdi-lead-pencil btn-icon-prepend"></i> </a>
                  </button>
                  <button type="button" class="btn btn-success btn-icon-text" onclick="/addImage/<?php echo e($products->id); ?>">
                          <a href="/addImage/<?php echo e($products->id); ?>" style="color: white;"><i class="mdi mdi-image-area btn-icon-prepend"></i>     </a>
                  </button>
                  </span>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Kategori Produk</h4>
                  <button class="btn btn-success"><a href="/category_detail/create/<?php echo e($products->id); ?>" style="color: white;">Tambah Kategori</a></button>
                    <div class="container">
                      <div class="table">
                        <table class="table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Kategori</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($category->category_name); ?></td>
                                <td> <a class="btn-sm btn-danger" href="/category_detail/delete/<?php echo e($category->id); ?>" onclick="return confirm('Apa yakin ingin menghapus data ini?')">Delete</a> </td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                    </div>    
                </div>
                </div>
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Review Produk</h4>
                    <div class="container">
                      <div class="table">
                        <table class="table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama User</th>
                              <th>Review</th>
                              <th>Response</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($review->name); ?></td>
                                <td><?php echo e($review->content); ?></td>
                                <td><?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php if($review->id == $response->review_id): ?>
                                        <li><?php echo e($response->content); ?></li>
                                      <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#response-<?php echo e($review->id); ?>">Balas</button></td>
                              </tr>
                              <!-- Modal -->
                                  <div class="modal fade" id="response-<?php echo e($review->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Response Review</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="<?php echo e(route('response.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                              <input type="text" name="" readonly="" value="<?php echo e($review->content); ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                              <label>Respon</label>
                                              <input type="text" name="content" class="form-control" style="width: 80%; margin-right: 20px;" placeholder="Respon review">
                                              <input type="hidden" name="review_id" value="<?php echo e($review->id); ?>">
                                              <input type="hidden" name="admin_id" value="<?php echo e(Auth::user()->id); ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                          <button type="submit" class="btn btn-primary">Kirim</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                      <?php if($message = Session::get('terkirim')): ?>
                        <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button> 
                          <strong><?php echo e($message); ?></strong>
                        </div>
                        <?php endif; ?>
                    </div>    
                </div>
                </div>
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title">Foto Produk</h4>
                    <div class="container">
                      <div class="row">
                       <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                          <div class="thumbnail">
                            <img class="img-fluid-left img-thumbnail" src="/image/product_image/<?php echo e($images->image_name); ?>" alt="light">
                            <form method="post" action="<?php echo e(route('product_images.destroy', $images->id)); ?>">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-icon-text">
                              Delete
                           </button>
                           </form>
                          </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>    
                </div>
                </div>
              </div>
                
            </div>
            
<?php $__env->stopSection(); ?>

    
<?php echo $__env->make('layouts.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/product/show.blade.php ENDPATH**/ ?>