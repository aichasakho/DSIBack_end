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
                    <a href="{{ route('annonce.create') }}">
                      <button type="button" class="btn btn-info">
                        Ajouter une annonce
                      </button>
                    </a>
                  </p>

                </div>
                <hr>
                <h4 class="card-title">Liste des Annonces</h4>

                <hr>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th> Image </th>
                      <th> Type d'annonce </th>
                      <th> Description </th>
                      <th> Prix </th>
                      <th> statut </th>
                      <th> Details </th>
                      <th> Modifier </th>
                    </tr>
                    </thead>

                    <tbody>
                    {{--                        @foreach($annonce as $a)--}}
                    {{--                        <tr>--}}
                    {{--                          <td class="py-1">--}}
                    {{--                            <img src="{{ $a?->bienImmobilier?->image }}" alt="image" /><br>--}}
                    {{--                          </td>--}}
                    {{--                          <td> {{ $a?->type_annonce }} </td>--}}
                    {{--                          <td> {{ $a?->description }} </td>--}}
                    {{--                          <td> {{ $a?->prix}} </td>--}}
                    {{--                          <td> {{ $a?->statut }} </td>--}}
                    {{--                          <td>--}}
                    {{--                            <button class="btn btn-inverse-info" onclick="showModal(event)" data-bien="{{ json_encode($a) }}">--}}
                    {{--                              <i class="mdi mdi-eye"></i>--}}
                    {{--                            </button>--}}
                    {{--                          </td>--}}
                    {{--                          <td>--}}
                    {{--                            <a href="{{ route('annonce.edit', $a) }}">--}}
                    {{--                              <button class="btn btn-inverse-success">--}}
                    {{--                                <i class="mdi mdi-pencil"></i>--}}
                    {{--                              </button>--}}
                    {{--                            </a>--}}
                    {{--                          </td>--}}
                    {{--                          <td>--}}
                    {{--                            <a href="{{ route('annonce.destroy', $a) }}">--}}
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
              {{ $annonce->links() }}
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


  <div class="modal fade" id="bienModal" tabindex="-1" aria-labelledby="bienModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="bienModalLabel">Détail de l'annonce</h1>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
        <div class="modal-body">
          <p id="bienImage"></p>
          <p>Type de l'annonce : <span id="typeAnnonce"></span></p>
          <p>Description: <span id="description"></span></p>
          <p>Prix: <span id="prix"></span></p>
          <p>Statut : <span id="statut"></span></p>

          {{-- TODO: Ajouter les autres informations du bien --}}
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
    console.log(annonce); // Pour vérifier la structure de l'objet

    // Utiliser les propriétés de l'objet 'appart'
    document.getElementById("bienImage").innerHTML = `<img src="${annonce.bienImmobilier ? annonce.bienImmobilier.image : 'Non spécifié'}" alt="image" class="img-fluid" />`;
    document.getElementById("typeAnnonce").innerHTML = annonce.type_annonce || 'Non spécifié';
    document.getElementById("description").innerHTML = annonce.description || 'Non spécifié';
    document.getElementById("prix").innerHTML = annonce.prix || 'Non spécifié';
    document.getElementById("statut").innerHTML = annonce.statut|| 'Non spécifié';

    // Affiche le modal
    $('#bienModal').modal('show');
  }
</script>
=======
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Liste</title>
</head>
<body>
<h1>Liste des Annonces</h1>
<table>
  <thead>
  <tr>
    <th>ID</th>
    <th>Type</th>
    <th>Description</th>
    <th>Prix</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
  @foreach($annonce as $a)
    <tr>
      <td>{{ $a->id }}</td>
      <td>{{ $a->type_annonce }}</td>
      <td>{{ $a->description }}</td>
      <td>{{ $a->prix }}</td>
      <td>
        <a href="{{ route('annonce.edit', $a->id) }}">Modifier</a>
        <form action="{{ route('annonce.destroy', $a->id) }}" method="POST" style="display:inline">
          @csrf
          @method('DELETE')
          <button type="submit">Supprimer</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{{ $annonce->links() }}


</body>
</html>

