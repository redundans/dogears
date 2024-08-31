<ul class="grid grid-cols-3 md:grid-cols-6 pb-6 border-b">
    @foreach($collections as $collection)
        <li class="flex flex-row gap-2 py-6">
            <a href="{{ route('collections.show', ['id' => $collection->id]) }}">{{ $collection->name }}</a> <span class="flex items-center">{{ count($collection->dogears) }}</span>
        </li>
    @endforeach
    <li class="flex flex-row gap-2 py-6">
        <a href="{{ route('collections.create') }}">+ New collection</a>
    </li>
</ul>
