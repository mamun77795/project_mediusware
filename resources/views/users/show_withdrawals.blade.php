@extends('app')
@section('page')
<h5>Withdrawal Transactions:</h5>
<table class="table table-striped">
    <tr>
        <th>Transaction ID</th>
        <th>Amount</th>
        <th>Fee</th>
        <th>Date</th>
    </tr>
    @foreach ($withdrawals as $withdrawal)
    <tr>
        <td>{{ $withdrawal->id }}</td>
        <td>${{ $withdrawal->amount }}</td>
        <td>${{ $withdrawal->fee }}</td>
        <td>{{ $withdrawal->date }}</td>
    </tr>
    @endforeach
</table>
{{ $withdrawals->links() }}
@endsection