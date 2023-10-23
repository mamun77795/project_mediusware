<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showUser()
    {
        $id = session('user_id');
        $users = DB::select("select * from users where id='$id'");
        return view('users.user', compact('users'));
    }
    public function viewForm()
    {
        return view('users.create');
    }
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'account_type' => 'required|in:Individual,Business', // Enum values
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->account_type = $request->account_type;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $last_id = User::latest()->first();
        $session_id = session()->getId();
        session([
            'sess_id' => $session_id,
            'user_id' => $last_id->id,
            'user_email' => $last_id->email,
            'user_name' => $last_id->name
        ]);

        return view('users.user', ['user' => $last_id]);
    }

    public function loginForm()
    {
        return view('users.login');
    }

    public function showTransactions(Request $request)
    {

        $user_id = session('user_id');
        $user = User::find($user_id);
        $transactions = $user->transactions()->simplePaginate(5);

        $balance = $user->balance;

        return view('users.show_transactions', compact('balance', 'transactions'));
    }

    public function depositForm()
    {
        return view('users.make_deposit');
    }

    public function showDeposits(Request $request)
    {
        $id = session('user_id');
        $deposits = Transaction::where('user_id', $id)->where('transaction_type', 'deposit')->simplePaginate(5);

        return view('users.show_deposits', compact('deposits'));
    }

    public function makeDeposit(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        // Add the deposit transaction
        $transaction = new Transaction();
        $transaction->user_id = $request->id;
        $transaction->transaction_type = 'deposit';
        $transaction->amount = $data['amount'];
        $transaction->fee = 0; // Assuming no fee for deposits
        $transaction->date = now();
        $transaction->save();

        // Update the user's balance
        $user_id = session('user_id');
        $balance = $data['amount'];
        $u = User::find($user_id);
        $pre_balance = $u->balance;
        $new_balance = ($pre_balance + $balance);
        DB::select("update users set balance='$new_balance' where id='$user_id'");

        return redirect()->route('depositForm')->with('msg', 'Amount successfully deposited');
    }

    public function withdrawalForm()
    {
        return view('users.make_withdrawal');
    }

    public function showWithdrawals(Request $request)
    {
        $id = session('user_id');
        $withdrawals = Transaction::where('user_id', $id)->where('transaction_type', 'withdrawal')->simplePaginate(5);

        return view('users.show_withdrawals', compact('withdrawals'));
    }

    public function makeWithdrawal(Request $request)
    {
        $id = session('user_id');
        $user = User::find($id);

        if ($user->balance < $request->amount) {
            $msg = "balance is insufficient";
            return view('users.make_withdrawal', compact('msg'));
        }

        $data = $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        // Implement withdrawal fee logic based on account type
        $accountType = $user->account_type;
        $withdrawalFee = $accountType === 'Individual' ? 0.015 : 0.025;

        // Check for free withdrawal conditions for Individual accounts
        if ($accountType === 'Individual') {
            $today = now();
            if ($today->dayOfWeek === 5) {
                $withdrawalFee = 0; // Friday is free
            }
        }

        // Implement monthly free withdrawal limit
        $totalWithdrawalsThisMonth = Transaction::where('user_id', $user->id)
            ->where('transaction_type', 'withdrawal')
            ->whereMonth('date', now()->month)
            ->sum('amount');

        $freeWithdrawalLimit = $accountType === 'Individual' ? 5000 : null;

        if ($freeWithdrawalLimit && $totalWithdrawalsThisMonth + $data['amount'] <= $freeWithdrawalLimit) {
            $withdrawalFee = 0;
        }


        // Check for the business account threshold
        if ($accountType === 'Business' && $totalWithdrawalsThisMonth + $data['amount'] >= 50000) {
            $withdrawalFee = 0.015; // Decrease the fee
        }

        // Calculate the total fee
        if ($accountType === 'Individual' && $data['amount'] <= 1000) {
            $totalFee = 0;
        } else if ($accountType === 'Individual' && $data['amount'] > 1000) {
            $totalFee = ($data['amount'] - 1000) * $withdrawalFee;
        } else {
            $totalFee = $data['amount'] * $withdrawalFee;
        }

        // Add the withdrawal transaction
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->transaction_type = 'withdrawal';
        $transaction->amount = $data['amount'];
        $transaction->fee = $totalFee;
        $transaction->date = now();
        $transaction->save();

        // Update the user's balance
        $withdrawal_with_fee = $data['amount'] + $totalFee;
        $net_balance = ($user->balance - $withdrawal_with_fee);
        DB::select("update users set balance='$net_balance' where id='$id'");
        return redirect()->route('withdrawalForm')->with('msg', 'Withdrawal successfully completed');
    }

        // Authentication
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $u = DB::select("select * from users where email='$email'");

        if (count($u) != null) {
            if (Hash::check($password, $u[0]->password)) {
                $session_id = session()->getId();
                session([
                    'sess_id' => $session_id,
                    'user_id' => $u[0]->id,
                    'user_email' => $u[0]->email,
                    'user_name' => $u[0]->name
                ]);
            }
            return redirect()->to('/show_user');
        } else {
            return redirect()->to('/login_form');
        }
    }

    public function logout()
    {
        session()->forget(['sess_id', 'user_id', 'user_email', 'user_name']);
        session()->flush();
        session()->regenerate();
        return redirect()->to('/login_form');
    }
}
