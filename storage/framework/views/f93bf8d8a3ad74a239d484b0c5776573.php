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
                   
                  <h4 class="card-title">Liste des Bien-immobilier</h4>
                 

                  <p class="card-description">
                    <a href=" <?php echo e(route('bienImmobilier.create')); ?> ">
                    <button type="button" class="btn btn-primary">
                        Ajouter-un-Bien
                      </button>
                    </a>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                        Bien/titre
                          </th>
                          <th>
                            Proprietaire
                          </th>
                          <th>
                           Superficie
                          </th>
                          <th>
                            Catégorie
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Details
                          </th>
                          <th>
                            Modifier
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php $__currentLoopData = $bienImmobillier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="py-1">
                            <img src="<?php echo e(asset('storage/'.$bien->image)); ?>" alt="image"/><br>
                            <?php echo e($bien->titre); ?>


                          </td>
                          
                          <td>
                            <?php echo e($bien->proprietaire->nom); ?>


                          </td>
                          <td>
                            <?php echo e($bien->superficie); ?>


                          </td>
                          <td>
                            <?php echo e($bien->categorie->categorie); ?>


                          </td>
                          
                          <td>
                          <?php echo e($bien->status ? 'Disponible':'Non-Disponible'); ?>


                          </td>
                          <td>
                            <a href="<?php echo e(route('bienImmobilier.show',$bien->id)); ?>">
                                <button class="btn btn-info">Show</button>
                            </a>
                          </td>
                          <td>
                            <a href="<?php echo e(route('bienImmobilier.edit',$bien->id)); ?>">
                                <button class="btn btn-info">Edit</button>
                            </a>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php echo e($bienImmobillier->links()); ?>

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
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
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
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/bien/index.blade.php ENDPATH**/ ?>