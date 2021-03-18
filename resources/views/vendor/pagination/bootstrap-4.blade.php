@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" id="link{{$page}}" data-page="{{$page}}" href="#">{{$page}}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" id="link{{$page}}" data-page="{{$page}}" href="#">{{$page}}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

        </ul>
    </nav>
@endif
