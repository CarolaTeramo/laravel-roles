<?php $__env->startSection('content'); ?>
  <div class="container mt-5">
    <h1>Tutti i prodotti</h1>
    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success">Aggiungi un nuovo prodotto</a>
    <table class="table mt-3">
  <thead>
    <tr>
      <th >id</th>
      <th >Nome</th>
      <th >Descrizione</th>
      <th >Prezzo</th>
      <th >Azioni</th>
    </tr>
  </thead>
  <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <th ><?php echo e($product->id); ?></th>
        <td><?php echo e($product->name); ?></td>
        <td><?php echo e($product->description); ?></td>
        <td><?php echo e($product->price); ?></td>
        <td><a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-primary">Visualizza</a></td>
        <td><a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-warning">Modifica</a></td>
        <td>
          <form class="" action="<?php echo e(route('products.destroy', $product->id)); ?>" method="post">
            <?php echo method_field('DELETE'); ?>
            <?php echo csrf_field(); ?>
            <input class="btn btn-danger" type="submit" name="" value="Elimina">
          </form>
        </td>
      </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <p>Non ci sono prodotti</p>
    <?php endif; ?>

  </tbody>
</table>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Es_9_23_Luglio_roles/resources/views/products/index.blade.php ENDPATH**/ ?>