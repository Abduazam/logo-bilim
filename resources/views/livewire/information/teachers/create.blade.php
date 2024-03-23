<div class="pb-4">
    <form wire:submit.prevent="create">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="col-lg-9 col-md-8 ps-0">
                <div class="block block-rounded">
                    <div class="block-content fs-sm">
                        <div class="row w-100 h-100 p-0 mx-0 mb-4">
                            <div class="col-md-4 ps-0">
                                <label class="form-label" for="fullname">{{ trans('dashboard.fields.fullname') }}: <span class="text-danger">*</span></label>
                                <input wire:model.blur="form.fullname" type="text" class="form-control form-control-sm w-100 @error('form.fullname') is-invalid @elseif(!empty($this->form->fullname)) is-valid @enderror" id="fullname" name="fullname" placeholder="{{ trans('dashboard.fields.fullname') }}">
                                @error('form.fullname')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 px-md-2 px-0">
                                <label class="form-label" for="dob">{{ trans('dashboard.fields.birth_date') }}:</label>
                                <input wire:model.blur="form.dob" type="date" class="form-control form-control-sm w-100 @error('form.dob') is-invalid @elseif(!empty($this->form->dob)) is-valid @enderror" id="dob" name="dob" max="{{ date('Y-m-d') }}">
                                @error('form.dob')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 pe-0">
                                <label class="form-label" for="phone_number">{{ trans('dashboard.fields.phone_number') }}:</label>
                                <input wire:model.blur="form.phone_number" type="number" class="form-control form-control-sm w-100 @error('form.phone_number') is-invalid @elseif(!empty($this->form->phone_number)) is-valid @enderror" id="phone_number" name="phone_number" placeholder="{{ trans('dashboard.fields.phone_number') }}">
                                @error('form.phone_number')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4">
                            <div class="col-md-4 ps-0">
                                <label class="form-label" for="branches">{{ trans('dashboard.sections.branch') }}:</label>
                                <select wire:model.blur="branch_id" wire:change="addBranch($event.target.value)" class="form-select form-select-sm @error('form.teacher_services') is-invalid @elseif(!empty($this->form->branches)) is-valid @enderror" name="branches" id="branches">
                                    <x-forms.selects.options.choose />
                                    @foreach($this->branches as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('form.teacher_services')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 px-md-2 px-0">
                                <label class="form-label" for="services">{{ trans('dashboard.sections.service') }}:</label>
                                <select wire:model.blur="service_id" wire:change="addService($event.target.value)" class="form-select form-select-sm @error('form.teacher_services') is-invalid @elseif(!empty($this->form->services)) is-valid @enderror" name="services" id="services" @if(is_null($this->branch_id)) disabled @endif>
                                    <x-forms.selects.options.choose />
                                    @foreach($this->services as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('form.teacher_services')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @if(!empty($this->form->teacher_services))
                        <div class="row w-100 h-100 p-0 mx-0 mb-4">
                            <hr>
                            @foreach($this->form->teacher_services as $branch_id => $services)
                                @foreach($services as $service_id => $values)
                                    <div class="row w-100 p-3 mx-0 bg-light rounded-2 position-relative mt-2">
                                        <div class="col-12 d-flex align-items-center px-0">
                                            <div class="col-3">
                                                <label for="{{ $branch_id . $service_id }}" class="form-label mb-0 me-2">{{ $values['branch_title'] . ', ' . $values['service_title'] }}: <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-9">
                                                <input wire:model.blur="form.teacher_services.{{ $branch_id }}.{{ $service_id }}.salary" type="number" class="form-control form-control-sm w-75 @error('form.teacher_services.' . $branch_id . '.' . $service_id . '.salary') is-invalid @elseif(!is_null($this->form->teacher_services[$branch_id][$service_id]['salary']) && is_numeric($this->form->teacher_services[$branch_id][$service_id]['salary'])) is-valid @enderror" name="{{ $branch_id . $service_id }}" id="{{ $branch_id . $service_id }}" placeholder="{{ trans('dashboard.fields.price') }}: {{ $values['price'] }}">
                                                @error('form.teacher_services.' . $branch_id . '.' . $service_id . '.salary')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button wire:click="removeService({{ $branch_id }}, {{ $service_id }})" wire:loading.attr="disabled" type="button" class="btn btn-alt-danger w-auto px-1 d-flex align-items-center justify-content-center position-absolute" style="height: 25px; top: 7px; right: 7px;">
                                            <i class="fa fa-times" style="font-size: 14px"></i>
                                        </button>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 pe-0">
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

        <x-forms.buttons.default.back route="{{ route('dashboard.information.teachers.index') }}" />
        <x-forms.buttons.default.create-another />
        <x-forms.buttons.default.create />
    </form>
</div>
