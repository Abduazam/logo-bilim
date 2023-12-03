<div class="pb-4">
    <form wire:submit.prevent="update">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="col-lg-9 col-md-8 ps-0">
                <div class="block block-rounded">
                    <div class="block-content fs-sm">
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="name">Name: <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-8">
                                <input wire:model.live="form.name" type="text" class="form-control form-control-sm w-75 @error('form.name') is-invalid @elseif(!empty($this->form->name)) is-valid @enderror" id="name" name="name" placeholder="Name">
                                @error('form.name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="email">Email: <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-8">
                                <input wire:model.live="form.email" type="text" class="form-control form-control-sm w-75 @error('form.email') is-invalid @elseif(!empty($this->form->email)) is-valid @enderror" id="email" name="email" placeholder="Email">
                                @error('form.email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row w-100 h-100 p-0 mx-0 mb-4 align-items-center">
                            <div class="col-4 text-end">
                                <label class="form-label mb-0" for="password">Password: <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-8 position-relative">
                                <input wire:model.live="form.password" wire:keydown="showEyeButton" type="{{ $this->passwordInputType }}" class="form-control form-control-sm w-75 @error('form.password') is-invalid @elseif(!empty($this->form->password)) is-valid @enderror" id="password" name="password" placeholder="Password">
                                <button wire:click="showPassword" type="button" class="text-dark opacity-{{ $this->passwordInputShowButtonOpacity }} bg-transparent border-0 position-absolute" style="top: 5px; right: 155px;">
                                    <i class="fa {{ $this->passwordInputEyeIcon }}"></i>
                                </button>
                                @error('form.password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <x-forms.buttons.default.back route="{{ route('dashboard.home') }}" />
                <button wire:target="update" wire:loading.attr="disabled" type="submit" class="btn btn-success border-0">
                    <small>Update</small>
                </button>
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
                                <label class="form-label" for="photo">Photo</label>
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
                                                    <i class="fa fa-times opacity-50 me-1"></i> Delete
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
    </form>
</div>
