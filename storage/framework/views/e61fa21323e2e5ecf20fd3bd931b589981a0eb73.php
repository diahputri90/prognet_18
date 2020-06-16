<?php $__env->startSection('judul','User | Checkout Page'); ?>
<?php $__env->startSection('content'); ?>
 <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(assets/user/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-7">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title">Detail Pesanan</h5>
                        </div>

                        <form action="<?php echo e(route('transactions.store')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="col-md-12 mb-2">
                                    <label for="first_name">Nama <span>*</span></label>
                                    <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="country">Provinsi <span>*</span></label>
                                    <select class="w-100 form-control" name="province_destination">
                                        <option>--Provinsi--</option>
                                        <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($province); ?>"><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="country">Kabupaten <span>*</span></label>
                                    <select class="w-100 form-control" name="city_destination">
                                        <option>--Kabupaten/Kota--</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="country">Kurir <span>*</span></label>
                                    <select class="w-100 form-control" name="courier">
                                        <option>--Kurir--</option>
                                        <?php $__currentLoopData = $couriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courier => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($courier); ?>"><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="country">Paket <span>*</span></label>
                                    <select class="w-100 form-control" name="paket">
                                        <option>--Pilih Paket--</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label id="btn-calculate" class="btn btn-md btn-info">Kalkulasi Ongkir</label>
                                </div>
                                <?php $weight = 0; ?>
                                <?php $total = 0; ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                            $price =  $product->price;
                                            $diskon = 0;
                                        ?>
                                        <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($discount->id_product == $product->id): ?>
                                                <?php 
                                                    $diskon = $discount->percentage;
                                                 ?>
                                                 <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $sub_total = ($price-($price*$diskon/100))*$product->qty;?>

                                    <?php
                                        $total = $total + $sub_total; 
                                        $weight = $weight + $product->weight;
                                     ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" name="subtotal" value="<?php echo e($total); ?>">
                                <div class="col-12 mb-3">
                                    <label for="postcode">Berat Pesanan (gram)<span>*</span></label>
                                    <input type="text" class="form-control" id="weight" value="<?php echo e($weight); ?>" name="weight" readonly="">
                                </div>
                                 <div class="col-12 mb-3">
                                    <label for="postcode">Ongkir<span>*</span></label>
                                    <input type="text" class="form-control" id="ongkir" value="0" name="ongkir" readonly="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input type="text" class="form-control mb-3" name="address" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="postcode">Postcode <span>*</span></label>
                                    <input type="text" class="form-control" id="postcode" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">No Telepon <span>*</span></label>
                                    <input type="text" class="form-control" name="no_tlp">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email <span>*</span></label>
                                    <input type="email" class="form-control" name="email_address" value="<?php echo e($user->email); ?>">
                                </div>
                                <div class="col-12 mb-3">
                                    <button type="submit" class="btn btn-md btn-success" onclick="return confirm('Apa yakin ingin membeli semua produk ini?')">Bayar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title">Daftar Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table-order">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Jumlah</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <?php $total = 0; ?>
                                    <?php $qty = 0; ?>
                                    <tbody>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php 
                                            $price =  $product->price;
                                            $diskon = 0;
                                        ?>
                                        <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($discount->id_product == $product->id): ?>
                                                <?php 
                                                    $diskon = $discount->percentage;
                                                 ?>
                                                 <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $subtotal = ($price-($price*$diskon/100))*$product->qty;?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($product->product_name); ?></td>
                                            <td><?php echo e($product->qty); ?></td>
                                            <td>Rp. <?php echo e($subtotal); ?></td>
                                        </tr>
                                        <?php $total = $total + $subtotal; ?>
                                        <?php $qty = $qty + $product->qty; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Ongkir</td>
                                            <td>*</td>
                                            <td>*</td>
                                            <td><span>Rp.</span><span id="ongkir_">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>*</td>
                                            <td><?php echo e($qty); ?></td>
                                            <td><span>Rp.</span><span id="total"><?php echo e($total); ?></span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <br>
                                <form action="/checkout/cancel/<?php echo e(Auth::user()->id); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apa yakin ingin membatalkan pesanan ini?')">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('select[name=province_destination]').on('change', function(){
                let provinceId = $(this).val();
                if (provinceId) {
                    jQuery.ajax({
                        url: '/province/'+provinceId+'/cities',
                        type : "GET",
                        dataType : "json",
                        success: function(data){
                            $('select[name="city_destination"]').empty();
                            $.each(data, function(key, value){
                                $('select[name=city_destination]').append('<option value="'+ key + '">'+ value + '</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="city_destination"]').empty();
                }
            });
        });
        /*$(document).ready(function(){
            $('select[name=courier]').on('change', function(){
                let courier = $(this).val();
                if (courier == 'jne') {
                    $('select[name=paket]').append('<option value="0">OKE</option>');
                    $('select[name=paket]').append('<option value="1">REG</option>');
                    $('select[name=paket]').append('<option value="2">YES</option>');
                }
            });
        });*/
    </script>
     <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#btn-calculate").click(function(e){

        e.preventDefault();

        var city_id = $("select[name=city_destination]").val();
        var courier = $("select[name=courier]").val();
        var paket = $("select[name=paket]").val();
        var weight = $("input[name=weight]").val();
        var url = '/destination/cost';
        var total = <?php echo e($total); ?>;
        $.ajax({
           url:url,
           type:'GET',
           dataType: "json",
           data:{
                  city_id:city_id, 
                  weight:weight,
                  courier:courier,
                  paket:paket
                },
           success:function(response){
              $('input[name="ongkir"]').val(response.ongkir);
              $('#ongkir_').html(response.ongkir);
              var total_ = response.ongkir + total;
              $('#total').html(total_);
           },
        });
    });
     $("select[name=courier]").change(function(e){

        e.preventDefault();

        var city_id = $("select[name=city_destination]").val();
        var courier = $("select[name=courier]").val();
        var paket = $("select[name=paket]").val();
        var weight = $("input[name=weight]").val();
        var url = '/destination/service';
        $.ajax({
           url:url,
           type:'GET',
           dataType: "json",
           data:{
                  city_id:city_id, 
                  weight:weight,
                  courier:courier,
                },
           success:function(response){
                $('select[name="paket"]').empty();
                for (var i = 0; i < response.ongkir.length; i++) {
                    $('select[name=paket').append('<option value="'+ i + '">'+ response.ongkir[i]['service'] + '</option>');
                }
           },
           error:function(){
                alert("EROR");
           }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/user/checkout.blade.php ENDPATH**/ ?>