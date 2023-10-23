
<?php $__env->startSection('page'); ?>
<h5>Deposit Transactions:</h5>

<table style="text-align:center;" class="table table-striped">
    <tr>
        <th>Transaction ID</th>
        <th>Amount</th>
        <th>Fee</th>
        <th>Date</th>
    </tr>
    <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($deposit->id); ?></td>
        <td>$<?php echo e($deposit->amount); ?></td>
        <td>$<?php echo e($deposit->fee); ?></td>
        <td><?php echo e($deposit->date); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php echo e($deposits->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel\project_mediusware\resources\views/users/show_deposits.blade.php ENDPATH**/ ?>