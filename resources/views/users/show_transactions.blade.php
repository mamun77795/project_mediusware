@extends('app')
@section('page')
<h3>Transactions and Balance</h3>

<p>Current Balance: ${{ $balance }}</p>

<h5>Transactions:</h5>
<table class="table table-striped">
    <tr>
        <th>Transaction ID</th>
        <th>Transaction Type</th>
        <th>Amount</th>
        <th>Fee</th>
        <th>Date</th>
    </tr>
    @foreach ($transactions as $transaction)
    <tr>
        <td>{{ $transaction->id }}</td>
        <td>{{ $transaction->transaction_type }}</td>
        <td>${{ $transaction->amount }}</td>
        <td>${{ $transaction->fee }}</td>
        <td>{{ $transaction->date }}</td>
    </tr>
    @endforeach
</table>
{{ $transactions->links() }}
@endsection