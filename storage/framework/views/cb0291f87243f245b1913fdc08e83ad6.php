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
                  <div class="d-flex flex-row gap-2">
                    <p class="card-description">
                      <a href="<?php echo e(route('add.client')); ?>">
                        <button type="button" class="btn btn-info">
                          Ajouter un client
                        </button>
                      </a>
                    </p>
                    <p class="card-description">
                      <a href="<?php echo e(route('add.proprietaire')); ?>">
                        <button type="button" class="btn btn-info">
                          Ajouter un proprietaire
                        </button>
                      </a>
                    </p>

                    <p class="card-description">
                      <a href="<?php echo e(route('add.agent')); ?>">
                        <button type="button" class="btn btn-info">
                          Ajouter un agent
                        </button>
                      </a>
                    </p>

                  </div>
                  <hr>
                  <h4 class="card-title">Liste des Utilisateurs</h4>

                  <hr>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Nom
                          </th>
                          <th>
                            Prénom
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Téléphone
                          </th>

                          <th>
                            Role
                          </th>
                          <th>
                            Statut
                          </th>
                          <th>
                            Modifier
                          </th>

                          <th>
                            Supprimer
                          </th>
                          <th>
                            Bloquer
                          </th>
                          <th>
                            Débloquer
                          </th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                          <td> <?php echo e($user->nom); ?></td>
                          <td> <?php echo e($user->prenom); ?></td>
                          <td> <?php echo e($user->email); ?></td>
                          <td> <?php echo e($user->tel); ?> </td>
                          <td> <?php echo e($user->role); ?> </td>
                          <td> <?php echo e($user->statut ? 'debloquer' : 'bloquer'); ?> </td>

                          <td>
                            <?php if($user->role== 'admin'): ?>
                            <a href="<?php echo e(route('edit.agent', $user->id)); ?>">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                            <?php elseif($user->role =='client'): ?>
                            <a href="<?php echo e(route('edit.client', $user->id)); ?>">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                            <?php elseif($user->role == 'proprietaire'): ?>
                            <a href="<?php echo e(route('edit.proprietaire', $user->id)); ?>">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                            <?php endif; ?>
                          </td>
                          <td>
                            <a href="">
                              <button class="btn btn-inverse-danger">
                                <i class="mdi mdi-delete"></i>
                              </button>
                            </a>
                          </td>
                          <td>
                            <a href="<?php echo e(route('user.bloquer', $user)); ?>">
                              <button class="btn btn-inverse-secondary">
                                Bloquer
                              </button>
                            </a>
                          </td>

                          <td>
                            <a href="<?php echo e(route('user.debloquer', $user)); ?>">
                              <button class="btn btn-inverse-warning">
                                Débloquer
                              </button>
                            </a>
                          </td>
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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



    <!-- page-body-wrapper ends -->
  </div>
  <?php echo $__env->make("admin.pages.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/user/index.blade.php ENDPATH**/ ?>