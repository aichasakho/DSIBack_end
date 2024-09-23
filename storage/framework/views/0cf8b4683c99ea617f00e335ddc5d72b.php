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
                  <div class="d-flex flex-row gap-2"></div>
                  <hr>
                  <h4 class="card-title">Liste des Réservations</h4>

                  <hr>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Début </th>
                          <th> Fin </th>
                          <th> Client</th>
                          <th> Profession </th>
                          <th> Situation matrimoniale</th>
                          <th> Details </th>
                          <th> Modifier </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($reservation->date_debut); ?></td>
                          <td><?php echo e($reservation->date_fin); ?></td>
                          <td><?php echo e($reservation->client->nom); ?> <?php echo e($reservation->client->prenom); ?></td>
                          <td><?php echo e($reservation->profession); ?></td>
                          <td><?php echo e($reservation->situation_matrimonial); ?></td>
                          <td>
                            <a href="<?php echo e(route('reservation.show', $reservation->id)); ?>">
                              <button class="btn btn-sm btn-inverse-info">
                                <i class="mdi mdi-eye"></i>
                              </button>
                            </a>
                          </td>
                          <td>
                            <a href="#">
                              <button class="btn btn-sm btn-inverse-danger">
                                <i class="mdi mdi-cancel"></i>
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

    <!-- Button trigger modal -->


    <div class="modal fade" id="bienModal" tabindex="-1" aria-labelledby="bienModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="bienModalLabel">Détail de la réservation</h1>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
          <div class="modal-body">
            <p>Début: <span id="debut"></span></p>
            <p>Fin: <span id="fin"></span></p>
            <p>Profession: <span id="profession"></span></p>
            <p>Situation matrimoniale : <span id="situationMatrimoniale"></span></p>
            <p>Client : <span id="client"></span></p>


            
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

<script>
  function showModal(event) {
    // Récupère l'attribut 'data-bien' et parse-le en objet JSON
    var appart = JSON.parse(event.currentTarget.getAttribute('data-bien'));
    console.log(reservation); // Pour vérifier la structure de l'objet

    // Utiliser les propriétés de l'objet 'appart'
    document.getElementById("debut").innerHTML = reservation.date_debut || 'Non spécifié';
    document.getElementById("fin").innerHTML = reservation.date_fin || 'Non spécifié';
    document.getElementById("profession").innerHTML = reservation.profession || 'Non spécifié';
    document.getElementById("situationMatrimoniale").innerHTML = reservation.situation_matrimoniale || 'Non spécifié';
    document.getElementById("client").innerHTML = reservation.client_nom || 'Non spécifié';


    // Affiche le modal
    $('#bienModal').modal('show');
  }
</script><?php /**PATH C:\Users\Claude\Desktop\Folders\Aicha_DSI\DSIBack_end\resources\views/admin/reservation/index.blade.php ENDPATH**/ ?>