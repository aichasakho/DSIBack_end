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
                <div class="d-flex flex-row gap-2">
                  <p class="card-description">
                    <a href="<?php echo e(route('reglement.create')); ?>">
                      <button type="button" class="btn btn-info">
                        Ajouter un règlement
                      </button>
                    </a>
                  </p>

                </div>
                <hr>
                <h4 class="card-title">Liste des Règlements</h4>

                <hr>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th> Numéro règlement </th>
                      <th> Nom client </th>
                      <th> Date Règlement </th>
                      <th> Details </th>
                      <th> Modifier </th>
                    </tr>
                    </thead>

                    <tbody>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
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
          <h1 class="modal-title fs-5" id="bienModalLabel">Détail règlement</h1>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
        <div class="modal-body">
          <p>Numéro règlement: <span id="numReglement"></span></p>
          <p>Nom Client: <span id="nomClient"></span></p>
          <p>Date règlement: <span id="dateReglement"></span></p>

          
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
    console.log(reglement); // Pour vérifier la structure de l'objet

    // Utiliser les propriétés de l'objet 'appart'
    document.getElementById("numReglement").innerHTML = reglement.numero_reglement || 'Non spécifié';
    document.getElementById("nomClient").innerHTML = reglement.nom || 'Non spécifié';
    document.getElementById("dateReglement").innerHTML = reglement.date_reglement || 'Non spécifié';


    // Affiche le modal
    $('#bienModal').modal('show');
  }
</script>


<?php /**PATH C:\Users\Claude\Desktop\Folders\Aicha_DSI\DSIBack_end\resources\views/admin/reglement/index.blade.php ENDPATH**/ ?>