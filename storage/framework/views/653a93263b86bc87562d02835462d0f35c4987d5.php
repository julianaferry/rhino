<?php $__env->startSection('content'); ?>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <?php if(session()->get('success')): ?>
    <div class="alert alert-success">
      <?php echo e(session()->get('success')); ?>  
    </div><br />
  <?php endif; ?>
  <table class="table table-striped">
    <thead>
        <tr>
          
          <td>Title</td>
          <td>Task</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tasks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
           
            <h1><?php echo e($tasks->title); ?></h1>
            <h1><?php echo e($tasks->body); ?></h1>
            <a href="<?php echo e(route('tasks.edit', $tasks->id)); ?>" class="btn btn-primary">Edit</a>
            <div>
                <form action="<?php echo e(route('tasks.destroy', $tasks->id)); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
<div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\rhino\resources\views/tasks/index.blade.php */ ?>