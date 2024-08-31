<ul class="tree">
    <li><strong>/collections</strong>
        <ul class="incremental">
        @foreach($collections as $collection)
            <li>
                <a href="{{ route('collections.show', ['id' => $collection->id]) }}">{{ $collection->name }}</a> <span>{{ count($collection->dogears) }}</span>
            </li>
        @endforeach
        @if(auth()->user())
            <li class="spacer"></li>
            <li><a href="{{ route('collections.create') }}">add collection</a></li>
        @endif
        </ul>
    </li>
</ul>
