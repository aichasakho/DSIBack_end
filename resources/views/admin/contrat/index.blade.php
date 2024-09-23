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
                    <a href="{{ route('contrat.create') }}">
                      <button type="button" class="btn btn-info">
                        Ajouter un contrat
                      </button>
                    </a>
                  </p>

                </div>
                <hr>
                <h4 class="card-title">Liste des Contrats</h4>

                <hr>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th> Type contrat </th>
                      <th> Date début </th>
                      <th> Date fin</th>
                      <th> Montant </th>
                      <th> Details </th>
                      <th> Modifier </th>
                      <th> Résilier </th>

                    </tr>
                    </thead>
                    <tbody>
{{--                                            @foreach($contrats as $contrat)--}}
{{--                                            <tr>--}}
{{--                                              <td> {{ $contrat?->type_contrat }} </td>--}}
{{--                                              <td> {{ $contrat?->date_debut }} </td>--}}
{{--                                              <td> {{ $contrat?->date_fin}} </td>--}}
{{--                                              <td> {{ $contrat?->montant }} </td>--}}
{{--                                              <td>--}}
{{--                                                <button class="btn btn-inverse-info" onclick="showModal(event)" data-bien="{{ json_encode($contrat) }}">--}}
{{--                                                  <i class="mdi mdi-eye"></i>--}}
{{--                                                </button>--}}
{{--                                              </td>--}}
{{--                                              <td>--}}
{{--                                                <a href="{{ route('contrat.edit', $contrat) }}">--}}
{{--                                                  <button class="btn btn-inverse-success">--}}
{{--                                                    <i class="mdi mdi-pencil"></i>--}}
{{--                                                  </button>--}}
{{--                                                </a>--}}
{{--                                              </td>--}}
{{--                                              <td>--}}
{{--                                                <a href="{{ route('contrat.destroy', $contrat) }}">--}}
{{--                                                  <button class="btn btn-inverse-danger">--}}
{{--                                                    <i class="mdi mdi-delete"></i>--}}
{{--                                                  </button>--}}
{{--                                                </a>--}}
{{--                                              </td>--}}
{{--                                            </tr>--}}
{{--                                            @endforeach--}}
                   </tbody>
                  </table>
                </div>
              </div>
{{--              {{ $contrats->links() }}--}}
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
          <h1 class="modal-title fs-5" id="bienModalLabel">Détail du contrat</h1>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
        <div class="modal-body">
          <p>Type de contrat : <span id="typeContrat"></span></p>
          <p>Date de début: <span id="dateDebut"></span></p>
          <p>Date de Fin: <span id="dateFin"></span></p>
          <p>Montant : <span id="montant"></span></p>

          {{-- TODO: Ajouter les autres informations du bien --}}
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
    console.log(contrat); // Pour vérifier la structure de l'objet

    // Utiliser les propriétés de l'objet 'appart'
    document.getElementById("typeContrat").innerHTML = contrat.type_contrat || 'Non spécifié';
    document.getElementById("dateDebut").innerHTML = contrat.date_debut || 'Non spécifié';
    document.getElementById("dateFin").innerHTML = contrat.date_fin|| 'Non spécifié';
    document.getElementById("montant").innerHTML = contrat.montant|| 'Non spécifié';

    // Affiche le modal
    $('#bienModal').modal('show');
  }
</script>
