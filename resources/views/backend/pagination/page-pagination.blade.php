@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" style="margin: 0 5px;"><span>« Previous</span></li>
        @else
            <li style="margin: 0 5px;"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">« Previous</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled" style="margin: 0 5px;"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" style="margin: 0 5px;"><span>{{ $page }}</span></li>
                    @else
                        <li style="margin: 0 5px;">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li style="margin: 0 5px;"><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next »</a></li>
        @else
            <li class="disabled" style="margin: 0 5px;"><span>Next »</span></li>
        @endif
    </ul>
@endif
