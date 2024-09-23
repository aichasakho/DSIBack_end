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


                <div class="table-responsive">
                  <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="my-3">
                      <label for="nom" class="form-label">Nom </label>
                      <input type="text" name="nom" class="form-control" id="nom"
                             value="{{ old('nom') }}" placeholder="Nom">
                    </div>

                    <div class="my-3">
                      <label for="prenom" class="form-label">Prénom </label>
                      <input type="text" name="prenom" class="form-control" id="prenom"
                             value="{{ old('prenom') }}" placeholder="Prenom">
                    </div>

                    <div class="my-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email"
                             placeholder="email">
                    </div>

                    <div class="mb-3">
                      <label for="role" class="form-label">Role</label>
                      <select class="form-select" name="role" id="role">
                        <option value="Admin">Admin</option>
                        <option value="Proprietaire">Proprietaire</option>
                        <option value="Client">Client</option>
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
@include("admin.pages.js")
</body>

</html>
