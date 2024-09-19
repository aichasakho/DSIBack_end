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

                  <h1 class="card-title mb-5">Ajouter un nouveau terrain</h1>

                  <div class="table-responsive">
                    <form action="<?php echo e(route('store.terrain')); ?>" method="POST" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="agent_id" value="<?php echo e(Auth::user()->id); ?>">
                      <div class="my-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image" value="<?php echo e(old('image')); ?>"
                          placeholder="image">
                      </div>

                      <div class="mb-3">
                        <label for="superficie" class="form-label">Superficie</label>
                        <input type="number" max="1000" name="superficie" class="form-control" id="superficie"
                               placeholder="3">
                      </div>

                      <div class="my-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" name="prix" class="form-control" value="<?php echo e(old('prix')); ?>" id="prix"
                          placeholder="100000">
                      </div>

                      
                      <div class="my-3">
                        <label for="proprietaire" class="form-label">
                          Selectionner proprietaire
                        </label>
                        <select class="form-select" name="proprietaire_id" id="proprietaire"
                          aria-label="Selectionner un proprietaire">
                          <?php $__currentLoopData = $proprietaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proprio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($proprio->id); ?>">
                            <?php echo e($proprio->nom); ?> <?php echo e($proprio->prenoms); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="prix_achat" class="form-label">Prix d'achat</label>
                        <input type="number" name="prix_achat" class="form-control" id="prix_achat"
                               placeholder="100000">
                      </div>


                      <input type="hidden" name="type_bien_id" value="4">

                      
                      <div class="mb-3">
                        <label for="localite" class="form-label">Selectionner une localite</label>
                        <select class="form-select" name="localite_id" id="localite"
                          aria-label="Selectionner une localite">
                          <?php $__currentLoopData = $localites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($localite->id); ?>">
                            <?php echo e($localite->ville); ?> <?php echo e($localite->quartier); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/terrain/add.blade.php ENDPATH**/ ?>