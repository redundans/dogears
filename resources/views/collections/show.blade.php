@extends('layouts.default')
@section('content')

@include('collections.list')

@if(isset($collection))
    <h1>Collection: {{ $collection->name }}</h1>
@endif

@if(auth()->user())
<p>
    <a href="{{ route('collections.destroy', ['id' => $collection->id]) }}"">Delete collection</a>
</p>
@endif

@include('dogears.list')

@stop
