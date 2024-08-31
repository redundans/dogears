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

@if(auth()->user())
	<form method="POST" action="{{ route('dogears.store') }}" class="flex flex-row gap-6">
        <div>
		  @csrf
		  <input type="text" id="url" name="url" class="grow" placeholder="https://" />
        </div>
        <div>
		    <select id="collections" name="collection" class="rounded-md border bg-white px-3">
			    <option value="" selected="">Choose collection</option>
			    @foreach($collections as $collection)
				    <option value="{{ $collection->id }}">{{ $collection->name }}</option>
			    @endforeach
		    </select>
        </div>
        <div>
		  <input type="submit" value="Submit">
        </div>
	</form>
@endif

@stop
