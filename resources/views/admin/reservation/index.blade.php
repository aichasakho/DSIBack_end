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
                        @foreach($reservations as $reservation)
                        <tr>
                          <td>{{ $reservation->date_debut }}</td>
                          <td>{{ $reservation->date_fin }}</td>
                          <td>{{ $reservation->client->nom }} {{ $reservation->client->prenom }}</td>
                          <td>{{ $reservation->profession }}</td>
                          <td>{{ $reservation->situation_matrimonial }}</td>
                          <td>
                            <a href="{{ route('reservation.show', $reservation->id) }}">
                              <button class="btn btn-sm btn-inverse-info">
                                <i class="mdi mdi-eye"></i>
                              </button>
                            </a>
                          </td>
                          <td>{{ $reservation->statut == true ? 'Valider' : 'En cours' }}</td>
                          <td>
                            <a href="{{ route('reservation.valider', $reservation->id) }}">
                              <button class="btn btn-sm btn-inverse-success">
                                <i class="mdi mdi-check"></i>
                              </button>
                            </a>
                          </td>
                          <td>
                            <a href="{{ route('reservation.refuser', $reservation->id) }}">
                              <button class="btn btn-sm btn-inverse-danger">
                                <i class="mdi mdi-close"></i>
                              </button>
                            </a>
                          </td>
                          <td>
                            <button type="button" class="btn btn-sm btn-inverse-danger"
                              onclick="deleteReservation({{ $reservation->id }})">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                {{ $reservations->links() }}
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
            <h5 class="modal-title" id="deleteModalLabel">Supprimer une reservation</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Etes-vous sur de vouloir supprimer cette reservation ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <form id="deleteForm" action="" method="POST">
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
    var url = "{{ route('reservation.destroy', ':id') }}";
    url = url.replace(':id', id);
    $('#deleteModal').modal('show');
    document.querySelector('#deleteModal form').setAttribute('action', url);
  }

</script>