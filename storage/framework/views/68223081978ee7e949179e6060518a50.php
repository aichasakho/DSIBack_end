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

<p><strong>Type:</strong> <?php echo e($annonce->type_annonce); ?></p>
<p><strong>Description:</strong> <?php echo e($annonce->description); ?></p>
<p><strong>Statut:</strong> <?php echo e($annonce->statut); ?></p>
<p><strong>Prix:</strong> <?php echo e($annonce->prix); ?></p>
<p><strong>Bien Immobilier:</strong> <?php echo e($annonce->bienImmobilier->nom_immeuble); ?></p>

<a href="<?php echo e(route('annonce.index')); ?>">Retour à la liste</a>
</body>
</html>


<?php /**PATH C:\Users\Claude\Desktop\Folders\Aicha_DSI\DSIBack_end\resources\views/admin/annonce/show.blade.php ENDPATH**/ ?>