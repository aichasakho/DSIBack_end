<nav class="sidebar sidebar-offcanvas" id="sidebar">

  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo e(route('home.admin')); ?>">
        <i class="mdi mdi-view-quilt menu-icon"></i>
        <span class="menu-title">Dashboard</span>
        <div class="badge badge-info badge-pill">2</div>
      </a>
    </li>
    <li class="nav-item sidebar-category">
      <p>Components</p>
      <span></span>
    </li>


      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('annonce.index')); ?>">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Annonce</span>
        </a>
      </li>
      <li class="nav-item">
        <button class="nav-link btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Biens Immobilier</span>
          <i class="menu-arrow"></i>
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled pb-1">
            <li><a href="<?php echo e(route('bienImmobilier.index')); ?>" class="nav-link">Immeubles</a></li>
            <li><a href="<?php echo e(route('appartement.index')); ?>" class="nav-link">Appartements</a></li>
            <li><a href="<?php echo e(route('bienImmobilier.index')); ?>" class="nav-link">Maisons</a></li>
            <li><a href="<?php echo e(route('bienImmobilier.index')); ?>" class="nav-link">Terrains</a></li>
            <li><a href="<?php echo e(route('parcelle.index')); ?>" class="nav-link">Parcelles</a></li>
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('reservation.index')); ?>">
          <i class="mdi mdi-calendar-check menu-icon"></i>
          <span class="menu-title">Reservation</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('localite.index')); ?>">
          <i class="mdi mdi-map-marker menu-icon"></i>
          <span class="menu-title">Localite</span>
        </a>
      </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('typebien.index')); ?>">
                <i class="mdi mdi-cube menu-icon"></i>
                <span class="menu-title">Type de Bien</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('contrat.index')); ?>">
                <i class="mdi mdi-file-check menu-icon"></i>
                <span class="menu-title">Contrat</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('reglement.index')); ?>">
                <i class="mdi mdi-file-document menu-icon"></i>
                <span class="menu-title">Reglement</span>
            </a>
        </li>


        <li class="nav-item">
        <button class="nav-link btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#user-collapse" aria-expanded="true">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">Utilisateurs</span>
            <i class="menu-arrow"></i>
        </button>
        <div class="collapse show" id="user-collapse">
            <ul class="btn-toggle-nav list-unstyled pb-1">
            <li><a href="<?php echo e(route('user.index')); ?>" class="nav-link">Agents</a></li>
            <li><a href="<?php echo e(route('user.index')); ?>" class="nav-link">Clients</a></li>
            <li><a href="<?php echo e(route('user.index')); ?>" class="nav-link">Proprietaires</a></li>
            </ul>
        </div>
        </li>


        <li class="">
          <button class="bg-light w-100" >
          <a class="nav-link" href="<?php echo e(route('admin.login')); ?>">
            <span class="text-dark fw-bold fs-5">Déconnexion</span>
          </a>
          </button>
        </li>



    </ul>
  </nav>

<?php /**PATH C:\Users\Claude\Desktop\Folders\Aicha_DSI\DSIBack_end\resources\views/admin/pages/sidebar.blade.php ENDPATH**/ ?>