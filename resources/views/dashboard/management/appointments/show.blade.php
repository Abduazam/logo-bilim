<x-layouts.app>
    <div class="pb-4">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="col-lg-5 col-12 ps-0">
                <div class="block block-rounded">
                    <div class="block-header bg-primary-dark text-white">
                        <p class="small mb-0 fw-bold">{{ trans('dashboard.sections.appointment') }} {{ strtolower(trans('dashboard.fields.info')) }}i</p>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">{{ trans('dashboard.sections.branch') }}:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $appointment->branch->title }}" placeholder="{{ trans('dashboard.sections.branch') }}" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">{{ trans('dashboard.sections.service') }}:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $appointment->service->title }}" placeholder="{{ trans('dashboard.sections.service') }}" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">{{ trans('dashboard.fields.service_price') }}:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $appointment->service_price }}" placeholder="{{ trans('dashboard.fields.service_price') }}" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">{{ trans('dashboard.sections.teacher') }}:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $appointment->teacher->fullname }}" placeholder="{{ trans('dashboard.sections.teacher') }}" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">{{ trans('dashboard.fields.start_time') }}:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $appointment->getStartTime() }}" placeholder="{{ trans('dashboard.fields.start_time') }}" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">{{ trans('dashboard.fields.date') }}:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $appointment->created_date }}" placeholder="{{ trans('dashboard.fields.date') }}" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">{{ trans('dashboard.sections.status') }}:</label>
                            </div>
                            <div class="col-8">
                                {!! $appointment->getAppointmentStatus() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <x-forms.buttons.default.back route="{{ route('dashboard.management.appointments.index') }}" />
            </div>
            <div class="col-lg-7 col-12 pe-0">
                <div class="block block-rounded">
                    <div class="block-header bg-primary-dark text-white">
                        <p class="small mb-0 fw-bold">{{ trans('dashboard.sections.appointment') }} {{ strtolower(trans('dashboard.sections.clients')) }}i</p>
                    </div>
                    <div class="block-content fs-sm">
                        @foreach($appointment->clients as $client)
                            <div class="row w-100 h-100 p-3 mx-0 mb-4 bg-light rounded-3">
                                <div class="col-md-4 mb-3 ps-0">
                                    <label class="form-label" for="first_name{{ $client->id }}">{{ trans('dashboard.fields.first_name') }}:</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="first_name{{ $client->id }}" name="first_name{{ $client->id }}" value="{{ $client->client->first_name }}" placeholder="{{ trans('dashboard.fields.first_name') }}" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="last_name{{ $client->id }}">{{ trans('dashboard.fields.last_name') }}:</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="last_name{{ $client->id }}" name="last_name{{ $client->id }}" value="{{ $client->client->last_name }}" placeholder="{{ trans('dashboard.fields.last_name') }}" readonly>
                                </div>
                                <div class="col-md-4 mb-3 pe-0">
                                    <label class="form-label" for="dob{{ $client->id }}">{{ trans('dashboard.fields.birth_date') }}:</label>
                                    <input type="date" class="form-control form-control-sm w-100" id="dob{{ $client->id }}" name="dob{{ $client->id }}" value="{{ $client->client->dob }}" readonly>
                                </div>
                                <div class="col-md-4 ps-0">
                                    <label class="form-label" for="payment_amount{{ $client->id }}">{{ trans('dashboard.fields.payment_amount') }}:</label>
                                    <input type="number" class="form-control form-control-sm w-100" id="payment_amount{{ $client->id }}" name="payment_amount{{ $client->id }}" value="{{ $client->payment_amount }}" placeholder="{{ trans('dashboard.fields.payment_amount') }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="payment_type{{ $client->id }}">{{ trans('dashboard.sections.payment') }}:</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="payment_type{{ $client->id }}" name="payment_type{{ $client->id }}" value="{{ $client->paymentType->title }}" placeholder="Last name" readonly>
                                </div>
                                <div class="col-md-4 pe-0">
                                    <label class="form-label" for="benefit{{ $client->id }}">{{ trans('dashboard.fields.benefit') }}:</label>
                                    <input type="number" class="form-control form-control-sm w-100" id="benefit{{ $client->id }}" name="benefit{{ $client->id }}" value="{{ $client->benefit }}" placeholder="{{ trans('dashboard.fields.benefit') }}" readonly>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
