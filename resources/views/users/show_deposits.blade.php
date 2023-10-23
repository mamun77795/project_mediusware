@extends('app')
@section('page')
<h5>Deposit Transactions:</h5>

<table style="text-align:center;" class="table table-striped">
    <tr>
        <th>Transaction ID</th>
        <th>Amount</th>
        <th>Fee</th>
        <th>Date</th>
    </tr>
    @foreach ($deposits as $deposit)
    <tr>
        <td>{{ $deposit->id }}</td>
        <td>${{ $deposit->amount }}</td>
        <td>${{ $deposit->fee }}</td>
        <td>{{ $deposit->date }}</td>
    </tr>
    @endforeach
</table>
{{ $deposits->links() }}

@endsection