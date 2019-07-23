<?php $__env->startSection('content'); ?>
  <div class="container mt-5">

    <h1>Inserisci un nuovo prodotto</h1>

    <form method="post" action="<?php echo e(route('products.store')); ?>">
      
      <?php echo csrf_field(); ?>
    <div class="form-group">
      <label for="name">Nome prodotto</label>
      <input type="text" class="form-control" name="name" placeholder="Inserisci il nome" value="<?php echo e(old('name')); ?>">
      
      <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
    <div class="form-group">
      <label for="description">Descrizione prodotto</label>
      <textarea name="description" class="form-control" placeholder="Inserisci la descrizione" rows="8" cols="80"><?php echo e(old('description')); ?></textarea>
      <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
    <div class="form-group">
      <label for="price">Prezzo prodotto</label>
      <input type="text" class="form-control" name="price" placeholder="Inserisci il prezzo" value="<?php echo e(old('price')); ?>">
      <?php if ($errors->has('price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('price'); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Es_9_23_Luglio_roles/resources/views/products/create.blade.php ENDPATH**/ ?>