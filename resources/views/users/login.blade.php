@extends('app')
@section('page')

<h5>User Login</h5>

@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form method="POST" action="{{route('login')}}">
    @csrf
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br>
    <button type="submit" class="btn btn-success mt-1">Login</button>
</form>
@endsection