<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Détails</title>
</head>
<body>
   <h1>Détails de l'Annonce</h1>

<p><strong>Type:</strong> {{ $annonce->type_annonce }}</p>
<p><strong>Description:</strong> {{ $annonce->description }}</p>
<p><strong>Statut:</strong> {{ $annonce->statut }}</p>
<p><strong>Prix:</strong> {{ $annonce->prix }}</p>
<p><strong>Bien Immobilier:</strong> {{ $annonce->bienImmobilier->nom_immeuble }}</p>

<a href="{{ route('annonce.index') }}">Retour à la liste</a>
</body>
</html>


