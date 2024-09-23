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

                <h1 class="card-title mb-5">Ajouter un type de bien</h1>

                <div class="table-responsive">
                  <form action="{{ route('typebien.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                      <label for="type_bien" class="form-label">Type de bien</label>
                      <select class="form-select" name="type_bien" id="type_bien">
                        <option value="Terrain">Terrain</option>
                        <option value="Immeuble">Immeuble</option>
                        <option value="Maison">Maison</option>
                        <option value="Appartement">Appartement</option>
                        <option value="Parcelle">Parcelle</option>
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
