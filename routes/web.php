<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'createUser'])->name('createUser');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::middleware(['check'])->group(function(){
    Route::get('/', [UserController::class, 'showTransactions'])->name('showTransactions');
    Route::get('/deposit', [UserController::class, 'showDeposits'])->name('showDeposits');
    Route::post('/deposit', [UserController::class, 'makeDeposit'])->name('makeDeposit');
    Route::get('/withdrawal', [UserController::class, 'showWithdrawals'])->name('showWithdrawals');
    Route::post('/withdrawal', [UserController::class, 'makeWithdrawal'])->name('makeWithdrawal');

    Route::get('/show_user', [UserController::class, 'showUser'])->name('showUser');
    Route::get('/deposit_form', [UserController::class, 'depositForm'])->name('depositForm');
    Route::get('/withdrawal_form', [UserController::class, 'withdrawalForm'])->name('withdrawalForm');
});

Route::get('/login_form', [UserController::class, 'loginForm'])->name('loginForm');
Route::get('/register_users', [UserController::class, 'viewForm'])->name('viewForm');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');