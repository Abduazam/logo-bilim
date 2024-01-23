<x-layouts.app>
    <div class="row">
        @can('dashboard.information.types.payments.index')
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.information.types.payments.index') }}">
                <div class="ribbon-box">{{ $payments }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fab fa-paypal fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">{{ trans('dashboard.sections.payments') }}</p>
                </div>
            </a>
        </div>
        @endcan
    </div>
</x-layouts.app>
