
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>modification</title>
</head>
<body>
   <h1><?php echo e(isset($annonce) ? 'Modifier l\'annonce' : 'Créer une nouvelle annonce'); ?></h1>

<form action="<?php echo e(isset($annonce) ? route('annonce.update', $annonce->id) : route('annonce.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php if(isset($annonce)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <div>
        <label>Type Annonce</label>
        <select name="type_annonce">
            <option value="location" <?php echo e((isset($annonce) && $annonce->type_annonce == 'location') ? 'selected' : ''); ?>>Location</option>
            <option value="vente" <?php echo e((isset($annonce) && $annonce->type_annonce == 'vente') ? 'selected' : ''); ?>>Vente</option>
        </select>
    </div>

    <div>
        <label>Description</label>
        <textarea name="description"><?php echo e(isset($annonce) ? $annonce->description : old('description')); ?></textarea>
    </div>

    <div>
        <label>Statut</label>
        <select name="statut">
            <option value="disponible" <?php echo e((isset($annonce) && $annonce->statut == 'disponible') ? 'selected' : ''); ?>>Disponible</option>
            <option value="indisponible" <?php echo e((isset($annonce) && $annonce->statut == 'indisponible') ? 'selected' : ''); ?>>Indisponible</option>
        </select>
    </div>

    <div>
        <label>Prix</label>
        <input type="text" name="prix" value="<?php echo e(isset($annonce) ? $annonce->prix : old('prix')); ?>">
    </div>

    <div>
        <label>Bien Immobilier</label>
        <select name="bien_immobilier_id">
            <?php $__currentLoopData = $immeubles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $nom_immeuble): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($id); ?>" <?php echo e((isset($annonce) && $annonce->bien_immobilier_id == $id) ? 'selected' : ''); ?>><?php echo e($nom_immeuble); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <button type="submit"><?php echo e(isset($annonce) ? 'Mettre à jour' : 'Créer'); ?></button>
</form>


</body>
</html>
<?php /**PATH C:\xampp\htdocs\DSIBack_end\resources\views/admin/annonce/edit.blade.php ENDPATH**/ ?>