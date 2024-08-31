@extends('layouts.default')
@section('content')

@if(isset($title))
    <h1 class="text-xl font-bold mb-9">{{ $title }}</h1>
@endif

@include('search.form')

@if($dogear)
    <div class="flex flex-col gap-3">
        <h1 class="text-xl font-bold">{{ $dogear->name }}</h1>
        <a href="{{ $dogear->url }}" target="_blank" rel="noopener noreferrer" class="flex flex-row items-center gap-2">
            {{ $dogear->url }}
        </a>
        @if($dogear->description)
            <p class="text-sm text-gray-500">{{ $dogear->description }}</p>
        @endif
        @if($dogear->excerpt)
            <p class="text-sm text-gray-500">{{ $dogear->excerpt }}</p>
        @endif
        <div class="flex flex-row gap-2 items-center text-sm">
            <span>In your collection:</span>
            <ul class="flex flex-row gap-2">
            @foreach($dogear->collections as $collection)
                <li>
                    <a class="bg-gray-100 hover:bg-black hover:text-white rounded-full px-2 py-1 text-xs leading-none no-underline" href="{{ route('collections.show', ['id' => $collection->id]) }}">
                        {{ $collection->name }}
                    </a>
                </li>
            @endforeach
            </ul>
        </div>

        @if($dogear->comments)
            <hr class="my-9" />
            <div id="comments" class="border bg-gray-100 rounded p-6 flex flex-col gap-3">
                <h3 class="font-bold">Kommentarer:</h3>
                <ol class="list-decimal flex flex-col gap-3 px-4">
                @foreach($dogear->comments as $comment)
                    <li>{{ $comment->content }} by <a href="{{ route('users.show', ['id'=>$comment->user()->id]) }}">{{ $comment->user()->name }}</li>
                @endforeach
                </ol>
            </div>
        @endif

        @if(auth()->user())
            <div class="p-6 border rounded bg-gray-100 mb-9">
                <form method="POST" action="{{ route('comments.store') }}" class="flex flex-col gap-6">
                    @csrf
                    <textarea id="content" name="content" class="w-full h-20"></textarea>
                    <input type="hidden" id="comment_id" name="comment_id" value="0" />
                    <input type="hidden" id="dog_ear_id" name="dog_ear_id" value="{{ $dogear->id }}" />
                    <input type="submit" value="Submit">
                </form>
            </div>
        @endif
    </div>
@endif

@stop
