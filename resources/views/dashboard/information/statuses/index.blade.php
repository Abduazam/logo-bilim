<x-layouts.app>
    <div class="row">
        @can('dashboard.information.statuses.relatives.index')
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.information.statuses.relatives.index') }}">
                <div class="ribbon-box">{{ $relatives }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-user-group fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Relatives</p>
                </div>
            </a>
        </div>
        @endcan

        @can('dashboard.information.statuses.appointments.index')
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.information.statuses.appointments.index') }}">
                <div class="ribbon-box">{{ $appointments }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="far fa-clock fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Appointments</p>
                </div>
            </a>
        </div>
        @endcan
    </div>
</x-layouts.app>
