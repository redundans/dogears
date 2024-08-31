@extends('layouts.default')
@section('content')

@if(isset($title))
    <h1>{{ $title }}</h1>
@endif

@include('dogears.list')

@stop
