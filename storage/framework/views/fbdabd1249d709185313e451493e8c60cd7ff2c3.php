<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Task
  </div>
  <div class="card-body">
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div><br />
    <?php endif; ?>
      <form method="post" action="<?php echo e(route('tasks.update', $share->id)); ?>">
        <?php echo method_field('PATCH'); ?>
        <?php echo csrf_field(); ?>
        <div class="form-group">
          <label for="title">Task Title:</label>
          <input type="text" class="form-control" name="title" value=<?php echo e($tasks->title); ?>/>
        </div>
        <div class="form-group">
          <label for="body">Task Detail:</label>
          <textarea class="form-control" name="body" value=<?php echo e($tasks->body); ?>></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\rhino\resources\views/tasks/edit.blade.php */ ?>