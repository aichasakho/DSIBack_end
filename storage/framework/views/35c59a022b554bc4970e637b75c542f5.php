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
        <?php $__currentLoopData = $annonce; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($a->id); ?></td>
            <td><?php echo e($a->type_annonce); ?></td>
            <td><?php echo e($a->description); ?></td>
            <td><?php echo e($a->prix); ?></td>
            <td>
                <a href="<?php echo e(route('annonce.edit', $a->id)); ?>">Modifier</a>
                <form action="<?php echo e(route('annonce.destroy', $a->id)); ?>" method="POST" style="display:inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo e($annonce->links()); ?>



</body>
</html>
<?php /**PATH C:\xampp\htdocs\DSIBack_end\resources\views/admin/annonce/index.blade.php ENDPATH**/ ?>