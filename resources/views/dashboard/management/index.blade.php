<x-layouts.app>
    <div class="row">
        @can('dashboard.management.appointments.index')
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.management.appointments.index') }}">
                <div class="ribbon-box">{{ $appointments }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-calendar-alt fa-2x text-muted"></i>
                    </p>
                    <p class="fw-semibold">Appointments</p>
                </div>
            </a>
        </div>
        @endcan
        @can('dashboard.management.consultations.index')
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.management.consultations.index') }}">
                    <div class="ribbon-box">{{ $consultations }}</div>
                    <div class="block-content">
                        <p class="mt-1 mb-2">
                            <i class="far fa-address-card fa-2x text-muted"></i>
                        </p>
                        <p class="fw-semibold">Consultations</p>
                    </div>
                </a>
            </div>
        @endcan
        @can('dashboard.management.consumptions.index')
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.management.consumptions.index') }}">
                    <div class="ribbon-box">{{ $consumptions }}</div>
                    <div class="block-content">
                        <p class="mt-1 mb-2">
                            <i class="fa fa-sack-dollar fa-2x text-muted"></i>
                        </p>
                        <p class="fw-semibold">Consumptions</p>
                    </div>
                </a>
            </div>
        @endcan
    </div>
</x-layouts.app>
