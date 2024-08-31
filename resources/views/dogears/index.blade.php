@extends('layouts.default')
@section('content')

@if(isset($title))
    <h1 class="text-xl font-bold mb-9">{{ $title }}</h1>
@endif

@include('search.form')

@include('dogears.list')

@stop
