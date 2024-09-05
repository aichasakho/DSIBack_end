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

                  <h4 class="card-title">Liste des Utilisateurs</h4>


                  <p class="card-description">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Ajouter-un-Utilisateur
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
                           Email
                          </th>
                          <th>
                           Tel
                          </th>
                          <th>
                            Date-creation
                          </th>

                          <th>
                            Details
                          </th>

                        </tr>
                      </thead>
                      <tbody>
                         <?php $__currentLoopData = $usersAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="py-1">
                            <img src="<?php echo e(asset('storage/'.$user->profile)); ?>" alt="image"/><br>
                            <?php echo e($user->titre); ?>


                          </td>

                          <td>
                            <?php echo e($user->name); ?>


                          </td>
                          <td>
                            <?php echo e($user->email); ?>


                          </td>

                          <td>
                            <?php echo e($user->tel); ?>


                          </td>
                          <td>
                            <?php echo e($user->created_at); ?>


                          </td>


                          <td>
                            <a href="">
                                <button class="btn btn-info">Show</button>
                            </a>
                          </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php echo e($usersAll->links()); ?>

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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter-un-compte</h1>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        <div class="modal-body">
            <form action="<?php echo e(route('add.admin.users')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nom</label>
                  <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>


                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" id="exampleInputPassword1">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tel</label>
                    <input type="text" name="tel" value="<?php echo e(old('tel')); ?>" class="form-control" id="exampleInputPassword1">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Image</label>
                    <input type="file" name="image" value="<?php echo e(old('image')); ?>" class="form-control" id="exampleInputPassword1">
                  </div>


                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mot-de-passe</label>
                    <input type="password" name="password" value="<?php echo e(old('password')); ?>" class="form-control" id="exampleInputPassword1">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirmation-de-Mot-de-passe</label>
                    <input type="password" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>" class="form-control" id="exampleInputPassword1">
                  </div>

                <button type="submit" class="btn btn-primary">Creer</button>
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
  </div>


   <?php echo $__env->make("admin.pages.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/account/index.blade.php ENDPATH**/ ?>