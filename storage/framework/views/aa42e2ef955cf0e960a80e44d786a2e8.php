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
                   
                  <h4 class="card-title">Ajouter-un-bien-immobiler</h4>
      
                  <div class="table-responsive">
                  <form action="<?php echo e(route('update.bienImmobielier')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Titre</label>
                  <input type="text" name="titre" value="<?php echo e($bien->titre); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Superficie</label>
                  <input type="text" name="superficie" value="<?php echo e($bien->superficie); ?>" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Prix-location</label>
                    <input type="number" name="prix_location" value="<?php echo e($bien->prix_location); ?>" class="form-control" id="exampleInputPassword1">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Status</label>
                      <select name="status" id="">
                        <option value="<?php echo e($bien->status); ?>"><?php echo e($bien->status ?'Disponible' :'Non-Disponible'); ?></option>
                        <option value="true">Disponible</option>
                        <option value="false">Non-Disponible</option>
                      </select>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Catégorie</label>
                      <select name="categorie_id" id="">
                      <option value="<?php echo e($bien->categorie_id); ?>"><?php echo e($bien->categorie->categorie); ?></option>
                        <?php $__currentLoopData = $categorie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->categorie); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>


                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Proprietaire</label>
                      <select name="proprietaire_id" id="">
                      <option value="<?php echo e($bien->proprietaire_id); ?>"><?php echo e($bien->proprietaire->nom); ?></option>
                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proprio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($proprio->id); ?>"><?php echo e($proprio->nom); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Profile</label>
                    <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                  </div>


                  <input type="hidden" name="id" value="<?php echo e($bien->id); ?>">

                <button type="submit" class="btn btn-primary">Modifier</button>
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
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/bien/edit.blade.php ENDPATH**/ ?>