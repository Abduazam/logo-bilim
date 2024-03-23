<div class="pb-4">
    <form wire:submit.prevent="create">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="col-lg-9 col-md-8 ps-md-0">
                <div class="block block-rounded">
                    <div class="block-content fs-sm">
                        <div class="row w-100 h-100 p-0 mx-0 mb-4">
                            <div class="col-md-4 mb-4 ps-0 pe-md-2 pe-0">
                                <label class="form-label" for="branch_id">{{ trans('dashboard.fields.branch_id') }}:</label>
                                <select wire:model.live="form.branch_id" type="text" class="form-select form-select-sm w-100 @error('form.branch_id') is-invalid @elseif(!empty($this->form->branch_id)) is-valid @enderror" id="branch_id" name="branch_id">
                                    <x-forms.selects.options.choose />
                                    @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->title }}</option>
                                    @endforeach
                                </select>
                                @error('form.branch_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-4 px-md-2 px-0">
                                <label class="form-label" for="first_name">{{ trans('dashboard.fields.first_name') }}: <span class="text-danger">*</span></label>
                                <input wire:model.blur="form.first_name" type="text" class="form-control form-control-sm w-100 @error('form.first_name') is-invalid @elseif(!empty($this->form->first_name)) is-valid @enderror" id="first_name" name="first_name" placeholder="{{ trans('dashboard.fields.first_name') }}">
                                @error('form.first_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-4 pe-0 ps-md-2 ps-0">
                                <label class="form-label" for="last_name">{{ trans('dashboard.fields.last_name') }}: <span class="text-danger">*</span></label>
                                <input wire:model.blur="form.last_name" type="text" class="form-control form-control-sm w-100 @error('form.last_name') is-invalid @elseif(!empty($this->form->last_name)) is-valid @enderror" id="last_name" name="last_name" placeholder="{{ trans('dashboard.fields.last_name') }}">
                                @error('form.last_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 ps-0 pe-md-2 pe-0 mb-4 mb-md-0">
                                <label class="form-label" for="dob">{{ trans('dashboard.fields.birth_date') }}:</label>
                                <input wire:model.blur="form.dob" type="date" class="form-control form-control-sm w-100 @error('form.dob') is-invalid @elseif(!empty($this->form->dob)) is-valid @enderror" id="dob" name="dob" placeholder="{{ trans('dashboard.fields.birth_date') }}" max="{{ date('Y-m-d') }}">
                                @error('form.dob')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 px-md-2 px-0 mb-4 mb-md-0">
                                <label class="form-label" for="diagnosis">{{ trans('dashboard.fields.diagnosis') }}:</label>
                                <input wire:model.blur="form.diagnosis" type="text" class="form-control form-control-sm w-100 @error('form.diagnosis') is-invalid @elseif(!empty($this->form->diagnosis)) is-valid @enderror" id="diagnosis" name="diagnosis" placeholder="{{ trans('dashboard.fields.diagnosis') }}">
                                @error('form.diagnosis')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 pe-0 ps-md-2 ps-0">
                                <label class="form-label" for="agreement_date">{{ trans('dashboard.fields.agreement_date') }}: <span class="text-danger">*</span></label>
                                <input wire:model.blur="form.agreement_date" type="date" class="form-control form-control-sm w-100 @error('form.agreement_date') is-invalid @elseif(!empty($this->form->agreement_date)) is-valid @enderror" id="agreement_date" name="agreement_date" placeholder="{{ trans('dashboard.fields.birth_date') }}" max="{{ date('Y-m-d') }}">
                                @error('form.agreement_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-1">
                            <hr>
                            @if(!empty($this->form->relatives))
                                @foreach($this->form->relatives as $id => $relative)
                                    <div class="row w-100 h-100 p-3 mx-0 mb-4 bg-light rounded-2 position-relative">
                                        <div class="col-md-4 ps-0 pe-md-2 pe-0 mb-md-0 mb-3">
                                            <label class="form-label" for="fullname">{{ trans('dashboard.fields.fullname') }}: <span class="text-danger">*</span></label>
                                            <input wire:model.blur="form.relatives.{{ $id }}.fullname" type="text" class="form-control form-control-sm w-100 @error('form.relatives.' . $id . '.fullname') is-invalid @elseif(strlen($this->form->relatives[$id]['fullname']) > 3) is-valid @enderror" id="fullname" name="fullname" placeholder="{{ trans('dashboard.fields.fullname') }}">
                                            @error('form.relatives.' . $id . '.fullname')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 px-md-2 px-0 mb-md-0 mb-3">
                                            <label class="form-label" for="phone_number">{{ trans('dashboard.fields.phone_number') }}: <span class="text-danger">*</span></label>
                                            <input wire:model.blur="form.relatives.{{ $id }}.phone_number" type="number" class="form-control form-control-sm w-100 @error('form.relatives.' . $id . '.phone_number') is-invalid @elseif(strlen($this->form->relatives[$id]['phone_number']) > 3) is-valid @enderror" id="phone_number" name="phone_number" placeholder="{{ trans('dashboard.fields.phone_number') }}">
                                            @error('form.relatives.' . $id . '.phone_number')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 pe-0 ps-md-2 ps-0 mb-md-0 mb-2">
                                            <label class="form-label" for="relative_status_id">{{ trans('dashboard.fields.relative_status') }}: <span class="text-danger">*</span></label>
                                            <select wire:model.blur="form.relatives.{{ $id }}.relative_status_id" class="form-select form-select-sm w-100 @error('form.relatives.' . $id . '.relative_status_id') is-invalid @elseif(!is_null($this->form->relatives[$id]['relative_status_id'])) is-valid @enderror" id="relative_status_id" name="relative_status_id">
                                                <x-forms.selects.options.choose />
                                                @foreach($relativeStatuses as $relativeStatus)
                                                <option value="{{ $relativeStatus->id }}">{{ $relativeStatus->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('form.relatives.' . $id . '.relative_status_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button wire:click="removeRelative({{ $id }})" wire:loading.attr="disabled" type="button" class="btn btn-alt-danger w-auto px-1 d-flex align-items-center justify-content-center position-absolute" style="height: 25px; top: 7px; right: 7px;">
                                            <i class="fa fa-times" style="font-size: 14px"></i>
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                            <button wire:click="addRelative" wire:loading.attr="disabled" type="button" class="btn btn-primary btn-sm mb-4">{{ trans('dashboard.sections.relative') }} {{ strtolower(trans('dashboard.actions.add')) }}</button>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-1">
                            <hr>
                            @if(!empty($this->form->lessons))
                                @foreach($this->form->lessons as $lessonId => $lesson)
                                    <div class="row w-100 h-100 p-3 mx-0 mb-4 bg-light rounded-2 position-relative">
                                        <div class="col-md-3 ps-0 pe-md-2 pe-0 mb-3 mb-md-0">
                                            <label class="form-label" for="service_id">{{ trans('dashboard.fields.service_id') }}: <span class="text-danger">*</span></label>
                                            <select wire:model.live="form.lessons.{{ $lessonId }}.service_id" class="form-select form-select-sm w-100 @error('form.lessons.' . $lessonId . '.service_id') is-invalid @elseif(!is_null($this->form->lessons[$lessonId]['service_id'])) is-valid @enderror" id="service_id" name="service_id">
                                                <x-forms.selects.options.choose />
                                                @foreach($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('form.lessons.' . $lessonId . '.service_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 px-0 px-md-2 mb-3 mb-md-0">
                                            <label class="form-label" for="teacher_id">{{ trans('dashboard.fields.teacher_id') }}: <span class="text-danger">*</span></label>
                                            <select wire:model.live="form.lessons.{{ $lessonId }}.teacher_id" class="form-select form-select-sm w-100 @error('form.lessons.' . $lessonId . '.teacher_id') is-invalid @elseif(!is_null($this->form->lessons[$lessonId]['teacher_id'])) is-valid @enderror" id="teacher_id" name="teacher_id">
                                                <x-forms.selects.options.choose />
                                                @if(!is_null($teachers))
                                                    @foreach($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}">{{ $teacher->fullname }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('form.lessons.' . $lessonId . '.teacher_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 px-0 px-md-2 mb-3 mb-md-0">
                                            <label class="form-label" for="price">{{ trans('dashboard.fields.price') }}:</label>
                                            <input value="{{ $this->form->lessons[$lessonId]['price'] }}" type="text" class="form-control form-control-sm w-100" id="price" name="price" placeholder="{{ trans('dashboard.fields.price') }}" readonly>
                                        </div>
                                        <div class="col-md-3 pe-0 mb-2 mb-md-0 ps-md-2 ps-0">
                                            <label class="form-label" for="start_time">{{ trans('dashboard.fields.start_time') }}: <span class="text-danger">*</span></label>
                                            <select wire:model.live="form.lessons.{{ $lessonId }}.start_time" class="form-select form-select-sm w-100 @error('form.lessons.' . $lessonId . '.start_time') is-invalid @elseif(!is_null($this->form->lessons[$lessonId]['start_time'])) is-valid @enderror" id="start_time" name="start_time">
                                                <x-forms.selects.options.choose />
                                                @foreach($start_times as $time)
                                                    <option value="{{ $time }}">{{ $time }}</option>
                                                @endforeach
                                            </select>
                                            @error('form.lessons.' . $lessonId . '.start_time')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button wire:click="removeLesson({{ $lessonId }})" wire:loading.attr="disabled" type="button" class="btn btn-alt-danger w-auto px-1 d-flex align-items-center justify-content-center position-absolute" style="height: 25px; top: 7px; right: 7px;">
                                            <i class="fa fa-times" style="font-size: 14px"></i>
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                            <button wire:click="addLesson" wire:loading.attr="disabled" type="button" class="btn btn-primary btn-sm mb-4">{{ trans('dashboard.sections.lesson') }} {{ strtolower(trans('dashboard.actions.add')) }}</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 pe-md-0">
                <div class="block block-rounded">
                    <div class="block-content fs-sm">
                        <div class="mb-4">
                            <div x-data="{ uploading: false, progress: 0 }"
                                 x-on:livewire-upload-start="uploading = true"
                                 x-on:livewire-upload-finish="uploading = false"
                                 x-on:livewire-upload-error="uploading = false"
                                 x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <label class="form-label" for="photo">{{ trans('dashboard.fields.photo') }}</label>
                                <input wire:model="form.photo" class="form-control form-select-sm" type="file" id="photo" name="photo">
                                <!-- Progress Bar -->
                                <div x-show="uploading" class="mt-2">
                                    <div class="progress push" style="height: 6px;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                        <div x-bind:style="`width: ${progress}%;`" class="progress-bar"></div>
                                    </div>
                                </div>
                                @if($this->form->photo?->temporaryUrl())
                                    <div class="options-container mt-3">
                                        <img class="img-fluid options-item" src="{{ $this->form->photo->temporaryUrl() }}" alt="Temporary teacher photo">
                                        <div class="options-overlay bg-black-50">
                                            <div class="options-overlay-content">
                                                <button type="button" class="btn btn-sm btn-alt-danger" wire:click="removePhoto('photo')">
                                                    <i class="fa fa-times opacity-50 me-1"></i> {{ trans('dashboard.actions.delete') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-md-0 px-2">
            <x-forms.buttons.default.back route="{{ route('dashboard.information.clients.index') }}" />
            <x-forms.buttons.default.create-another />
            <x-forms.buttons.default.create />
        </div>
    </form>
</div>
