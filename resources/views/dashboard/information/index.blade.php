<x-layouts.app>
    <div class="row">
        @can('dashboard.information.services.index')
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
        @endcan

        @can('dashboard.information.branches.index')
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
        @endcan

        @can('dashboard.information.teachers.index')
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.information.teachers.index') }}">
                <div class="ribbon-box">{{ $teachers }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-chalkboard-user fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Teachers</p>
                </div>
            </a>
        </div>
        @endcan

        @can('dashboard.information.clients.index')
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.information.clients.index') }}">
                <div class="ribbon-box">{{ $clients }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="far fa-circle-user fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Clients</p>
                </div>
            </a>
        </div>
        @endcan

        @can('dashboard.information.statuses.index')
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.information.statuses.index') }}">
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-s fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Statuses</p>
                </div>
            </a>
        </div>
        @endcan

        @can('dashboard.information.types.index')
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.information.types.index') }}">
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-t fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Types</p>
                </div>
            </a>
        </div>
        @endcan
    </div>
</x-layouts.app>
