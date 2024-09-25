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

                <h1 class="card-title mb-5">Ajouter un reglement</h1>

                <div class="table-responsive">
                  <form action="{{ route('reglement.store') }}" method="POST">
                    @csrf


                    <div class="mb-3">
                      <label for="numero_reglement" class="form-label">N°reglement</label>
                      <input type="text" name="numero_reglement" class="form-control" id="numero_reglement"
                             placeholder="">
                    </div>

                    <div class="mb-3">
                      <label for="date_reglement" class="form-label">Date règlement</label>
                      <input type="date" name="date_reglement" class="form-control" id="date_reglement"
                             placeholder="">
                    </div>

                    {{-- agents --}}

                    <div class="mb-3">
                      <label for="agent_id" class="form-label">Agent</label>
                      <select class="form-select" name="agent_id" id="agent_id">
                        @foreach ($agents as $agent)
                          <option value="{{ $agent->id }}">
                            {{ $agent->nom }}
                          </option>
                        @endforeach
                      </select>
                    </div>




                    {{-- Id contrat --}}

                    <div class="mb-3">
                      <label for="contrat_id" class="form-label">Id Contrat</label>
                      <select class="form-select" name="contrat_id" id="contrat_id">
                        @foreach ($contrat as $c)
                          <option value="{{ $c->id }}">
                            {{ $c->contrat_id }}
                          </option>
                        @endforeach
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
