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

                  <h1 class="card-title mb-5">Modifier une annonce</h1>

                  <div class="table-responsive">
                    <form action="<?php echo e(route('annonce.update', $annonce)); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                      <div class="mb-3">
                        <label for="type_annonce" class="form-label">Selectionner un type d'annonce</label>
                        <select class="form-select" name="type_annonce" id="type_annonce">
                          <option value="<?php echo e($annonce->type_annonce); ?>" selected><?php echo e($annonce->type_annonce); ?></option>
                          <option value="Location">Location</option>
                          <option value="Vente">Vente</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="bien_immobilier_id" class="form-label">Choisr un Bien</label>
                        <select class="form-select" name="bien_immobilier_id" id="bien_immobilier_id">
                          <option value="<?php echo e($annonce->bien_immobilier_id); ?>" selected><?php echo e($annonce->bienImmobilier->nom_immeuble ??
                            $annonce->bienImmobilier->proprietaire->prenom . " " .
                            $annonce->bienImmobilier->proprietaire->nom . " Bien :". $annonce->bien_immobilier_id); ?>

                          </option>
                          <?php $__currentLoopData = $biens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($bien->id); ?>">
                            <?php echo e($bien->nom_immeuble ?? $bien->proprietaire->prenom . " " .
                            $bien->proprietaire->nom . " Bien :". $bien->id); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description"
                          rows="5"><?php echo e($annonce->description); ?></textarea>
                      </div>

                      <div class="mb-3">
                        <label for="statut" class="form-label">Statut</label>
                        <select class="form-select" name="statut" id="statut">
                          <option value="<?php echo e($annonce->statut); ?>" selected><?php echo e($annonce->statut); ?></option>
                          <option value="Disponible">Disponible</option>
                          <option value="Indisponible">Indisponible</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" name="prix" class="form-control" value="<?php echo e($annonce->prix); ?>" id="prix"
                          placeholder="prix">
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

</html><?php /**PATH C:\Users\Claude\Desktop\Folders\Aicha_DSI\DSIBack_end\resources\views/admin/annonce/edit.blade.php ENDPATH**/ ?>