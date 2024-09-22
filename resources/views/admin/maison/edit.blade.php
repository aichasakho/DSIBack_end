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

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h1 class="card-title mb-5">Modifier une nouvelle maison</h1>

                  <div class="table-responsive">
                    <form action="{{ route('update.maison', $maison) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="agent_id" value="{{ Auth::user()->id }}">
                      <div class="my-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image" value="{{ old('image') }}"
                          placeholder="image">
                      </div>


                      <div class="my-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" name="prix" class="form-control" value="{{ old('prix', $maison->prix) }}"
                          id="prix" placeholder="100000">
                      </div>

                      <div class="mb-3">
                        <label for="superficie" class="form-label">Superficie</label>
                        <input type="number" max="10" name="superficie"
                          value="{{ old('superficie', $maison->superficie) }}" class="form-control" id="superficie"
                          placeholder="3">
                      </div>


                      {{-- choisir proprietaire --}}
                      <div class="my-3">
                        <label for="proprietaire" class="form-label">
                          Selectionner proprietaire
                        </label>
                        <select class="form-select" name="proprietaire_id" id="proprietaire"
                          aria-label="Selectionner un proprietaire">
                          <option value="{{ $maison->proprietaire_id }}" selected>
                            {{ $maison->proprietaire->nom }} {{ $maison->proprietaire->prenoms }}
                          </option>
                          @foreach ($proprietaires as $proprio)
                          <option value="{{ $proprio->id }}">
                            {{ $proprio->nom }} {{ $proprio->prenoms }}
                          </option>
                          @endforeach
                        </select>
                      </div>

                      <input type="hidden" name="type_bien_id" value="3">

                      {{-- choisir localite --}}
                      <div class="mb-3">
                        <label for="localite" class="form-label">Selectionner une localite</label>
                        <select class="form-select" name="localite_id" id="localite"
                          aria-label="Selectionner une localite">
                          <option value="{{ $maison->localite_id }}" selected>
                            {{ $maison->localite->ville }} {{ $maison->localite->quartier }}
                          </option>
                          @foreach ($localites as $localite)
                          <option value="{{ $localite->id }}">
                            {{ $localite->ville }} {{ $localite->quartier }}
                          </option>
                          @endforeach
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="nbr_piece" class="form-label">Nombre de pièce</label>
                        <input type="number" max="10" name="nbr_piece"
                          value="{{ old('nbr_piece', $maison->nbr_piece) }}" class="form-control" id="nbr_piece"
                          placeholder="3">
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

    <!-- page-body-wrapper ends -->
    @include("admin.pages.js")
</body>

</html>
