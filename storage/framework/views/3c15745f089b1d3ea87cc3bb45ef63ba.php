
<?php $__env->startSection('page'); ?>

<h5>User Login</h5>

<?php if(session('message')): ?>
<div class="alert alert-success">
    <?php echo e(session('message')); ?>

</div>
<?php endif; ?>

<?php if(session('error')): ?>
<div class="alert alert-danger">
    <?php echo e(session('error')); ?>

</div>
<?php endif; ?>

<form method="POST" action="<?php echo e(route('login')); ?>">
    <?php echo csrf_field(); ?>
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br>
    <button type="submit" class="btn btn-success mt-1">Login</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel\project_mediusware\resources\views/users/login.blade.php ENDPATH**/ ?>