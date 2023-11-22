<x-layouts.app>
    <div class="row">
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.information.services.index') }}">
                <div class="ribbon-box">{{ $services }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-gears fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Services</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.information.branches.index') }}">
                <div class="ribbon-box">{{ $branches }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-bank fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Branches</p>
                </div>
            </a>
        </div>
    </div>
</x-layouts.app>
