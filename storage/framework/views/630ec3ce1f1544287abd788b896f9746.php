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

                <h1 class="card-title mb-5">Ajouter un contrat</h1>

                <div class="table-responsive">
                  <form action="<?php echo e(route('contrat.store')); ?>" method="POST">

                    <div class="mb-3">
                      <label for="numero_contrat" class="form-label">N°Contrat</label>
                      <input type="number" max="10" name="numero_contrat" class="form-control" id="numero_contrat" placeholder="">
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <input type="text" max="10" name="nbr_piece" class="form-control" id="nbr_piece" placeholder="">
                    </div>

                    <div class="mb-3">
                      <label for="dateDebut" class="form-label">Date de début</label>
                      <input type="date" max="10" name="dateDebut" class="form-control" id="dateDebut" placeholder="">
                    </div>

                    <div class="mb-3">
                      <label for="dateFin" class="form-label">Date de fin</label>
                      <input type="date" max="10" name="dateFin" class="form-control" id="dateFin" placeholder="">
                    </div>
                    <div class="mb-3">
                      <label for="montant" class="form-label">Montant</label>
                      <input type="number"  name="montant" class="form-control" id="montant" placeholder="">
                    </div>
                    <div class="mb-3">
                      <label for="type_contrat" class="form-label">Type de contrat</label>
                      <select class="form-select" name="type_contrat" id="type_contrat">
                        <option value="Location">Location</option>
                        <option value="Vente">Vente</option>

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
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/contrat/store.blade.php ENDPATH**/ ?>