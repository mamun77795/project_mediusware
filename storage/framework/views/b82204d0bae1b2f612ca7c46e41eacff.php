
<?php $__env->startSection('page'); ?>
<h5>Make a Deposit</h5>
<?php if(session('msg')): ?>
<h5 class="text-success">
    <?php echo e(session('msg')); ?>

</h5>
<?php endif; ?>
<?php if(isset($msg)): ?>
<h5 class="text-danger">
    <?php echo e($msg); ?>

</h5>
<?php endif; ?>

<form method="POST" action="<?php echo e(route('makeDeposit')); ?>">
    <?php echo csrf_field(); ?>
    <label for="amount">Amount:</label>
    <input type="number" step="0.01" name="amount" id="amount" required><br>
    <input type="hidden" name="id" value="<?php echo e(session('user_id')); ?>"><br>

    <button type="submit">Submit</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel\project_mediusware\resources\views/users/make_deposit.blade.php ENDPATH**/ ?>