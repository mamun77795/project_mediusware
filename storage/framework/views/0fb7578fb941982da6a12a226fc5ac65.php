
<?php $__env->startSection('page'); ?>
<h5>Withdrawal Transactions:</h5>
<table class="table table-striped">
    <tr>
        <th>Transaction ID</th>
        <th>Amount</th>
        <th>Fee</th>
        <th>Date</th>
    </tr>
    <?php $__currentLoopData = $withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdrawal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($withdrawal->id); ?></td>
        <td>$<?php echo e($withdrawal->amount); ?></td>
        <td>$<?php echo e($withdrawal->fee); ?></td>
        <td><?php echo e($withdrawal->date); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php echo e($withdrawals->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel\project_mediusware\resources\views/users/show_withdrawals.blade.php ENDPATH**/ ?>