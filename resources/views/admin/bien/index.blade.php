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
                      <a href="{{ route('appartement.create') }}">
                        <button type="button" class="btn btn-primary">
                          Ajouter Un Appartement
                        </button>
                      </a>
                    </p>

                    <p class="card-description">
                      <a href="">
                        <button type="button" class="btn btn-primary">
                          Ajouter Une Maison
                        </button>
                      </a>
                    </p>

                    <p class="card-description">
                      <a href="">
                        <button type="button" class="btn btn-primary">
                          Ajouter Une Parcelle
                        </button>
                      </a>
                    </p>

                  </div>

                  <h4 class="card-title">Liste des Biens Immobilier</h4>
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
                            Status
                          </th>
                          <th>
                            Details
                          </th>
                          <th>
                            Modifier
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($biens as $bien)
                        <tr>
                          <td class="py-1">
                            <img src="{{ $bien->image }}" alt="image" /><br>
                          </td>
                          <td> {{ $bien->proprietaire->nom }} {{ $bien->proprietaire->prenom }}</td>
                          <td> {{ $bien->superficie ?? $bien->nbr_etage }}</td>
                          <td> {{ $bien->type_bien->type_bien }} </td>

                          <td> {{ $bien->etat ? 'Actif' : 'Inactif' }}</td>
                          <td>
                            <a href="">
                              <button class="btn btn-info">Show</button>
                            </a>
                          </td>
                          <td>
                            <a href="">
                              <button class="btn btn-info">Edit</button>
                            </a>
                            <a><button class="btn btn-danger">Supprimer</button></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                {{ $biens->links() }}
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