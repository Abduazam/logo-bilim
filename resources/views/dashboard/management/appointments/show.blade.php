<x-layouts.app>
    <div class="pb-4">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="col-lg-5 col-12 ps-0">
                <div class="block block-rounded">
                    <div class="block-header bg-primary-dark text-white">
                        <p class="small mb-0 fw-bold">Appointment info</p>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">Branch:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $appointment->branch->title }}" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">Service:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $appointment->service->title }}" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">Service price:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $appointment->service_price }}" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">Teacher:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $appointment->teacher->fullname }}" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">Start time:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $appointment->getStartTime() }}" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">Date:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm w-75" id="name" name="name" value="{{ $appointment->created_date }}" placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">Status:</label>
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
                        <p class="small mb-0 fw-bold">Appointment clients</p>
                    </div>
                    <div class="block-content fs-sm">
                        @foreach($appointment->clients as $client)
                            <div class="row w-100 h-100 p-3 mx-0 mb-4 bg-light rounded-3">
                                <div class="col-md-4 mb-3 ps-0">
                                    <label class="form-label" for="first_name{{ $client->id }}">First name:</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="first_name{{ $client->id }}" name="first_name{{ $client->id }}" value="{{ $client->client->first_name }}" placeholder="First name" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="last_name{{ $client->id }}">Last name:</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="last_name{{ $client->id }}" name="last_name{{ $client->id }}" value="{{ $client->client->last_name }}" placeholder="Last name" readonly>
                                </div>
                                <div class="col-md-4 mb-3 pe-0">
                                    <label class="form-label" for="dob{{ $client->id }}">Date of birth:</label>
                                    <input type="date" class="form-control form-control-sm w-100" id="dob{{ $client->id }}" name="dob{{ $client->id }}" value="{{ $client->client->dob }}" placeholder="Data of birth" readonly>
                                </div>
                                <div class="col-md-4 ps-0">
                                    <label class="form-label" for="payment_amount{{ $client->id }}">Payment amount:</label>
                                    <input type="number" class="form-control form-control-sm w-100" id="payment_amount{{ $client->id }}" name="payment_amount{{ $client->id }}" value="{{ $client->payment_amount }}" placeholder="Payment amount" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="payment_type{{ $client->id }}">Payment type:</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="payment_type{{ $client->id }}" name="payment_type{{ $client->id }}" value="{{ $client->paymentType->title }}" placeholder="Last name" readonly>
                                </div>
                                <div class="col-md-4 pe-0">
                                    <label class="form-label" for="benefit{{ $client->id }}">Benefit:</label>
                                    <input type="number" class="form-control form-control-sm w-100" id="benefit{{ $client->id }}" name="benefit{{ $client->id }}" value="{{ $client->benefit }}" placeholder="Benefit" readonly>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
