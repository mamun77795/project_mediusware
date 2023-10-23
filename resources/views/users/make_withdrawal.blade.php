@extends('app')
@section('page')

<h5>Make a Withdrawal</h5>
@if(session('msg'))
<h5 class="text-success">
    {{ session('msg') }}
</h5>
@endif
@if(isset($msg))
<h5 class="text-danger">
    {{ $msg }}
</h5>
@endif

<form method="POST" action="{{route('makeWithdrawal')}}">
    @csrf
    <label for="amount">Amount:</label>
    @if(isset($error))<h3 style="color:red;">{{$error}}</h3> @endif
    <input type="number" step="0.01" name="amount" id="amount" required><br>
    <input type="hidden" name="id" value="{{ session('user_id')}}"><br>
    <button type="submit">Submit</button>
</form>
@endsection