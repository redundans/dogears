@extends('layouts.default')
@section('content')

@if(isset($title))
    <h1 class="text-xl font-bold mb-9">{{ $title }}</h1>
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

<div class="p-6 border rounded bg-gray-100">
    <form method="POST" action="{{ route('collections.store') }}" class="flex flex-row gap-6">
        @csrf
        <input type="text" id="name" name="name" class="grow" placeholder="Name" />
        <input type="submit" value="Submit">
    </form>
</div>

@stop
