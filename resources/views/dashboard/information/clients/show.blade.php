<x-layouts.app>
    <div class="pb-4">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="col-lg-9 col-md-8 ps-0">
                <div class="block block-rounded">
                    <div class="block-header bg-primary-dark text-white">
                        <p class="small mb-0 fw-bold">Client info</p>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="row w-100 h-100 p-0 mx-0 mb-4">
                            <div class="col-md-4 ps-0">
                                <label class="form-label" for="first_name">First name:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="first_name" name="first_name" value="{{ $client->first_name }}" placeholder="First name" readonly>
                            </div>
                            <div class="col-md-4 px-md-2 px-0">
                                <label class="form-label" for="last_name">Last name:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="last_name" name="last_name" value="{{ $client->last_name }}" placeholder="Last name" readonly>
                            </div>
                            <div class="col-md-4 pe-0">
                                <label class="form-label" for="dob">Date of birth:</label>
                                <input type="date" class="form-control form-control-sm w-100" id="dob" name="dob" value="{{ $client->dob }}" placeholder="Date of birth" readonly>
                            </div>
                        </div>
                        @if($client->relatives)
                            <div class="row w-100 h-100 p-0 mx-0 mb-4">
                                <hr>
                                @foreach($client->relatives as $relative)
                                    <div class="row w-100 h-100 p-3 mx-0 mb-4 bg-light rounded-2 position-relative">
                                        <div class="col-md-4 ps-0">
                                            <label class="form-label" for="fullname">Fullname:</label>
                                            <input type="text" class="form-control form-control-sm w-100" id="fullname" name="fullname" value="{{ $relative->fullname }}" placeholder="Fullname" readonly>
                                        </div>
                                        <div class="col-md-4 px-md-2 px-0">
                                            <label class="form-label" for="phone_number">Phone number:</label>
                                            <input type="number" class="form-control form-control-sm w-100" id="phone_number" name="phone_number" value="{{ $relative->phone_number }}" placeholder="Phone number" readonly>
                                        </div>
                                        <div class="col-md-4 pe-0">
                                            <label class="form-label" for="relative_status_id">Relative status:</label>
                                            <input type="text" class="form-control form-control-sm w-100" id="relative_status_id" name="relative_status_id" value="{{ $relative->relativeStatus->translation->translation }}" placeholder="Relative status" readonly>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <x-forms.buttons.default.back route="{{ route('dashboard.information.clients.index') }}" />
            </div>

            <div class="col-lg-3 col-md-4 pe-0">
                <div class="block block-rounded">
                    <div class="block-header bg-primary-dark text-white">
                        <p class="small mb-0 fw-bold">Client photo</p>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="mb-4">
                            @if(!is_null($client->photo))
                                <div class="options-container">
                                    {!! $client->getPhoto('first_name', 'w-100') !!}
                                </div>
                            @else
                                <div class="border rounded-3 p-3 text-center">
                                    <span class="text-secondary">Client doesn't have photo</span>
                                    <a href="{{ route('dashboard.information.clients.edit', $client) }}" class="btn btn-sm btn-primary w-100 mt-2">Upload photo</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
