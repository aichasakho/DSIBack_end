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
                <div class="d-flex flex-row gap-2">
                  <p class="card-description">
                    <a href="{{ route('add.client') }}">
                      <button type="button" class="btn btn-info">
                        Ajouter un client
                      </button>
                    </a>
                  </p>
                  <p class="card-description">
                    <a href="{{ route('add.proprietaire') }}">
                      <button type="button" class="btn btn-info">
                        Ajouter un proprietaire
                      </button>
                    </a>
                  </p>

                  <p class="card-description">
                    <a href="{{ route('add.agent') }}">
                      <button type="button" class="btn btn-info">
                        Ajouter un Agent
                      </button>
                    </a>
                  </p>

                </div>
                <hr>
                <h4 class="card-title">Liste des Utilisateurs</h4>

                <hr>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>
                        Nom
                      </th>
                      <th>
                        Prénom
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Téléphone
                      </th>

                      <th>
                        Role
                      </th>
                      <th>
                        Modifier
                      </th>
                      <th>
                        Supprimer
                      </th>
                      <th>
                        Bloquer
                      </th>
                      <th>
                        Débloquer
                      </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                      <tr>

                        <td> {{ $user->nom }}</td>
                        <td> {{ $user->prenom }}</td>
                        <td> {{ $user->email }}</td>
                        <td> {{ $user->tel }} </td>
                        <td> {{ $user->role}} </td>

                        <td>
                          @if ($user->role== 'admin')
                            <a href="{{ route('edit.agent', $user->id) }}">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                          @elseif($user->role =='client')
                            <a href="{{ route('edit.client', $user->id) }}">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                          @elseif ($user->role == 'proprietaire')
                            <a href="{{ route('edit.proprietaire', $user->id) }}">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                          @endif
                        </td>
                        <td>
                          <a href="">
                            <button class="btn btn-inverse-danger">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </a>
                        </td>
                        <td>
                          <a href="">
                            <button class="btn btn-inverse-secondary">
                              Bloquer
                            </button>
                          </a>
                        </td>

                        <td>
                          <a href="">
                            <button class="btn btn-inverse-warning">
                              Débloquer
                            </button>
                          </a>
                        </td>
                      </tr>

                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
{{--              {{ $users->links() }}--}}
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



  <!-- page-body-wrapper ends -->
</div>
@include("admin.pages.js")
</body>

</html>

