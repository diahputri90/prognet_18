<?php $__env->startSection('judul','User | Detail Keranjang Page'); ?>
<?php $__env->startSection('content'); ?>
<?php $total = 0; ?>
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($message = Session::get('notif')): ?>
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong><?php echo e($message); ?></strong>
      </div>
    <?php endif; ?>
<section class="single_product_details_area d-flex align-items-center">
        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product-img" style="height: 65%; width: 65%;">
                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->product_id==$product->id): ?>
                        <img src="/image/product_image/<?php echo e($item->image_name); ?>" alt="">
                        <?php break; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
            <?php 
                $diskon = 0;
                $price = $product->price;
             ?>
             <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($discount->id_product==$product->id && $discount->end > @date('Y-m-d')): ?>
                    <?php 
                        $diskon = $discount->percentage;
                        $price = $price - ($price*$diskon/100);
                    ?>
                    <?php break; ?>
                <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php $total = $total + ($price * $product->qty); ?>
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Keranjang</h5>
                        </div>
                        <form action="<?php echo e(route('carts.update', $product->cart_id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                                <ul class="order-details-form mb-4">
                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                    <li><span>Nama Produk</span> <span><?php echo e($product->product_name); ?></span></li>
                                    <li><span>Harga Satuan</span> <span>Rp. </span><input type="text" name="price" id="price-<?php echo e($product->id); ?>" value="<?php echo e($price); ?>" style="width: 35%;" class="form-control" readonly=""></li>
                                    <li><span>Diskon</span> <span><?php echo e($diskon); ?>%</span></li>
                                    <li><label>Banyak Item</label><input id="qty-<?php echo e($product->id); ?>" type="text" name="qty" value="<?php echo e($product->qty); ?>" class="form-control" style="width: 20%;"></li>
                                    <li><span>Sub Total</span> <span id="sub-total-<?php echo e($product->id); ?>"><?php echo e($price*$product->qty); ?></span></li>
                                </ul>
                                <button type="submit" class="btn essence-btn" onclick="return confirm('Apa yakin ingin mengubah keranjang?')">Edit Keranjang</button>
                                <button style="margin-left: 50px;" class="btn essence-btn" onclick="return confirm('Apa yakin ingin menghapus produk dari keranjang?')"><a href="/carts/delete/<?php echo e($product->cart_id); ?>" style="color: white;">Hapus Produk</a></button>
                        </form>
                    </div>
                </div>
<script>
    $(document).ready(function(){
      var total = 0;
      $('#qty-<?php echo e($product->id); ?>').keyup(function(){
          var qty = $('#qty-<?php echo e($product->id); ?>').val();
          var total_ = parseInt($('#total').text());
          var price = $('#price-<?php echo e($product->id); ?>').val();
          var sub_total = parseInt($('#sub-total-<?php echo e($product->id); ?>').val());
          total = qty * price;
          var total_calcu = total_ - sub_total + total;
          $('#sub-total-<?php echo e($product->id); ?>').html(total);
          $('#total').html(total);
      });
      $()
    });
</script>

    </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- ##### Single Product Details Area End ##### -->
<div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
    <div class="order-details-confirmation">
        <ul class="order-details-form">
            <li>
                <span><h5>Total : </h5>
            </li>
            <li>
                <h5>Rp.</h5><span><h5 id="total"><?php echo e($total); ?></h5></span>
            </li>
            <form action="/carts/checkout/<?php echo e(Auth::user()->id); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <button type="submit" class="btn essence-btn" id="btn-checkout" style="margin-top: 30px; margin-left: 142px;" onclick="return confirm('Apa yakin ingin memesan semua produk ini?')">Check Out</button>
            </form>
        </ul>   
    </div>
</div>
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Payment Options</a></li>
                            <li><a href="#">Shipping and Delivery</a></li>
                            <li><a href="#">Guides</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row align-items-end">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_heading mb-30">
                            <h6>Subscribe</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Your email here">
                                <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/user/cart.blade.php ENDPATH**/ ?>