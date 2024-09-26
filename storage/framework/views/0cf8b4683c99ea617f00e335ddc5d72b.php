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
                          <th> Statut </th>
                          <th> Valider </th>
                          <th> Refuser </th>
                          <th> Supprimer </th>
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
                          <td><?php echo e($reservation->statut == true ? 'Valider' : 'En cours'); ?></td>
                          <td>
                            <a href="<?php echo e(route('reservation.valider', $reservation->id)); ?>">
                              <button class="btn btn-sm btn-inverse-success">
                                <i class="mdi mdi-check"></i>
                              </button>
                            </a>
                          </td>
                          <td>
                            <a href="<?php echo e(route('reservation.refuser', $reservation->id)); ?>">
                              <button class="btn btn-sm btn-inverse-danger">
                                <i class="mdi mdi-close"></i>
                              </button>
                            </a>
                          </td>
                          <td>
                            <button type="button" class="btn btn-sm btn-inverse-danger"
                              onclick="deleteReservation(<?php echo e($reservation->id); ?>)">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php echo e($reservations->links()); ?>

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

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Supprimer une localité</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Etes-vous sur de vouloir supprimer cette localité ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <form id="deleteForm" action="" method="POST">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button type="submit" class="btn btn-danger">Supprimer</button>
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


  function deleteReservation(id){
    var url = "<?php echo e(route('reservation.destroy', ':id')); ?>";
    url = url.replace(':id', id);
    $('#deleteModal').modal('show');
    document.querySelector('#deleteModal form').setAttribute('action', url);
  }

</script><?php /**PATH C:\Users\Claude\Desktop\Folders\Aicha_DSI\DSIBack_end\resources\views/admin/reservation/index.blade.php ENDPATH**/ ?>