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
                      <a href="<?php echo e(route('add.immeuble')); ?>">
                        <button type="button" class="btn btn-info">
                          Ajouter un Immeuble
                        </button>
                      </a>
                    </p>
                    <p class="card-description">
                      <a href="<?php echo e(route('appartement.create')); ?>">
                        <button type="button" class="btn btn-info">
                          Ajouter un Appartement
                        </button>
                      </a>
                    </p>

                    <p class="card-description">
                      <a href="<?php echo e(route('add.maison')); ?>">
                        <button type="button" class="btn btn-info">
                          Ajouter une Maison
                        </button>
                      </a>
                    </p>

                    <p class="card-description">
                      <a href="<?php echo e(route('parcelle.create')); ?>">
                        <button type="button" class="btn btn-info">
                          Ajouter une Parcelle
                        </button>
                      </a>
                    </p>

                    <p class="card-description">
                      <a href="<?php echo e(route('add.terrain')); ?>">
                        <button type="button" class="btn btn-info">
                          Ajouter un Terrain
                        </button>
                      </a>
                    </p>

                  </div>
                  <hr>
                  <h4 class="card-title">Liste des Biens Immobiliers</h4>

                  <hr>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Bien - titre
                          </th>
                          <th>
                            Proprietaire
                          </th>
                          <th>
                            Superficie / Nombre d'etages
                          </th>
                          <th>
                            Type de bien
                          </th>
                          <th>
                            Localité
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Details
                          </th>
                          <th>
                            Modifier
                          </th>
                          <th>
                            Retirer
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $biens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="py-1">
                            <img src="<?php echo e($bien->image); ?>" alt="image" /><br>
                          </td>
                          <td> <?php echo e($bien->proprietaire->nom); ?> <?php echo e($bien->proprietaire->prenom); ?></td>
                          <td> <?php echo e($bien->superficie ?? $bien->nbr_etage); ?></td>
                          <td> <?php echo e($bien->type_bien->type_bien); ?> </td>
                          <td> <?php echo e($bien->localite?->ville); ?> / <?php echo e($bien->localite?->quartier); ?> </td>
                          <td> <?php echo e($bien->etat ? 'Actif' : 'Inactif'); ?></td>
                          <td>

                            <button class="btn btn-inverse-info" onclick="showModal(event)" data-bien="<?php echo e($bien); ?>">
                              <i class="mdi mdi-eye"></i>
                            </button>

                          </td>
                          <td>
                            <?php if($bien->type_bien_id == 1): ?>
                            <a href="<?php echo e(route('edit.immeuble', $bien->id)); ?>">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                            <?php elseif($bien->type_bien_id == 2): ?>
                            <a href="<?php echo e(route('appartement.edit', $bien->id)); ?>">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                            <?php elseif($bien->type_bien_id == 3): ?>
                            <a href="<?php echo e(route('edit.maison', $bien->id)); ?>">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                            <?php elseif($bien->type_bien_id == 4): ?>
                            <a href="<?php echo e(route('edit.terrain', $bien->id)); ?>">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                            <?php elseif($bien->type_bien_id == 5): ?>
                            <a href="<?php echo e(route('parcelle.edit', $bien->id)); ?>">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                            <?php else: ?>
                            <a href="">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                            <?php endif; ?>
                          </td>

                          <td>
                            <button type="button" class="btn btn-sm btn-inverse-danger"
                              onclick="deleteBien(<?php echo e($bien->id); ?>)">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php echo e($biens->links()); ?>

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
            <h1 class="modal-title fs-5" id="bienModalLabel">Détail du bien</h1>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
          <div class="modal-body">
            <p id="bienImage"></p>
            <p>ID du bien : <span id="bienId"></span></p>
            <p>type de bien: <span id="bienTypeBien"></span></p>
            <p>Proprietaire: <span id="proprietaire"></span></p>
            <p>Localité : <span id="localiteBien"></span></p>

            
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteModalLabel">Confirmation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Etes-vous sur de vouloir supprimer ce bien ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <form action="" method="POST">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- page-body-wrapper ends -->
  </div>
  <?php echo $__env->make("admin.pages.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>

<script>
  function showModal(event) {
    // Récupère l'attribut 'data-bien' et parse-le en objet JSON
    var bien = JSON.parse(event.currentTarget.getAttribute('data-bien'));
    console.log(bien);

    // Utilise les propriétés de l'objet 'bien'
    document.getElementById("bienImage").innerHTML = `<img src="${bien.image}" alt="image" class="img-fluid" />`;
    document.getElementById("bienId").innerHTML = bien.id;
    document.getElementById("bienTypeBien").innerHTML = bien.type_bien ? bien.type_bien.type_bien : 'Non spécifié';
    document.getElementById("proprietaire").innerHTML = bien.proprietaire ? bien.proprietaire.prenom  : 'Non spécifié';
    document.getElementById("localiteBien").innerHTML = bien.localite ?  `${bien.localite.ville} ${bien.localite.quartier}` : 'Non spécifié';
    // TODO: Ajouter les autres informations du bien

    // Affiche le modal
    $('#bienModal').modal('show');
}
  function deleteBien(id) {
    let url = "<?php echo e(route('bienImmobilier.destroy', ':id')); ?>";
    url = url.replace(':id', id);
    $('#deleteModal').find('form').attr('action', url);
    $('#deleteModal').modal('show');
  }

</script><?php /**PATH C:\Users\Claude\Desktop\Folders\Aicha_DSI\DSIBack_end\resources\views/admin/bien/index.blade.php ENDPATH**/ ?>