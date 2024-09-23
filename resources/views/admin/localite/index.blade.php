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
                    <a href="{{ route('localite.create') }}">
                      <button type="button" class="btn btn-info">
                        Ajouter une localité
                      </button>
                    </a>
                  </p>

                </div>
                <hr>
                <h4 class="card-title">Liste des localités</h4>

                <hr>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th> Région </th>
                      <th> Ville </th>
                      <th> Quartier </th>
                      <th> Modifier </th>
                      <th> Supprimer </th>

                    </tr>
                    </thead>

                    <tbody>
                    {{--                        @foreach($localites as $localite)--}}
                    {{--                        <tr>--}}
                    {{--                          <td> {{ $localite?->region }} </td>--}}
                    {{--                          <td> {{ $localite?->ville }} </td>--}}
                    {{--                          <td> {{ $localite?->quartier}} </td>--}}
                    {{--                          <td>--}}
                    {{--                            <button class="btn btn-inverse-info" onclick="showModal(event)" data-bien="{{ json_encode($localite) }}">--}}
                    {{--                              <i class="mdi mdi-eye"></i>--}}
                    {{--                            </button>--}}
                    {{--                          </td>--}}
                    {{--                          <td>--}}
                    {{--                            <a href="{{ route('localite.edit', $localite) }}">--}}
                    {{--                              <button class="btn btn-inverse-success">--}}
                    {{--                                <i class="mdi mdi-pencil"></i>--}}
                    {{--                              </button>--}}
                    {{--                            </a>--}}
                    {{--                          </td>--}}
                    {{--                          <td>--}}
                    {{--                            <a href="{{ route('localite.destroy', $localite) }}">--}}
                    {{--                              <button class="btn btn-inverse-danger">--}}
                    {{--                                <i class="mdi mdi-delete"></i>--}}
                    {{--                              </button>--}}
                    {{--                            </a>--}}
                    {{--                          </td>--}}
                    {{--                        </tr>--}}
                    {{--                        @endforeach--}}
                    </tbody>
                  </table>
                </div>
              </div>
{{--              {{ $localites->links() }}--}}
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

