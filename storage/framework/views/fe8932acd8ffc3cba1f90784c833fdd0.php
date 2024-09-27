<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reglement</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; background-color: #f9f9f9; }
    .container {
      max-width: 800px; /* Largeur maximale du conteneur */
      margin: auto; /* Centrer le conteneur */
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    h1, h3, h4 { text-align: center; }
    .details {
      margin: 20px 0;
    }
    .details p {
      margin: 5px 0;
      color: #555;
    }
    .details strong {
      color: #000;
    }
    .footer {
      margin-top: 30px;
      text-align: center;
    }
  </style>
</head>
<body>
<h1>Reglement</h1>
<div class="container">
  <?php $__currentLoopData = $reglements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reglement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="details">
      <h3>Règlement N°: <?php echo e($reglement->numero_reglement); ?></h3>
      <p><strong>Nom Client:</strong> <?php echo e($reglement->nom); ?></p>
      <p><strong>Date de Règlement:</strong> <?php echo e(\Carbon\Carbon::parse($reglement->date_reglement)->format('d/m/Y')); ?></p>
      <p><strong>Montant:</strong> <?php echo e(number_format($reglement->contrat->montant, 2, ',', ' ')); ?> F</p>
      <p><strong>Agent:</strong> <?php echo e($reglement->agent->prenom); ?> <?php echo e($reglement->agent->nom); ?></p>
      <p><strong>ID Contrat:</strong> <?php echo e($reglement->contrat_id); ?></p>
    </div>
    <hr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <div class="footer">
    <p>Merci pour votre paiement !</p>
    <p>Pour toute question, veuillez contacter notre service clientèle.</p>
  </div>
</div>
</body>
</html>
<?php /**PATH C:\Users\sakho\DSIBack_end\resources\views/admin/reglement/pdf.blade.php ENDPATH**/ ?>