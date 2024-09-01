@extends('layouts.default')
@section('content')

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

@if($dogear)
    <form method="POST" action="{{ route('dogears.update', array( 'id' => $dogear->id )) }}">
        @csrf
        <div>
            <h1>{{ $dogear->name }}</h1>
        </div>
        <div>
            <label>URL</label>
            <input type="url" id="url" name="url" value="{{ $dogear->url }}" readonly />
        </div>
        <div>
            <label>Name</label>
            <input type="text" id="name" name="name" value="{{ $dogear->name }}" />
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" id="description" rows="5">{{ $dogear->description }}</textarea>
        </div>
        <!--
        <div>
            <label>Tags</label>
            @foreach($tags as $tag)
                <label><input type="checkbox" name="tags" value="{{$tag->id}}" /> {{$tag->name}}</label>
            @endforeach
        </div>
        -->
        <div>
            <label>Collections</label>
            <select name="collections" id="collections">
                <option value="0">None</option>
                @foreach($collections as $collection)
                    @if($dogear->collections->contains('id', $collection->id))
                        <option value="{{$collection->id}}" selected> {{$collection->name}}</option>
                    @else
                        <option value="{{$collection->id}}"> {{$collection->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div>
            <input type="submit" name="submit" value="Update" />
        </div>
    </form>
@endif

@stop
