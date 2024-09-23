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

                    <div class="mb-3">
                      <label for="numero_contrat" class="form-label">N°Contrat</label>
                      <input type="number" max="10" name="numero_contrat" class="form-control" id="numero_contrat" placeholder="">
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <input type="text" max="10" name="nbr_piece" class="form-control" id="nbr_piece" placeholder="">
                    </div>

                    <div class="mb-3">
                      <label for="dateDebut" class="form-label">Date de début</label>
                      <input type="date" max="10" name="dateDebut" class="form-control" id="dateDebut" placeholder="">
                    </div>

                    <div class="mb-3">
                      <label for="dateFin" class="form-label">Date de fin</label>
                      <input type="date" max="10" name="dateFin" class="form-control" id="dateFin" placeholder="">
                    </div>
                    <div class="mb-3">
                      <label for="montant" class="form-label">Montant</label>
                      <input type="number"  name="montant" class="form-control" id="montant" placeholder="">
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
