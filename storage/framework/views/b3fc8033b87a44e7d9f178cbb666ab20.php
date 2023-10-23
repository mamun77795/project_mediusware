
<?php $__env->startSection('page'); ?>
<h5>Account Details</h5>


<table style="text-align:center;" class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Account Type</th>
        <th>Balance</th>
    </tr>
    <?php if(isset($users)): ?>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($user->name); ?></td>
        <td><?php echo e($user->email); ?></td>
        <td><?php echo e($user->account_type); ?></td>
        <td>$<?php echo e($user->balance); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(!isset($users)): ?>
    <tr>
        <td><?php echo e($user->name); ?></td>
        <td><?php echo e($user->email); ?></td>
        <td><?php echo e($user->account_type); ?></td>
        <td>$<?php echo e($user->balance); ?></td>
    </tr>
    <?php endif; ?>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel\project_mediusware\resources\views/users/user.blade.php ENDPATH**/ ?>