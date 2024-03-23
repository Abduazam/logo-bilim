<x-layouts.app>
    <div class="pb-4">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="col-lg-9 col-md-8 ps-md-0">
                <div class="block block-rounded">
                    <div class="block-header bg-primary-dark text-white">
                        <p class="small mb-0 fw-bold">{{ trans('dashboard.fields.info') }}</p>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="row w-100 h-100 p-0 mx-0 mb-4">
                            <div class="col-md-4 mb-4 ps-0 pe-md-2 pe-0">
                                <label class="form-label" for="branch_id">{{ trans('dashboard.fields.branch_id') }}:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="branch_id" name="branch_id" value="{{ $client->branch?->title }}" readonly>
                            </div>
                            <div class="col-md-4 mb-4 px-md-2 px-0">
                                <label class="form-label" for="first_name">{{ trans('dashboard.fields.first_name') }}:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="first_name" name="first_name" value="{{ $client->first_name }}" readonly>
                            </div>
                            <div class="col-md-4 mb-4 pe-0 ps-md-2 ps-0">
                                <label class="form-label" for="last_name">{{ trans('dashboard.fields.last_name') }}:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="last_name" name="last_name" value="{{ $client->last_name }}" readonly>
                            </div>
                            <div class="col-md-4 ps-0 mb-4 mb-md-0 pe-md-2 pe-0">
                                <label class="form-label" for="dob">{{ trans('dashboard.fields.birth_date') }}:</label>
                                <input type="date" class="form-control form-control-sm w-100" id="dob" name="dob" value="{{ $client->dob }}" readonly>
                            </div>
                            <div class="col-md-4 px-md-2 mb-4 mb-md-0 px-0">
                                <label class="form-label" for="diagnosis">{{ trans('dashboard.fields.diagnosis') }}:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="diagnosis" name="diagnosis" value="{{ $client->diagnosis }}" readonly>
                            </div>
                            <div class="col-md-4 pe-0 ps-md-2 ps-0">
                                <label class="form-label" for="agreement_date">{{ trans('dashboard.fields.agreement_date') }}:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="agreement_date" name="agreement_date" value="{{ $client->agreement_date }}" readonly>
                            </div>
                        </div>
                        @if($client->relatives)
                            <div class="row w-100 h-100 p-0 mx-0">
                                <hr>
                                <h6 class="ps-0 mb-3"># {{ trans('dashboard.sections.relatives') }}</h6>
                                @foreach($client->relatives as $relative)
                                    <div class="row w-100 h-100 p-3 mx-0 mb-4 bg-light rounded-2 position-relative">
                                        <div class="col-md-4 mb-md-0 mb-3 ps-0 pe-md-2 pe-0">
                                            <label class="form-label" for="fullname">{{ trans('dashboard.fields.fullname') }}:</label>
                                            <input type="text" class="form-control form-control-sm w-100" id="fullname" name="fullname" value="{{ $relative->fullname }}">
                                        </div>
                                        <div class="col-md-4 mb-md-0 mb-3 px-md-2 px-0">
                                            <label class="form-label" for="phone_number">{{ trans('dashboard.fields.phone_number') }}:</label>
                                            <input type="text" class="form-control form-control-sm w-100" id="phone_number" name="phone_number" value="{{ $relative->phone_number }}" readonly>
                                        </div>
                                        <div class="col-md-4 pe-0 ps-md-2 ps-0">
                                            <label class="form-label" for="relative_status_id">{{ trans('dashboard.fields.relative_status') }}:</label>
                                            <input type="text" class="form-control form-control-sm w-100" id="relative_status_id" name="relative_status_id" value="{{ $relative->relativeStatus?->title }}" readonly>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if($client->lessons)
                            <div class="row w-100 h-100 p-0 mx-0">
                                <hr>
                                <h6 class="ps-0 mb-3"># {{ trans('dashboard.sections.lessons') }}</h6>
                                @foreach($client->lessons as $lesson)
                                    <div class="row w-100 h-100 p-3 mx-0 mb-4 bg-light rounded-2 position-relative">
                                        <div class="col-md-3 ps-0 mb-3 mb-md-0 pe-0 pe-md-2">
                                            <label class="form-label" for="fullname">{{ trans('dashboard.fields.service_id') }}:</label>
                                            <input type="text" class="form-control form-control-sm w-100" id="fullname" name="fullname" value="{{ $lesson->service->title }}">
                                        </div>
                                        <div class="col-md-3 px-md-2 px-0 mb-3 mb-md-0">
                                            <label class="form-label" for="phone_number">{{ trans('dashboard.fields.teacher_id') }}:</label>
                                            <input type="text" class="form-control form-control-sm w-100" id="phone_number" name="phone_number" value="{{ $lesson->teacher->fullname }}" readonly>
                                        </div>
                                        <div class="col-md-3 px-md-2 px-0 mb-3 mb-md-0">
                                            <label class="form-label" for="phone_number">{{ trans('dashboard.fields.price') }}:</label>
                                            <input type="text" class="form-control form-control-sm w-100" id="phone_number" name="phone_number" value="{{ $lesson->price }}" readonly>
                                        </div>
                                        <div class="col-md-3 pe-0 ps-md-2 ps-0">
                                            <label class="form-label" for="relative_status_id">{{ trans('dashboard.fields.start_time') }}:</label>
                                            <input type="text" class="form-control form-control-sm w-100" id="relative_status_id" name="relative_status_id" value="{{ $lesson->start_time }}" readonly>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="d-md-block d-none">
                    <x-forms.buttons.default.back route="{{ route('dashboard.information.clients.index') }}" />
                </div>
            </div>

            <div class="col-lg-3 col-md-4 pe-md-0">
                <div class="block block-rounded">
                    <div class="block-header bg-primary-dark text-white">
                        <p class="small mb-0 fw-bold">{{ trans('dashboard.fields.photo') }}</p>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="mb-4">
                            @if(!is_null($client->photo))
                                <div class="options-container">
                                    {!! $client->getPhoto('first_name', 'w-100') !!}
                                </div>
                            @else
                                <div class="border rounded-3 p-3 text-center">
                                    <span class="text-secondary">{{ trans('dashboard.sentences.photo-not-provided') }}</span>
                                    <a href="{{ route('dashboard.information.clients.edit', $client) }}" class="btn btn-sm btn-primary w-100 mt-2">{{ trans('dashboard.fields.photo') }} {{ mb_strtolower(trans('dashboard.actions.upload')) }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="d-md-none d-block">
                    <x-forms.buttons.default.back route="{{ route('dashboard.information.clients.index') }}" />
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
