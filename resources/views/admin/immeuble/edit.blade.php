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


<!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="staticBackdropLabel">Modifier-un-propriétaire</h4>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
        <div class="modal-body">
            <form action="{{route('update.proprio')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Nom</label>
  <input type="text" name="nom" value="{{$user->nom}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Prenom</label>
  <input type="text" value="{{$user->prenom}}" name="prenom" class="form-control" id="exampleInputPassword1">
</div>

<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Email</label>
  <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputPassword1">
</div>

<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Tel</label>
  <input type="text" name="tel" value="{{$user->tel}}" class="form-control" id="exampleInputPassword1">
</div>

<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Profile</label>
  <input type="file" name="profile" class="form-control" id="exampleInputPassword1">
</div>


<div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Adresse</label>
  <input type="text" value="{{$user->adresse}}" name="adresse" class="form-control" id="exampleInputPassword1">
</div>

<input type="hidden" name="id" value="{{$user->id}}">

<button type="submit" class="btn btn-primary">Submit</button>
</form>
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
