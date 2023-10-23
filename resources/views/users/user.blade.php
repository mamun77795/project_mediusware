@extends('app')
@section('page')
<h5>Account Details</h5>


<table style="text-align:center;" class="table table-striped">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Account Type</th>
        <th>Balance</th>
    </tr>
    @if(isset($users))
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->account_type }}</td>
        <td>${{ $user->balance }}</td>
    </tr>
    @endforeach
    @endif

    @if(!isset($users))
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->account_type }}</td>
        <td>${{ $user->balance }}</td>
    </tr>
    @endif
</table>

@endsection