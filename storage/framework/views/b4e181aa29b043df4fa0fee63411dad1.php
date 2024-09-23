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
          <?php if($errors->any()): ?>
          <div class="alert alert-danger">
            <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
          <?php endif; ?>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h1 class="card-title mb-5">Modifier une parcelle</h1>

                  <h4>
                    <a href="<?php echo e(route('add.terrain')); ?>">
                      <button class="btn btn-info"> Ajouter un nouveau terrain </button>
                    </a>
                  </h4>

                  <div class="table-responsive">
                    <form action="<?php echo e(route('parcelle.update', $parcelle)); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                      <div class="my-3">
                        <label for="terrain" class="form-label">Selectionner un Terrain existant</label>
                        <select class="form-select" name="bien_immobilier_id" id="terrain"
                          aria-label="Selectionner un terrain">
                          <option value="<?php echo e($parcelle?->bienImmobilier?->id); ?>" selected>
                            <?php echo e($parcelle?->bienImmobilier?->proprietaire->nom); ?>

                            <?php echo e($parcelle?->bienImmobilier?->proprietaire->prenom); ?> -
                            <?php echo e($parcelle?->bienImmobilier?->superficie); ?> - <?php echo e($parcelle?->bienImmobilier?->id); ?>

                          </option>
                          <?php $__currentLoopData = $terrains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $terrain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($terrain->id); ?>">
                            Terrain <?php echo e($terrain->proprietaire->nom); ?> <?php echo e($terrain->proprietaire->prenom); ?>

                            - <?php echo e($terrain->superficie); ?> - <?php echo e($terrain->id); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="superficie" class="form-label">Superficie</label>
                        <input type="number" max="1000" name="superficie" class="form-control"
                          value="<?php echo e(old('superficie', $parcelle->superficie)); ?>" id="superficie" placeholder="3">
                      </div>

                      <div class="mb-3">
                        <label for="numero_parcelle" class="form-label">Numero de parcelle</label>
                        <input type="number" max="1000" name="numero_parcelle" class="form-control"
                          value="<?php echo e(old('numero_parcelle', $parcelle->numero_parcelle)); ?>" id="numero_parcelle"
                          placeholder="3">
                      </div>

                      <button type="submit" class="btn btn-info">Modifier</button>
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



    <!-- page-body-wrapper ends -->
    <?php echo $__env->make("admin.pages.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/parcelle/edit.blade.php ENDPATH**/ ?>