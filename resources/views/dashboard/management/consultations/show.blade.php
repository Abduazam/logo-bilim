<x-layouts.app>
    <div class="pb-4">
        <div class="block block-rounded">
            <div class="block-header bg-primary-dark text-white">
                <p class="small mb-0 fw-bold">Consultation info</p>
            </div>
            <div class="block-content fs-sm">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-md-6 ps-0">
                        <div class="row w-100 h-100 m-0 p-0">
                            <div class="col-md-6 mb-4 ps-0">
                                <label class="form-label" for="client_name">Client name:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="client_name" name="client_name" value="{{ $consultation->client->first_name . ' ' . $consultation->client->last_name }}" placeholder="Client name" readonly>
                            </div>
                            <div class="col-md-6 mb-4 pe-0">
                                <label class="form-label" for="relative">Relative <small class="text-muted">({{ ucfirst($consultation->client->relatives->first()?->relativeStatus->title) }})</small>:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="relative" name="relative" value="{{ $consultation->client->relatives->first()?->fullname }}" placeholder="Relative" readonly>
                            </div>
                            <div class="col-md-6 mb-4 ps-0">
                                <label class="form-label" for="payment_amount">Payment amount:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="payment_amount" name="payment_amount" value="{{ $consultation->payment_amount }}" placeholder="Payment amount" readonly>
                            </div>
                            <div class="col-md-6 mb-4 pe-0">
                                <label class="form-label" for="payment_type">Payment type:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="payment_type" name="payment_type" value="{{ $consultation->paymentType->title }}" placeholder="Payment type" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pe-0">
                        <div class="row w-100 h-100 m-0 p-0">
                            <div class="col-md-6 mb-4 ps-0">
                                <label class="form-label" for="phone_number">Phone number:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="phone_number" name="phone_number" value="{{ $consultation->client->relatives->first()?->phone_number }}" placeholder="Phone number" readonly>
                            </div>
                            <div class="col-md-6 mb-4 pe-0">
                                <label class="form-label" for="time">Time:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="time" name="time" value="{{ $consultation->getFullTime() }}" placeholder="Time" readonly>
                            </div>
                            <div class="col-md-6 mb-4 ps-0">
                                <label class="form-label" for="date">Date:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="date" name="date" value="{{ $consultation->created_date }}" placeholder="Date" readonly>
                            </div>
                            <div class="col-md-6 mb-4 pe-0">
                                <label class="form-label" for="payment_type">Status:</label>
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
