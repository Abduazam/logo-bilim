<x-layouts.app>
    <div class="row">
        @can('dashboard.reports.daily-reports.index')
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.reports.daily-reports.index') }}">
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="far fa-file-lines fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">{{ trans('dashboard.sections.daily-reports') }}</p>
                </div>
            </a>
        </div>
        @endcan

        @can('dashboard.reports.debts.index')
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.reports.debts.index') }}">
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-sack-dollar fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">{{ trans('dashboard.sections.debts') }}</p>
                </div>
            </a>
        </div>
        @endcan
    </div>
</x-layouts.app>
