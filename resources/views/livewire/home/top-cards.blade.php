<div class="content w-100 h-100 p-0 m-0">
    <div class="row">
        <div class="col-md-4">
            <a class="block block-rounded block-link-shadow" href="{{ route('dashboard.management.appointments.index') }}">
                <div class="block-content block-content-full p-1">
                    <div class="py-3 text-center">
                        <div class="mb-3">
                            <i class="far fa-user-circle fa-3x text-corporate"></i>
                        </div>
                        <div class="fs-4 fw-semibold mb-1">{{ $totalAppointments }} Patients</div>
                        <div class="fw-medium text-muted">{{ $todaysAppointments }} were added today!</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-shadow" href="{{ route('dashboard.management.consultations.index') }}">
                <div class="block-content block-content-full p-1">
                    <div class="py-3 text-center">
                        <div class="mb-3">
                            <i class="fa fa-calendar-alt fa-3x text-elegance"></i>
                        </div>
                        <div class="fs-4 fw-semibold mb-1">{{ $totalConsultations }} Consultations</div>
                        <div class="fw-medium text-muted">{{ $totalNextConsultations }} are scheduled for today!</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-shadow" href="{{ route('dashboard.management.consumptions.index') }}">
                <div class="block-content block-content-full p-1">
                    <div class="py-3 text-center">
                        <div class="mb-3">
                            <i class="fab fa-paypal fa-3x text-primary"></i>
                        </div>
                        <div class="fs-4 fw-semibold mb-1">{{ $totalConsumptions }} Consumptions</div>
                        <div class="fw-medium text-muted">{{ $sumConsumptions }} for today.</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
