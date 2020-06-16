<?php $__env->startSection('judul','Admin | Login Page'); ?>
<?php $__env->startSection('content'); ?>
<div style="margin-top:150px ">
    <div class="container">
        <div class="row align-items-centre">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="component">
                    <div class="card">
                        <form action="<?php echo e(route('admin.login.submit')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                        <div class="card-header">
                            <center>
                                <span>ADMIN LOGIN</span>
                            </center>
                        </div>
                        <br>
                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username">
                        </div>
                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                            </div>
                                <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password">
                        </div>
                        <br>
                    </div>
                        <div class="card-footer">
                            <button class="btn btn-md btn-outline-primary" type="submit">LOGIN</button>
                        </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </form>
                        <?php if(session('alert')): ?>
                    <div class="d-flex justify-content-center mt-2 d-inline alert alert-danger">
                        <?php echo e(session('alert')); ?>

                    </div>
                <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Kuliah\SMESTER 4\PRAKTIKUM\PROGNET\ulang\praktikum_prognet-master\resources\views/auth/admin-login.blade.php ENDPATH**/ ?>