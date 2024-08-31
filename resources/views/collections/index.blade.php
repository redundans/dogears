@extends('layouts.default')
@section('content')

@if(isset($title))
    <h1 class="">{{ $title }}</h1>
@endif

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

@stop
