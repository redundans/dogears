@extends('layouts.default')
@section('content')

@if(isset($title))
    <h1 class="text-xl font-bold mb-9">{{ $title }}</h1>
@endif

<ul class="flex flex-col my-9 divide-y">
@foreach($tags as $tag)
    <li class="flex flex-row gap-2 py-6">
        <a href="{{ route('tags.show', ['slug' => $tag->slug]) }}">{{ $tag->name }}</a> <span class="flex items-center">{{ count($tag->dogears) }}</span>
    </li>
@endforeach
</ul>

@stop
