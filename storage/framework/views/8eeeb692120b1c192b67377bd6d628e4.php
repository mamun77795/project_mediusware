
<?php $__env->startSection('page'); ?>
<h3>Transactions and Balance</h3>

<p>Current Balance: $<?php echo e($balance); ?></p>

<h5>Transactions:</h5>
<table class="table table-striped">
    <tr>
        <th>Transaction ID</th>
        <th>Transaction Type</th>
        <th>Amount</th>
        <th>Fee</th>
        <th>Date</th>
    </tr>
    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($transaction->id); ?></td>
        <td><?php echo e($transaction->transaction_type); ?></td>
        <td>$<?php echo e($transaction->amount); ?></td>
        <td>$<?php echo e($transaction->fee); ?></td>
        <td><?php echo e($transaction->date); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php echo e($transactions->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel\project_mediusware\resources\views/users/show_transactions.blade.php ENDPATH**/ ?>