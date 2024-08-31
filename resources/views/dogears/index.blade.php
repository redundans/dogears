@extends('layouts.default')
@section('content')

@include('collections.list')

@if(isset($title))
    <h1>{{ $title }}</h1>
@else
    <h1>Latest</h1>
@endif

@include('dogears.list')

@stop
