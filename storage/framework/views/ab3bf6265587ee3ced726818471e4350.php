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
                   
                  <h4 class="card-title">Details du bien-immobilier</h4>
                 
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                         Titre
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
                         
                        </tr>
                      </thead>
                      <tbody>
                   
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

  

    <!-- page-body-wrapper ends -->
  </div>
   <?php echo $__env->make("admin.pages.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/bien/show.blade.php ENDPATH**/ ?>