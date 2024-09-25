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

                <h1 class="card-title mb-5">Ajouter un reglement</h1>

                <div class="table-responsive">
                  <form action="<?php echo e(route('reglement.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>


                    <div class="mb-3">
                      <label for="numero_reglement" class="form-label">N°reglement</label>
                      <input type="text" name="numero_reglement" class="form-control" id="numero_reglement"
                             placeholder="">
                    </div>

                    <div class="mb-3">
                      <label for="date_reglement" class="form-label">Date règlement</label>
                      <input type="date" name="date_reglement" class="form-control" id="date_reglement"
                             placeholder="">
                    </div>

                    

                    <div class="mb-3">
                      <label for="agent_id" class="form-label">Agent</label>
                      <select class="form-select" name="agent_id" id="agent_id">
                        <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($agent->id); ?>">
                            <?php echo e($agent->nom); ?>

                          </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>




                    

                    <div class="mb-3">
                      <label for="contrat_id" class="form-label">Id Contrat</label>
                      <select class="form-select" name="contrat_id" id="contrat_id">
                        <?php $__currentLoopData = $contrat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($c->id); ?>">
                            <?php echo e($c->contrat_id); ?>

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



  <!-- page-body-wrapper ends -->
<?php echo $__env->make("admin.pages.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/reglement/store.blade.php ENDPATH**/ ?>