@extends('app')
@section('page')
<h5>User Registration</h5>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{route('createUser')}}">
    @csrf
    <label for="name">Name:</label><br>
    <input type="text" name="name" id="name" required><br>

    <label for="account_type">Account Type:</label><br>
    <select name="account_type" id="account_type" required>
        <option value="Individual">Individual</option>
        <option value="Business">Business</option>
    </select><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" required><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br>

    <button type="submit" class="btn btn-success mt-1">Register</button>
</form>
@endsection