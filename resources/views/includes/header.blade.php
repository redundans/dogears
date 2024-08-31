	<header class="flex flex-row justify-between items-center my-6">
			<a id="logo" href="{{ route('dogears') }}" class="font-bold">dogears</a>
			<ul class="flex flex row gap-6">
                @if(auth()->user())
                 <li><a href="{{ route('dogears.create') }}">+ New link</a></li>
                    <li><a href="{{ route('users.show', ['id' => auth()->user()->id]) }}">My stuff</a></li>
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                @endif
			</ul>
	</header>
