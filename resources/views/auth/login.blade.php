@extends('layouts.default')
@section('content')

@if ($errors->any())
    <div>
        <div>Something went wrong!</div>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('login.store') }}" method="POST">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" />
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="{{ old('password') }}" />
    </div>
    <div>
        <label for="remember">
            <input type="checkbox" id="remember" name="remember" />
            <span>Remember me</span>
        </label>
    </div>
    <div>
        <input type="submit" value="Login" />
        <a href="/register">Register</a>
    </div>
</form>

@stop
