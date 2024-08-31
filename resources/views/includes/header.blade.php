    <header>
        <table>
            <tbody>
                <tr>
                    <td colspan="1" rowspan="2" class="width-auto">
                        <h1 style="margin: 0;">Turist/Links</h1>
                        <span>Bokmärken från det permanenta äventyret. </span>
                    </td>
                    <td class="width-min">v0.1.4</td>
                </tr>
                <tr>
                    <td>
                        2024-10-10
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="https://indieweb.social/@httpster" target="_blank" rel="noreferrer">indieweb.social/@httpster</a>
                    </td>
                    <td>
                        Copyleft
                    </td>
                </tr>
            </tbody>
        </table>
    </header>

	<nav>
        <ul class="tree">
            <li>
                <strong><a href="{{ route('dogears') }}" class="font-bold">/home</a></strong>
		        <ul class="incremental">
                    @if(auth()->user())
                        <li><a href="{{ route('dogears.create') }}">add link</a></li>
                        <li class="spacer"></li>
                        <li><a href="/logout">logout</a></li>
                    @else
                        <li><a href="/login">login</a></li>
                        <!--<li><a href="/register">register</a></li>-->
                    @endif
		        </ul>
            </li>
        </ul>
	</nav>
