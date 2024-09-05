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
                   
                  <h4 class="card-title">Liste des propriétaires</h4>
                 

                  <p class="card-description">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                      Ajouter-un-propriétaire
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
                            Details
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php $__currentLoopData = $userAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <a href="<?php echo e(route('proprio.show',$user->id)); ?>">
                                <button class="btn btn-info">Edit</button>
                            </a>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php echo e($userAll->links()); ?>

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

  
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title fs-5" id="staticBackdropLabel">Ajouter-un-proprietaie</h4>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
          <div class="modal-body">
              <form action="<?php echo e(route('proprio.store')); ?>" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                 
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nom</label>
                      <input type="text" name="nom"  class="form-control" id="exampleInputPassword1">
                    </div>

                     
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Prenom</label>
                    <input type="text" name="prenom"  class="form-control" id="exampleInputPassword1">
                  </div>

                   
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" name="email"  class="form-control" id="exampleInputPassword1">
                  </div>
  
  
                    
                    
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Teléphone</label>
                    <input type="text" name="tel"  class="form-control" id="exampleInputPassword1">
                  </div>


                   
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Profile</label>
                    <input type="file" name="profile"  class="form-control" id="exampleInputPassword1">
                  </div>
                 
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
<?php /**PATH C:\Users\Claude\Desktop\Folders\Aicha_DSI\DSIBack_end\resources\views/admin/proprietaires/index.blade.php ENDPATH**/ ?>