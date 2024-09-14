<!DOCTYPE html>
<html lang="en">


<?php echo $__env->make("admin.pages.head", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
  <div class="container-scroller d-flex">
    <?php echo $__env->make("admin.pages.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_navbar.html -->
      <?php echo $__env->make('admin.pages.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">


                  <h1 class="card-title mb-5">Ajouter un Appartement</h1>

                  <h4>
                    <button class="btn btn-info"> Ajouter un nouvel immeuble </button>
                  </h4>

                  <div class="table-responsive">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>

                      <div class="my-3">
                        <label for="immeuble" class="form-label">Selectionner un Immeuble existant</label>
                        <select class="form-select" name="immeuble_id" id="immeuble"
                          aria-label="Selectionner un immeuble">
                          <?php $__currentLoopData = $immeubles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="type_de_bail" class="form-label">Type de bail</label>
                        <select class="form-select" name="type_de_bail" id="type_de_bail">
                          <option value="Appartement">Appartement</option>
                          <option value="Bureau">Bureau</option>
                          <option value="Studio">Studio</option>
                          <option value="Commerce">Commerce</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="nbr_piece" class="form-label">Nombre de pièce</label>
                        <input type="number" max="10" name="nbr_piece" class="form-control" id="nbr_piece" placeholder="3">
                      </div>

                      <div class="mb-3">
                        <label for="montant" class="form-label">Montant de la caution</label>
                        <input type="number" name="montant_caution" class="form-control" id="montant" placeholder="100000">
                      </div>

                <button type="submit" class="btn btn-info">Enregistrer</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>




          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                  bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                    href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                    templates</a> from Bootstrapdash.com</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>

    <!-- Button trigger modal -->






    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
    <?php endif; ?>

    <!-- page-body-wrapper ends -->
  <?php echo $__env->make("admin.pages.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/bien/store.blade.php ENDPATH**/ ?>