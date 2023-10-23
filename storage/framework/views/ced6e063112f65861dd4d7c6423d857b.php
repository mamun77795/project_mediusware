<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Banking System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if(session('user_id') == null): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('viewForm')); ?>">Register User</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('showTransactions')); ?>">All Transaction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('depositForm')); ?>">Make Deposit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('showDeposits')); ?>">Show Deposits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('withdrawalForm')); ?>">Make Withdraw</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('showWithdrawals')); ?>">Show Withdrawals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('showUser')); ?>">Account Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <?php echo $__env->yieldContent('page'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html><?php /**PATH D:\xampp\htdocs\laravel\project_mediusware\resources\views/app.blade.php ENDPATH**/ ?>