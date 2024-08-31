@extends('layouts.default')
@section('content')

@if($dogear)
    <div>
        <h1>{{ $dogear->name }}</h1>
        <a href="{{ $dogear->url }}" target="_blank" rel="noopener noreferrer">
            {{ $dogear->url }}
        </a>
        @if($dogear->description)
            <p>{{ $dogear->description }}</p>
        @endif
        @if($dogear->excerpt)
            <p>{{ $dogear->excerpt }}</p>
        @endif
        <div>
            <h2>Collection</h2>
            <ul>
            @foreach($dogear->collections as $collection)
                <li>
                    <a href="{{ route('collections.show', ['id' => $collection->id]) }}">
                        {{ $collection->name }}
                    </a>
                </li>
            @endforeach
            </ul>
        </div>

        @if(count($dogear->comments)>0)
            <div>
                <h3>Comments</h3>
                <ol>
                @foreach($dogear->comments as $comment)
                    <li>{{ $comment->content }} by <a href="{{ route('users.show', ['id'=>$comment->user()->id]) }}">{{ $comment->user()->name }}</li>
                @endforeach
                </ol>
            </div>
        @endif

        @if(auth()->user())
            <h3>Comment</h3>
            <form method="POST" action="{{ route('comments.store') }}">
                <div>
                    @csrf
                    <textarea id="content" name="content" rows="4"></textarea>
                </div>
                <div>
                    <input type="hidden" id="comment_id" name="comment_id" value="0" />
                    <input type="hidden" id="dog_ear_id" name="dog_ear_id" value="{{ $dogear->id }}" />
                    <input type="submit" value="Submit">
                </div>
            </form>
        @endif
    </div>
@endif

@stop
