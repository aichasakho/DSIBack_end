
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>modification</title>
</head>
<body>
   <h1>{{ isset($annonce) ? 'Modifier l\'annonce' : 'Créer une nouvelle annonce' }}</h1>

<form action="{{ isset($annonce) ? route('annonce.update', $annonce->id) : route('annonce.store') }}" method="POST">
    @csrf
    @if(isset($annonce))
        @method('PUT')
    @endif

    <div>
        <label>Type Annonce</label>
        <select name="type_annonce">
            <option value="location" {{ (isset($annonce) && $annonce->type_annonce == 'location') ? 'selected' : '' }}>Location</option>
            <option value="vente" {{ (isset($annonce) && $annonce->type_annonce == 'vente') ? 'selected' : '' }}>Vente</option>
        </select>
    </div>

    <div>
        <label>Description</label>
        <textarea name="description">{{ isset($annonce) ? $annonce->description : old('description') }}</textarea>
    </div>

    <div>
        <label>Statut</label>
        <select name="statut">
            <option value="disponible" {{ (isset($annonce) && $annonce->statut == 'disponible') ? 'selected' : '' }}>Disponible</option>
            <option value="indisponible" {{ (isset($annonce) && $annonce->statut == 'indisponible') ? 'selected' : '' }}>Indisponible</option>
        </select>
    </div>

    <div>
        <label>Prix</label>
        <input type="text" name="prix" value="{{ isset($annonce) ? $annonce->prix : old('prix') }}">
    </div>

    <div>
        <label>Bien Immobilier</label>
        <select name="bien_immobilier_id">
            @foreach($immeubles as $id => $nom_immeuble)
            <option value="{{ $id }}" {{ (isset($annonce) && $annonce->bien_immobilier_id == $id) ? 'selected' : '' }}>{{ $nom_immeuble }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">{{ isset($annonce) ? 'Mettre à jour' : 'Créer' }}</button>
</form>


</body>
</html>
