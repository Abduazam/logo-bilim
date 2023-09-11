<button type="button"
        class="btn btn-sm {{ $color }} {{ $margin }}"
        data-bs-toggle="modal" data-bs-target="#{{ $target }}">
    @if(!is_null($text) and $text !== '') <span>{{ $text }}</span> @else <i class="{{ $icon }}"></i> @endif
</button>
