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
                   
                  <h4 class="card-title">Demandes de visites</h4>
                 

                  <p class="card-description">
                   
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                        Image
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
                              Status
                            </th>
                            <th>
                              Date
                            </th>
                          
                          <th>
                            Valider
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php $__currentLoopData = $visiteAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="py-1">
                            <img src="<?php echo e(asset('storage/'.$visite->bien_immobilier->image)); ?>" alt="image"/>
                          </td>
                          <td>
                           <?php echo e($visite->client->nom); ?>

                          </td>
                          <td>
                            <?php echo e($visite->client->email); ?>



                          </td>
                          <td>
                            <?php echo e($visite->client->tel); ?>


                          </td>

                          <td>
                            <?php echo e($visite->status); ?>


                          </td>
                          <td>
                            <?php echo e($visite->date_propose); ?>


                          </td>
                          <td>
                            <a href="<?php echo e(route('details.visite',['id'=>$visite->id])); ?>">
                                <button class="btn btn-info">Edit</button>
                            </a>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php echo e($visiteAll->links()); ?>

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


   


  </div>
   <?php echo $__env->make("admin.pages.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/visite/index.blade.php ENDPATH**/ ?>