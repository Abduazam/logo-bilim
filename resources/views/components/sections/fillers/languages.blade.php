@if(count($languages) > 0)
    <div class="dropdown d-inline-block">
        <button type="button" class="btn btn-sm text-dark" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-earth d-sm-none"></i>
            <span class="d-none d-sm-inline-block fw-semibold">{{ $current_language }}</span>
            <i class="fa fa-angle-down opacity-50 ms-1"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown" style="min-width: auto;">
            <div class="p-2">
                @foreach($languages as $language)
                    <a class="dropdown-item d-flex align-items-center justify-content-between @if($loop->last) mb-0 @endif" href="{{ route('dashboard.change-language', $language->slug) }}">
                        <span>{{ $language->title }}</span>
                        <i class="fa fa-fw fa-earth opacity-25 ms-2"></i>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endif
