<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contrat </title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9; }
    h1, h2, h3, p { margin: 10px 0; }
    .contract {
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .signature { margin-top: 40px; }
    .signature div { margin-top: 60px; }
  </style>
</head>
<body>

<div class="container">
  @foreach ($contrats as $contrat)
    <div class="fiche">
      <h3>Contrat N°: {{ $contrat->id }}</h3>
      <p><strong>Client:</strong> {{ $contrat->client->nom }} {{ $contrat->client->prenom }}</p>
      <p><strong>Bien Immobilier:</strong> {{ $contrat->bien_immobilier->nom_immeuble }}</p>
      <p><strong>Date Début:</strong> {{ $contrat->date_debut }}</p>
      <p><strong>Date Fin:</strong> {{ $contrat->date_fin }}</p>
      <p><strong>Montant:</strong> {{ $contrat->montant }}</p>
    </div>
  @endforeach

  <h2>Article 1 : Objet du Contrat</h2>
  <p>Le présent contrat a pour objet de définir les conditions dans lesquelles {{ $contrat->description }}.</p>

  <h2>Article 2 : Durée du Contrat</h2>
  <p>Le présent contrat prend effet à compter du {{ \Carbon\Carbon::parse($contrat->date_debut)->format('d/m/Y') }} et se terminera le {{ \Carbon\Carbon::parse($contrat->date_fin)->format('d/m/Y') }}, sauf résiliation anticipée dans les conditions prévues à l'article 5.</p>

  <h2>Article 3 : Conditions Financières</h2>
  <p>Le montant total du contrat s'élève à {{ number_format($contrat->montant, 2, ',', ' ') }} euros, payable comme suit :</p>
  <p>[Détails des paiements : acompte, échéances, etc.]</p>

  <h2>Article 4 : Obligations des Parties</h2>
  <h3>4.1 Obligations de {{ $contrat->agent->nom }}</h3>
  <p>[Détails des obligations de l’entreprise]</p>

  <h3>4.2 Obligations de {{ $contrat->client->nom }}</h3>
  <p>[Détails des obligations du client]</p>

  <h2>Article 5 : Résiliation</h2>
  <p>Chacune des parties peut résilier le contrat en cas de non-respect des obligations prévues, après mise en demeure restée sans effet pendant [nombre de jours] jours.</p>

  <h2>Article 6 : Confidentialité</h2>
  <p>Les parties s'engagent à garder confidentielles toutes les informations obtenues dans le cadre de l'exécution du présent contrat.</p>

  <h2>Article 7 : Loi Applicable</h2>
  <p>Le présent contrat est soumis à la loi [Nom du Pays ou État]. Tout litige relatif à l’interprétation ou l'exécution du contrat sera soumis aux tribunaux compétents.</p>

  <div class="signature">
    <p>Fait à [Lieu], le {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
    <div>
      <p>_____________________________</p>
      <p>{{ $contrat->agent->nom }}</p>
      <p>Représentant : [Nom]</p>
      <p>Titre : [Titre]</p>
    </div>
    <div>
      <p>_____________________________</p>
      <p>{{ $contrat->client->nom }} {{ $contrat->client->prenom }}</p>
      <p>Représentant : [Nom]</p>
      <p>Titre : [Titre]</p>
    </div>
  </div>
</div>
</body>
</html>
