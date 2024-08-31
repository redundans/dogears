@extends('layouts.default')
@section('content')

@if(isset($title))
    <h1>{{ $title }}</h1>
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

<div>
    <form method="POST" action="{{ route('collections.store') }}">
        <div>
            @csrf
            <input type="text" id="name" name="name" class="grow" placeholder="Name" />
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</div>

@stop
