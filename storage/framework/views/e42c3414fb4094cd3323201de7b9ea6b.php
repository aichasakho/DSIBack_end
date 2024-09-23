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
                      <a href="<?php echo e(route('annonce.create')); ?>">
                        <button type="button" class="btn btn-info">
                          Ajouter une annonce
                        </button>
                      </a>
                    </p>
                  </div>
                  <hr>
                  <h4 class="card-title">Liste des Annonces</h4>
                  <hr>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Image </th>
                          <th> Type d'annonce </th>
                          <th> Description </th>
                          <th> Prix </th>
                          <th> statut </th>
                          <th> Details </th>
                          <th> Modifier </th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $__currentLoopData = $annonces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $annonce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <img src="<?php echo e($annonce->bienImmobilier->image); ?>" alt="image" class="img-fluid" />
                          </td>
                          <td> <?php echo e($annonce->type_annonce); ?> </td>
                          <td> <?php echo e(substr($annonce->description, 0, 50)); ?> ... </td>
                          <td> <?php echo e($annonce->prix); ?> </td>
                          <td> <?php echo e($annonce->statut); ?> </td>
                          <td>
                            <button class="btn btn-sm btn-inverse-info" onclick="showModal(event)"
                              data-annonce="<?php echo e($annonce); ?>">
                              <i class="mdi mdi-eye"></i>
                            </button>
                          </td>
                          <td>
                            <a href="<?php echo e(route('annonce.edit', $annonce)); ?>">
                              <button class="btn btn-sm btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php echo e($annonces->links()); ?>

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


    <div class="modal fade" id="annonceModal" tabindex="-1" aria-labelledby="annonceModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="annonceModalLabel">Détail de l'annonce</h1>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
          <div class="modal-body">
            <p id="bienImage"></p>
            <p>Type de l'annonce : <span id="typeAnnonce"></span></p>
            <p>Description: <span id="description"></span></p>
            <p>Prix: <span id="prix"></span></p>
            <p>Statut : <span id="statut"></span></p>

            
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
    var annonce = JSON.parse(event.currentTarget.getAttribute('data-annonce'));
    console.log(annonce); // Pour vérifier la structure de l'objet


    document.getElementById("bienImage").innerHTML = `<img src="${annonce.bien_immobilier ? annonce.bien_immobilier.image : 'Non spécifié'}" alt="image" class="img-fluid" />`;
    document.getElementById("typeAnnonce").innerHTML = annonce.type_annonce || 'Non spécifié';
    document.getElementById("description").innerHTML = annonce.description || 'Non spécifié';
    document.getElementById("prix").innerHTML = annonce.prix || 'Non spécifié';
    document.getElementById("statut").innerHTML = annonce.statut|| 'Non spécifié';

    // Affiche le modal
    $('#annonceModal').modal('show');
  }
</script>
<?php /**PATH C:\Users\Claude\Desktop\Folders\Aicha_DSI\DSIBack_end\resources\views/admin/annonce/index.blade.php ENDPATH**/ ?>