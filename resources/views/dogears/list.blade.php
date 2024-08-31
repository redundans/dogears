<ul class="gap">
@foreach($dogears as $dogear)
    <li>
        <div class="gap-small">
            <div>
                <strong>{{ $dogear->name }}</strong>
            </div>
            @if($dogear->description)
            <div>
                {{ $dogear->description }}
            </div>
            @endif
            <div>
                <em><a href="{{ $dogear->url }}" target="_blank" rel="noopener noreferrer">{{ $dogear->url }}</a></em>
            </div>
            <div>
                @if(count($dogear->comments)>0)
                    <a href="{{ route('dogears.show', ['id' => $dogear->id]) }}#comments">{{ count($dogear->comments) }} comments</a>
                @endif
                @foreach($dogear->collections as $collection)
                    <a href="{{ route('collections.show', ['id' => $collection->id]) }}">{{ $collection->name }}</a>
                @endforeach
                <a href="{{ route('dogears.show', ['id' => $dogear->id]) }}">Show</a>
            </div>
        </div>
    </li>
@endforeach
</ul>

<div id="pagination">
    <div>
        @if (!$dogears->onFirstPage())
            <a href="{{$dogears->previousPageUrl()}}">Previous</a>
        @endif
    </div>
    <div>
        @if ($dogears->hasMorePages())
            <a href="{{$dogears->nextPageUrl()}}">Next</a>
        @endif
    </div>
</div>
