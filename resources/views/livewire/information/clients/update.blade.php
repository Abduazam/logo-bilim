<div class="pb-4">
    <form wire:submit.prevent="update">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="col-lg-9 col-md-8 ps-0">
                <div class="block block-rounded">
                    <div class="block-content fs-sm">
                        <div class="row w-100 h-100 p-0 mx-0 mb-4">
                            <div class="col-md-4 ps-0">
                                <label class="form-label" for="first_name">{{ trans('dashboard.fields.first_name') }}: <span class="text-danger">*</span></label>
                                <input wire:model.blur="form.first_name" type="text" class="form-control form-control-sm w-100 @error('form.first_name') is-invalid @elseif(!empty($this->form->first_name)) is-valid @enderror" id="first_name" name="first_name" placeholder="{{ trans('dashboard.fields.first_name') }}">
                                @error('form.first_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 px-md-2 px-0">
                                <label class="form-label" for="last_name">{{ trans('dashboard.fields.last_name') }}:</label>
                                <input wire:model.blur="form.last_name" type="text" class="form-control form-control-sm w-100 @error('form.last_name') is-invalid @elseif(!empty($this->form->last_name)) is-valid @enderror" id="last_name" name="last_name" placeholder="{{ trans('dashboard.fields.last_name') }}">
                                @error('form.last_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 pe-0">
                                <label class="form-label" for="dob">{{ trans('dashboard.fields.birth_date') }}:</label>
                                <input wire:model.blur="form.dob" type="date" class="form-control form-control-sm w-100 @error('form.dob') is-invalid @elseif(!empty($this->form->dob)) is-valid @enderror" id="dob" name="dob" placeholder="{{ trans('dashboard.fields.birth_date') }}">
                                @error('form.dob')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-1">
                            <hr>
                            @if(!empty($this->form->relatives))
                                @foreach($this->form->relatives as $id => $relative)
                                    <div class="row w-100 h-100 p-3 mx-0 mb-4 bg-light rounded-2 position-relative">
                                        <div class="col-md-4 ps-0">
                                            <label class="form-label" for="fullname">{{ trans('dashboard.fields.fullname') }}: <span class="text-danger">*</span></label>
                                            <input wire:model.blur="form.relatives.{{ $id }}.fullname" type="text" class="form-control form-control-sm w-100 @error('form.relatives.' . $id . '.fullname') is-invalid @elseif(strlen($this->form->relatives[$id]['fullname']) > 3) is-valid @enderror" id="fullname" name="fullname" placeholder="{{ trans('dashboard.fields.fullname') }}">
                                            @error('form.relatives.' . $id . '.fullname')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 px-md-2 px-0">
                                            <label class="form-label" for="phone_number">{{ trans('dashboard.fields.phone_number') }}: <span class="text-danger">*</span></label>
                                            <input wire:model.blur="form.relatives.{{ $id }}.phone_number" type="number" class="form-control form-control-sm w-100 @error('form.relatives.' . $id . '.phone_number') is-invalid @elseif(strlen($this->form->relatives[$id]['phone_number']) > 3) is-valid @enderror" id="phone_number" name="phone_number" placeholder="{{ trans('dashboard.fields.phone_number') }}">
                                            @error('form.relatives.' . $id . '.phone_number')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 pe-0">
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
                                @if(!is_null($this->form->photo))
                                    <div class="options-container mt-3">
                                        @if(is_object($this->form->photo) && $this->form->photo->temporaryUrl())
                                            <img class="img-fluid options-item" src="{{ $this->form->photo->temporaryUrl() }}" alt="Temporary user photo">
                                        @else
                                            <img class="img-fluid options-item" src="/storage/{{ $this->form->photo }}" alt="Temporary user photo">
                                        @endif
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

        <x-forms.buttons.default.back route="{{ route('dashboard.information.clients.index') }}" />
        <x-forms.buttons.default.update-stay />
        <x-forms.buttons.default.update />
    </form>
</div>
