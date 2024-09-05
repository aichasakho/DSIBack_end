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
                   
                  <h4 class="card-title">Details du propriétaire </h4>
                 

                  <p class="card-description">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Modification des informations
                      </button>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                          Profile
                          </th>
                          <th>
                            Nom
                          </th>
                          <th>
                            Prenom
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Tel
                          </th>
                          <th>
                            Adresse
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                            <img src="<?php echo e(asset('storage/'.$user->profile)); ?>" alt="image"/>
                          </td>
                          <td>
                           <?php echo e($user->nom); ?>

                          </td>
                          <td>
                            <?php echo e($user->prenom); ?>


                          </td>
                          <td>
                            <?php echo e($user->email); ?>


                          </td>
                          <td>
                            <?php echo e($user->tel); ?>


                          </td>

                          <td>
                            <?php echo e($user->adresse); ?>


                          </td>
                          
                        </tr>
                      </tbody>
                    </table>
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

  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="staticBackdropLabel">Modifier-un-propriétaire</h4>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
        <div class="modal-body">
            <form action="<?php echo e(route('update.proprio')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nom</label>
                  <input type="text" name="nom" value="<?php echo e($user->nom); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Prenom</label>
                  <input type="text" value="<?php echo e($user->prenom); ?>" name="prenom" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control" id="exampleInputPassword1">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tel</label>
                    <input type="text" name="tel" value="<?php echo e($user->tel); ?>" class="form-control" id="exampleInputPassword1">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Profile</label>
                    <input type="file" name="profile" class="form-control" id="exampleInputPassword1">
                  </div>


                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Adresse</label>
                    <input type="text" value="<?php echo e($user->adresse); ?>" name="adresse" class="form-control" id="exampleInputPassword1">
                  </div>

                  <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
               
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        
      </div>
    </div>
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

    <!-- page-body-wrapper ends -->
  </div>
   <?php echo $__env->make("admin.pages.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/proprietaires/edit.blade.php ENDPATH**/ ?>