<x-layouts.app>
    <div class="pb-4">
        <div class="block block-rounded">
            <div class="block-header bg-primary-dark text-white">
                <p class="small mb-0 fw-bold">{{ trans('dashboard.sections.consultation') }} {{ strtolower(trans('dashboard.fields.info')) }}</p>
            </div>
            <div class="block-content fs-sm">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-md-6 ps-0">
                        <div class="row w-100 h-100 m-0 p-0">
                            <div class="col-md-6 mb-4 ps-0">
                                <label class="form-label" for="client_name">{{ trans('dashboard.fields.client_name') }}:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="client_name" name="client_name" value="{{ $consultation->client->first_name . ' ' . $consultation->client->last_name }}" placeholder="{{ trans('dashboard.fields.client_name') }}" readonly>
                            </div>
                            <div class="col-md-6 mb-4 pe-0">
                                <label class="form-label" for="relative">{{ trans('dashboard.sections.relative') }} <small class="text-muted">({{ ucfirst($consultation->client->relatives->first()?->relativeStatus->title) }})</small>:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="relative" name="relative" value="{{ $consultation->client->relatives->first()?->fullname }}" placeholder="{{ trans('dashboard.sections.relative') }}" readonly>
                            </div>
                            <div class="col-md-6 mb-4 ps-0">
                                <label class="form-label" for="payment_amount">{{ trans('dashboard.fields.payment_amount') }}:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="payment_amount" name="payment_amount" value="{{ $consultation->payment_amount }}" placeholder="{{ trans('dashboard.fields.payment_amount') }}" readonly>
                            </div>
                            <div class="col-md-6 mb-4 pe-0">
                                <label class="form-label" for="payment_type">{{ trans('dashboard.sections.payment') }}:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="payment_type" name="payment_type" value="{{ $consultation->paymentType->title }}" placeholder="{{ trans('dashboard.sections.payment') }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pe-0">
                        <div class="row w-100 h-100 m-0 p-0">
                            <div class="col-md-6 mb-4 ps-0">
                                <label class="form-label" for="phone_number">{{ trans('dashboard.fields.phone_number') }}:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="phone_number" name="phone_number" value="{{ $consultation->client->relatives->first()?->phone_number }}" placeholder="{{ trans('dashboard.fields.phone_number') }}" readonly>
                            </div>
                            <div class="col-md-6 mb-4 pe-0">
                                <label class="form-label" for="time">{{ trans('dashboard.fields.time') }}:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="time" name="time" value="{{ $consultation->getFullTime() }}" placeholder="{{ trans('dashboard.fields.time') }}" readonly>
                            </div>
                            <div class="col-md-6 mb-4 ps-0">
                                <label class="form-label" for="date">{{ trans('dashboard.fields.date') }}:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="date" name="date" value="{{ $consultation->created_date }}" placeholder="{{ trans('dashboard.fields.date') }}" readonly>
                            </div>
                            <div class="col-md-6 mb-4 pe-0">
                                <label class="form-label" for="payment_type">{{ trans('dashboard.sections.status') }}:</label>
                                <p class="mb-0">{!! $consultation->getAppointmentStatus() !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-forms.buttons.default.back route="{{ route('dashboard.management.consultations.index') }}" />
    </div>
</x-layouts.app>
