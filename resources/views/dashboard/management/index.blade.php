<x-layouts.app>
    <div class="row">
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-primary text-center" href="{{ route('dashboard.management.appointments.index') }}">
                <div class="ribbon-box">{{ $appointments }}</div>
                <div class="block-content">
                    <p class="mt-1 mb-2">
                        <i class="fa fa-calendar-alt fa-2x text-elegance"></i>
                    </p>
                    <p class="fw-semibold">Appointments</p>
                </div>
            </a>
        </div>
</x-layouts.app>
