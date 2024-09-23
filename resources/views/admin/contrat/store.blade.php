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
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h1 class="card-title mb-5">Ajouter un contrat</h1>

                  <div class="table-responsive">
                    <form action="{{ route('contrat.store') }}" method="POST">
                      @csrf

                      <div class="mb-3">
                        <label for="numero_contrat" class="form-label">N°Contrat</label>
                        <input type="text" name="numero_contrat" class="form-control" id="numero_contrat"
                          placeholder="3">
                      </div>

                      {{-- biens immobiliers --}}
                      <div class="mb-3">
                        <label for="bien_immobilier_id" class="form-label">Bien Immobilier</label>
                        <select class="form-select" name="bien_immobilier_id" id="bien_immobilier_id">
                          @foreach ($biens as $bien)
                          <option value="{{ $bien->id }}">
                            {{ $bien->nom_immeuble ?? $bien->proprietaire->prenom . " " .
                            $bien->proprietaire->nom . " Bien :". $bien->id }}
                          </option>
                          @endforeach
                        </select>
                      </div>

                      {{-- clients --}}

                      <div class="mb-3">
                        <label for="client_id" class="form-label">Client</label>
                        <select class="form-select" name="client_id" id="client_id">
                          @foreach ($clients as $client)
                          <option value="{{ $client->id }}">
                            {{ $client->nom . " " . $client->prenom }}
                          </option>
                          @endforeach
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="date_debut" class="form-label">Date de début</label>
                        <input type="date" name="date_debut" class="form-control" id="date_debut" placeholder="3">
                      </div>

                      <div class="mb-3">
                        <label for="dateFin" class="form-label">Date de fin</label>
                        <input type="date" name="date_fin" class="form-control" id="dateFin" placeholder="3">
                      </div>
                      {{-- date fin dois etre supperieur a la date de debut --}}
                      <script>
                        document.getElementById("dateFin").min = document.getElementById("date_debut").value;
                      </script>

                      <div class="mb-3">
                        <label for="montant" class="form-label">Montant</label>
                        <input type="number" name="montant" class="form-control" id="montant" placeholder="3">
                      </div>

                      <div class="mb-3">
                        <label for="type_contrat" class="form-label">Type de contrat</label>
                        <select class="form-select" name="type_contrat" id="type_contrat">
                          <option value="Location">Location</option>
                          <option value="Vente">Vente</option>
                        </select>
                      </div>

                      <button type="submit" class="btn btn-info">Enregistrer</button>
                    </form>
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



    <!-- page-body-wrapper ends -->
    @include("admin.pages.js")
</body>

</html>