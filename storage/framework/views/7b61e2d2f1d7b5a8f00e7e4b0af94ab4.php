<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Djibril Sakho Immobilier</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/mdi/css/materialdesignicons.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/css/vendor.bundle.base.css')); ?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo e(asset('/admin/css/style.css')); ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo e(asset('admin/images/favicon.png')); ?>" />
</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo" style="text-align: center;">
                <img src="../../admin/images/logo.png" alt="logo" style="width: 100px;  height: auto; display: inline-block">
              </div>
              <h4 class="text-center">INSCRIPTION</h4>

              <form class="pt-3" action="<?php echo e(route('doRegister.register')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                  <div class="form-group">
                      <input type="text" name="prenom" class="form-control form-control-lg" id="exampleInputPrenom1" placeholder="Prenom">
                  </div>
                  <div class="form-group">
                      <input type="text" name="nom" class="form-control form-control-lg" id="exampleInputNom1" placeholder="Nom">
                  </div>

                  <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>

                  <div class="form-group">
                      <input type="password" name="confirmePassword" class="form-control form-control-lg" id="exampleInputConfirmePassword1" placeholder="ConfirmePassword">
                  </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >S'inscrire</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Vous avez un compte? <a href="<?php echo e(route('admin.login')); ?>" class="text-primary">Se connecter</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="<?php echo e(asset('/admin/vendors//admin/js/vendor.bundle.base.js')); ?>"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo e(asset('/admin/js/off-canvas.js')); ?>"></script>
  <script src="<?php echo e(asset('/admin/js/hoverable-collapse.js')); ?>"></script>
  <script src="<?php echo e(asset('/admin/js/template.js')); ?>"></script>
  <!-- endinject -->
</body>

</html>
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/account/register.blade.php ENDPATH**/ ?>