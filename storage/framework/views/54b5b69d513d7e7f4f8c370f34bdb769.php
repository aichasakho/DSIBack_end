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
                  <div class="d-flex flex-row gap-2">
                    <p class="card-description">
                      <a href="<?php echo e(route('add.immeuble')); ?>">
                        <button type="button" class="btn btn-info">
                          Ajouter un Immeuble
                        </button>
                      </a>
                    </p>
                    <p class="card-description">
                      <a href="<?php echo e(route('appartement.create')); ?>">
                        <button type="button" class="btn btn-info">
                          Ajouter un Appartement
                        </button>
                      </a>
                    </p>

                    <p class="card-description">
                      <a href="">
                        <button type="button" class="btn btn-info">
                          Ajouter une Maison
                        </button>
                      </a>
                    </p>

                    <p class="card-description">
                      <a href="">
                        <button type="button" class="btn btn-info">
                          Ajouter une Parcelle
                        </button>
                      </a>
                    </p>

                      <p class="card-description">
                          <a href="">
                              <button type="button" class="btn btn-info">
                                  Ajouter un Terrain
                              </button>
                          </a>
                      </p>

                  </div>
                    <hr>
                  <h4 class="card-title">Liste des Appartements</h4>

                    <hr>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Image </th>
                          <th> Immeuble </th>
                          <th> Proprietaire </th>
                          <th> Nombre de piece </th>
                          <th> Montant caution</th>
                          <th> Details </th>
                          <th> Modifier </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $appartements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="py-1">
                            <img src="<?php echo e($appart?->bienImmobilier?->image); ?>" alt="image" /><br>
                          </td>
                          <td> <?php echo e($appart?->bienImmobilier?->nom_immeuble); ?> </td>
                          <td> <?php echo e($appart?->bienImmobilier->proprietaire?->nom); ?> <?php echo e($appart?->bienImmobilier->proprietaire?->prenom); ?></td>
                          <td> <?php echo e($appart?->nbr_piece); ?> </td>
                          <td> <?php echo e($appart?->montant_caution); ?> </td>
                          <td>
                            <a href="">
                                <button class="btn btn-inverse-info">
                                    <i class="mdi mdi-eye"></i>
                                </button>
                            </a>
                          </td>
                          <td>
                            <a href="<?php echo e(route('appartement.edit', $appart)); ?>">
                                <button class="btn btn-inverse-success">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                            </a>
                          </td>
                            <td>
                              <a href="">
                                  <button class="btn btn-inverse-danger">
                                      <i class="mdi mdi-delete"></i>
                                  </button>
                              </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php echo e($appartements->links()); ?>

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
  </div>
  <?php echo $__env->make("admin.pages.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\Claude\Desktop\Folders\Aicha_DSI\DSIBack_end\resources\views/admin/appartement/index.blade.php ENDPATH**/ ?>