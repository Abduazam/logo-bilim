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
                            <div class="col-md-4 ps-md-0 mb-md-0 mb-4">
                                <label class="form-label" for="fullname">Fullname:</label>
                                <input type="text" class="form-control form-control-sm w-100" id="fullname" name="fullname" value="{{ $teacher->fullname }}" placeholder="Fullname" readonly>
                            </div>
                            <div class="col-md-4 px-2 mb-mb-0 mb-4">
                                <label class="form-label" for="dob">Date of birth:</label>
                                <input type="date" class="form-control form-control-sm w-100" id="dob" name="dob" value="{{ $teacher->dob }}" placeholder="Date of birth" readonly>
                            </div>
                            <div class="col-md-4 pe-md-0">
                                <label class="form-label" for="phone_number">Phone number:</label>
                                <input type="number" class="form-control form-control-sm w-100" id="phone_number" name="phone_number" value="{{ $teacher->phone_number }}" placeholder="Phone number" readonly>
                            </div>
                        </div>
                        @if($teacher->myServices)
                            <div class="row w-100 h-100 p-0 mx-0 mb-4">
                                <hr>
                                @foreach($teacher->myServices as $myService)
                                    <div class="row w-100 p-3 mx-0 bg-light rounded-2 position-relative mt-2">
                                        <div class="col-12 d-flex align-items-center px-0">
                                            <div class="col-md-3 col-8">
                                                <label for="{{ strtolower($myService->branch->title) . '-' . strtolower($myService->service->title) }}" class="form-label mb-0 me-2">{{ $myService->branch->title . ', ' . $myService->service->title }}: </label>
                                            </div>
                                            <div class="col-md-9 col-4">
                                                <input type="text" class="form-control form-control-sm w-75 w-mobile-100" name="{{ strtolower($myService->branch->title) . '-' . strtolower($myService->service->title) }}" id="{{ strtolower($myService->branch->title) . '-' . strtolower($myService->service->title) }}" value="{{ $myService->salary }}" placeholder="Salary" readonly>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="d-md-block d-none">
                    <x-forms.buttons.default.back route="{{ route('dashboard.information.teachers.index') }}" />
                </div>
            </div>

            <div class="col-lg-3 col-md-4 pe-md-0">
                <div class="block block-rounded">
                    <div class="block-header bg-primary-dark text-white">
                        <p class="small mb-0 fw-bold">{{ trans('dashboard.fields.photo') }}</p>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="mb-4">
                            @if(!is_null($teacher->photo))
                                <div class="options-container">
                                    {!! $teacher->getPhoto('fullname', 'w-100') !!}
                                </div>
                            @else
                                <div class="border rounded-3 p-3 text-center">
                                    <span class="text-secondary">{{ trans('dashboard.sentences.photo-not-provided') }}</span>
                                    <a href="{{ route('dashboard.information.teachers.edit', $teacher) }}" class="btn btn-sm btn-primary w-100 mt-2">{{ trans('dashboard.fields.photo') }} {{ mb_strtolower(trans('dashboard.actions.upload')) }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="d-md-none d-block">
                    <x-forms.buttons.default.back route="{{ route('dashboard.information.teachers.index') }}" />
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
