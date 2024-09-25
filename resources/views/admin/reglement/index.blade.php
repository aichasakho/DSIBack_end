<!DOCTYPE html>
<html lang="en">


@include("admin.pages.head")

<body>
<div class="container-scroller d-flex">
  @include("admin.pages.sidebar")
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:../../partials/_navbar.html -->
    @include('admin.pages.navbar')

    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">


          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-row gap-2">
                  <p class="card-description">
                    <a href="{{ route('reglement.create') }}">
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
                      <th> Agent </th>
                      <th> Id contrat  </th>
                      <th> Details </th>
                      <th> Modifier </th>
                      <th> Annuler </th>
                      <th> Imprimer </th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($reglements as $reglement)
                      <tr>
                        <td> {{ $reglement->numero_reglement }} </td>
                        <td> {{ $reglement->nom }} </td>
                        <td> {{ $reglement->date_reglement }} </td>
                        <td> {{ $reglement->agent->prenom }}{{ $reglement->agent->nom }} </td>
                        <td> {{ $reglement->contrat_id }}  </td>
                        <td>
                          <button class="btn btn-sm btn-inverse-info" onclick="showModal(event)"
                                  data-bien="{{ $reglement }}">
                            <i class="mdi mdi-eye"></i>
                          </button>
                        </td>
                        <td>
                          <a href="{{ route('reglement.edit', $reglement) }}">
                            <button class="btn btn-sm btn-inverse-warning">
                              <i class="mdi mdi-pencil"></i>
                            </button>
                          </a>
                        </td>
                        <td>
                          <button type="button" class="btn btn-sm btn-inverse-danger"
                                  onclick="deleteReglement({{ $reglement->id }})">
                            <i class="mdi mdi-delete"></i>
                          </button>
                        </td>

                        <td>
                          <a href="{{ route('reglement.pdf', $reglement) }}">
                            <button class="btn btn-sm btn-inverse-success">
                              <i class="mdi mdi-printer"></i>
                            </button>
                          </a>
                        </td>
                      </tr>
                    @endforeach

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
          <p>Agent: <span id="agent"></span></p>
          <p>Id contrat: <span id="contrat_id"></span></p>



          {{-- TODO: Ajouter les autres informations du bien --}}
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
          Etes-vous sur de vouloir supprimer ce reglement ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <form action="" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- page-body-wrapper ends -->
</div>
@include("admin.pages.js")
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
    document.getElementById("agent").innerHTML = reglement.agent.nom + " " + reglement.agent.prenom || 'Non spécifié';
    document.getElementById("contrat_id").innerHTML = reglement.contrat_id || 'Non spécifié';



    // Affiche le modal
    $('#bienModal').modal('show');
  }

  function deleteReglement(id) {
    let url = "{{ route('reglement.destroy', ':id') }}";
    url = url.replace(':id', id);
    $('#deleteModal').find('form').attr('action', url);
    $('#deleteModal').modal('show');
  }

</script>




