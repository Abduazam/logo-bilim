<x-layouts.app>
    <div class="row">
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.features.languages.index') }}">
                <div class="ribbon-box">{{ $languages }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-language fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Languages</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.features.tables.index') }}">
                <div class="ribbon-box">{{ $tables }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-database fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Tables</p>
                </div>
            </a>
        </div>
    </div>
</x-layouts.app>
