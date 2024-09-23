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

                  <h1 class="card-title mb-5">Ajouter une annonce</h1>

                  <div class="table-responsive">
                    <form action="{{ route('annonce.store') }}" method="POST">
                      @csrf


                      <div class="mb-3">
                        <label for="type_annonce" class="form-label">Selectionner un type d'annonce</label>
                        <select class="form-select" name="type_annonce" id="type_annonce">
                          <option value="Location">Location</option>
                          <option value="Vente">Vente</option>

                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text"  name="description" class="form-control" id="description" placeholder="description">
                      </div>

                      <div class="mb-3">
                        <label for="statut" class="form-label">Statut</label>
                        <select class="form-select" name="statut" id="statut">
                          <option value="Disponible">Disponible</option>
                          <option value="Indisponible">Indisponible</option>

                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number"  name="prix" class="form-control" id="prix" placeholder="prix">
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
