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
            <?php $total = 0; ?>
            <?php $qty = 0; ?>
            <?php $weight = 0; ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Modal -->
            <div class="modal fade" id="review-<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Review Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo e(route('reviews.store')); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <div class="form-group">
                        <label>Produk</label>
                        <input type="text" name="" value="<?php echo e($product->product_name); ?>" readonly="" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Review</label>
                        <input type="text" name="content" class="form-control" style="width: 80%; margin-right: 20px;" placeholder="review produk">
                        <input type="hidden" name="product_id" value="<?php echo e($product->product_id); ?>">
                        <input type="hidden" name="transaction_id" value="<?php echo e($transaction->id); ?>">
                      </div>
                      <label>Rating</label>
                      <div class="form-group">
                        <select name="rate">
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
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
            <div class="row">
    		        <div class="col-12 col-md-6 col-lg-12 ml-lg-center">
                    <div class="order-details-confirmation">
                        <div class="cart-page-heading">
                            <h5>Produk <?php echo e($loop->iteration); ?></h5>
                            <p>Detail</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Nama Produk</span> <span><?php echo e($product->product_name); ?></span></li>
                            <li><span>Jumlah</span> <span><?php echo e($product->qty); ?></span></li>
                            <li><span>Harga</span> <span>Rp. <?php echo e($product->selling_price); ?></span></li>
                            <li><span>Diskon</span> <span><?php echo e($product->discount); ?>%</span></li>
                            <li><span>Berat per item</span> <span><?php echo e($product->weight); ?> gram</span></li>
                            <?php 
                                $subtotal = ($product->selling_price-$product->selling_price*$product->discount/100)*$product->qty;
                                $total = $total+$subtotal;
                                $qty = $qty+$product->qty;
                                $weight = $weight+$product->weight;
                            ?>
                            <li><span>Sub Total</span> <span>Rp. <?php echo e($subtotal); ?></span></li>
                        </ul>
                        <?php 
                            $cek_review = 0;
                            foreach ($reviews as $review) {
                              if ($product->product_id == $review->product_id) {
                                $cek_review=$cek_review+1;
                              }
                            }
                         ?>
                        <?php if($transaction->status == 'success'): ?>
                            <?php if($cek_review == 0): ?>
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#review-<?php echo e($product->id); ?>">Review Barang</button>
                            <?php else: ?>
                              <p>Review Telah dilakukan</p>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button> 
                          <strong><?php echo e($message); ?></strong>
                        </div>
                        <?php endif; ?>
                    </div>
                    <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($transaction->status == 'unverified'): ?>
                    <div class="breadcumb_area bg-img" style="background-image: url(assets/user/img/bg-img/breadcumb.jpg);">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-12">
                                    <div class="page-title text-center">
                                        <h2>Batas Waktu Bayar</h2>
                                        <h3><span id="days">00</span><span> Hari : </span><span id="hours">00</span><span> Jam : </span><span id="minutes">00</span><span> Menit : </span><span id="seconds">00</span><span> Detik</span></h3>
                                        <h3 id="countdown" style="font-style: bold; margin-bottom: 2%; color: red;"></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="order-details-confirmation">
                        <div class="cart-page-heading">
                            <h5>Pembayaran</h5>
                            <p>Detail</p>
                        </div>

                        <ul class="order-details-form mb-4">
                        	<li><span>Status</span><span><?php echo e($transaction->status); ?></span></li>
                            <li><span>Kota Tujuan</span> <span><?php echo e($transaction->regency); ?></span></li>
                            <li><span>Provinsi</span> <span><?php echo e($transaction->province); ?></span></li>
                            <li><span>Biaya Pengiriman</span> <span>Rp. <?php echo e($transaction->shipping_cost); ?></span></li>
                            <li><span>Jumlah Item</span> <span><?php echo e($qty); ?></span></li>
                            <li><span>Berat Total</span> <span><?php echo e($weight); ?> gram</span></li>
                            <li><span>Total</span> <span>Rp. <?php echo e($total+$transaction->shipping_cost); ?></span></li>
                        </ul>
                        
                        <?php if($message = Session::get('notif')): ?>
                        <div class="alert alert-danger alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button> 
                          <strong><?php echo e($message); ?></strong>
                        </div>
                        <?php endif; ?>
                        <br>
                        <?php if($transaction->status=='unverified'): ?>
                        <label>Upload Bukti Pembayaran</label>
                          <form action="/uploadPOP/<?php echo e($transaction->id); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <input type="file" name="proof_of_payment" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-success">Upload</button>
                          </form>
                          <form action="/transactions/cancel/<?php echo e($transaction->id); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <br>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin membatalkan transaksi?')">Batalkan Transaksi</button>
                          </form>
                        <?php elseif($transaction->status == 'delivered'): ?>
                          <label>Barang Sudah Sampai?</label>
                          <form action="/transaction/success/<?php echo e($transaction->id); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <br>
                            <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Barang Sudah Sampai?')">Konfirmasi</button>
                          </form>
                        <?php else: ?>
                            <label style="margin-top: 20px; color: red;">Tidak Dapat Mengupload Bukti</label>
                        <?php endif; ?>
                    </div>
                </div>
               </div>
              </div>
             </div>
    <script>
        var countdown = function(end, elements, callback) {
        var _second = 1000,
            _minute = _second * 60,
            _hour   = _minute * 60,
            _day    = _hour * 24,

        end = new Date(end),
        timer,

      calculate = function() {

        var now = new Date(),
          remaining = end.getTime() - now.getTime(),
          data;

        if(isNaN(end)) {
          console.log('Invalid date/time');
          return;
        }

        if(remaining <= 0) {
          clearInterval(timer);

          if(typeof callback === 'function') {
            callback();
          }

        }else {
          if(!timer) {
            timer = setInterval(calculate, _second);
          }

          data = {
              'days': Math.floor(remaining / _day),
              'hours': Math.floor((remaining % _day) / _hour),
              'minutes': Math.floor((remaining % _hour) / _minute),
              'seconds': Math.floor((remaining % _minute) / _second)
          }
          if(elements.length) {
            for (x in elements) {
              var x = elements[x];
              data[x] = ('00' + data[x]).slice(-2);
              document.getElementById(x).innerHTML = data[x];
            }
          }
          
        }
      };
    calculate();
}   
</script>
<script>
    countdown('<?php echo e($transaction->timeout); ?>', ['days', 'hours', 'minutes', 'seconds'], function() {
        document.getElementById('countdown').innerHTML = "Pembayaran dibatalkan";
      });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/user/invoice_detail.blade.php ENDPATH**/ ?>