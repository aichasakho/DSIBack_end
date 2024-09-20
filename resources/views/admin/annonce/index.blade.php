<!DOCTYPE html>
<html lang="en">
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
