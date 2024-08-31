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

<div class="p-6 border rounded bg-gray-100 mb-9">
    <form method="GET" action="{{ route('search.show') }}" class="flex flex-row gap-6">
        @csrf
        <input type="text" id="search" name="search" class="grow" value="{{ old('search') }}" placeholder="Cool web content" />
        <input type="submit" value="Search">
    </form>
</div>
