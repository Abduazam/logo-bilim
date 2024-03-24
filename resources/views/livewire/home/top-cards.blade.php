<div class="content w-100 h-100 p-0 m-0">
    <div class="row">
        <div class="col-md-3 col-6">
            <a class="block block-rounded block-link-shadow" href="{{ route('dashboard.management.appointments.index') }}">
                <div class="block-content block-content-full p-1">
                    <div class="py-3 text-center">
                        <div class="mb-3">
                            <i class="far fa-user-circle fa-3x text-corporate"></i>
                        </div>
                        <div class="fs-4 fs-mobile-16 fw-semibold mb-1">{{ $totalAppointments }} {{ trans('dashboard.sections.clients') }}</div>
                        <div class="fw-medium fs-mobile-13 text-muted">{{ trans('dashboard.warnings.added-clients-today') }} {{ $todaysAppointments }}!</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a class="block block-rounded block-link-shadow" href="{{ route('dashboard.management.consultations.index') }}">
                <div class="block-content block-content-full p-1">
                    <div class="py-3 text-center">
                        <div class="mb-3">
                            <i class="fa fa-calendar-alt fa-3x text-elegance"></i>
                        </div>
                        <div class="fs-4 fs-mobile-16 fw-semibold mb-1">{{ $totalConsultations }} {{ trans('dashboard.sections.consultations') }}</div>
                        <div class="fw-medium fs-mobile-13 text-muted">{{ trans('dashboard.warnings.scheduled-consultations-today') }} {{ $totalNextConsultations }}!</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a class="block block-rounded block-link-shadow" href="{{ route('dashboard.management.consumptions.index') }}">
                <div class="block-content block-content-full p-1">
                    <div class="py-3 text-center">
                        <div class="mb-3">
                            <i class="fab fa-paypal fa-3x text-primary"></i>
                        </div>
                        <div class="fs-4 fs-mobile-16 fw-semibold mb-1">{{ $totalConsumptions }} {{ trans('dashboard.sections.consumptions') }}</div>
                        <div class="fw-medium fs-mobile-13 text-muted">{{ trans('dashboard.warnings.today-consumptions') }} {{ $sumConsumptions }}.</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a class="block block-rounded block-link-shadow" href="{{ route('dashboard.information.clients.create') }}">
                <div class="block-content block-content-full p-1">
                    <div class="py-3 text-center">
                        <div class="mb-3">
                            <i class="si si-user-follow fa-3x text-earth"></i>
                        </div>
                        <div class="fs-4 fs-mobile-16 fw-semibold mb-1">{{ trans('dashboard.sentences.new-agreement') }}</div>
                        <div class="fw-medium fs-mobile-13 text-muted">{{ trans('dashboard.sentences.new-agreement-desc') }}.</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
