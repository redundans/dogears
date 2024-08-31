<ul class="flex flex-col divide-y">
@foreach($dogears as $dogear)
    <li class="flex flex-row gap-2 py-6">
        <div class="py-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd" d="M8.914 6.025a.75.75 0 0 1 1.06 0 3.5 3.5 0 0 1 0 4.95l-2 2a3.5 3.5 0 0 1-5.396-4.402.75.75 0 0 1 1.251.827 2 2 0 0 0 3.085 2.514l2-2a2 2 0 0 0 0-2.828.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M7.086 9.975a.75.75 0 0 1-1.06 0 3.5 3.5 0 0 1 0-4.95l2-2a3.5 3.5 0 0 1 5.396 4.402.75.75 0 0 1-1.251-.827 2 2 0 0 0-3.085-2.514l-2 2a2 2 0 0 0 0 2.828.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="flex flex-col gap-2">
            <div>
                <a href="{{ $dogear->url }}" target="_blank" rel="noopener noreferrer">{{ $dogear->url }}</a>
                <a href="{{ route('dogears.show', ['id' => $dogear->id]) }}">Show more</a>
            </div>
            <div class="flex flex-row items-items-center gap-3 text-sm">
                <span class="opacity-50">{{ $dogear->name }}</span>
                <span class="flex flex-row gap-1 items-center">
                    @foreach( $dogear->users as $user )
                    <a class="bg-black font-bold hover:bg-gray-100 hover:text-black w-4 h-4 text-xxs flex items-center justify-center text-white uppercase rounded-full no-underline" href="{{ route('users.show', ['id' => $user->id]) }}">
                        {{  $user->name[0] }}
                    @endforeach</a>
                </span>
                @if(auth()->user())
                    @if(in_array(auth()->user()->id, array_column($dogear->users->toArray(),'id')))
                        <a class="text-gray-500 text-xs hover:text-black" href="{{ route('dogears.destroy', ['id' => $dogear->id]) }}">
                            Delete
                        </a>
                    @endif
                @endif
            </div>

            <div class="text-sm">
                <a href="{{ route('dogears.show', ['id' => $dogear->id]) }}#comments">{{ count($dogear->comments) }} comments</a>
            </div>

            @if(0!==count($dogear->tags))
                <ul class="flex flex-row flex-wrap gap-2">
                @foreach( $dogear->tags as $tag )
                <li>
                    <a class="bg-gray-100 hover:bg-black hover:text-white rounded-full px-2 py-1 text-xs leading-none no-underline" href="{{ route('tags.show', ['slug' => $tag->slug]) }}">
                        {{ $tag->name }}
                    </a>
                </li>
                @endforeach
                </ul>
            @endif
        </div>
    </li>
@endforeach
</ul>

<div id="pagination" class="flex flex-row justify-between">
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
