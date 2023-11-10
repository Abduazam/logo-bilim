<div class="pb-4">
    <form wire:submit.prevent="create">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="col-lg-9 col-md-8 ps-0">
                <div class="block block-rounded">
                    <div class="block-content fs-sm">
                        <div class="row w-100 h-100 p-0 m-0">
                            <div class="col-md-4 ps-0">
                                <div class="mb-4">
                                    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                    <input wire:model.live="form.name" type="text" class="form-control form-control-sm @error('form.name') is-invalid @elseif(!empty($this->form->name)) is-valid @enderror" id="name" name="name" placeholder="Name">
                                    @error('form.name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                    <input wire:model.live="form.email" type="text" class="form-control form-control-sm @error('form.email') is-invalid @elseif(!empty($this->form->email)) is-valid @enderror" id="email" name="email" placeholder="Email">
                                    @error('form.email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 pe-0">
                                <div class="mb-4">
                                    <label class="form-label" for="role">Role <span class="text-danger">*</span></label>
                                    <select wire:model.live="form.role_id" class="form-select form-select-sm @error('form.role_id') is-invalid @elseif(!empty($this->form->role_id)) is-valid @enderror" name="role" id="role">
                                        <option value="null" disabled>Choose</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.role_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 ps-0">
                                <div class="mb-4 position-relative">
                                    <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                                    <input wire:model.live="form.password" wire:keydown="showEyeButton" type="{{ $passwordInputType }}" class="form-control form-control-sm @error('form.password') is-invalid @elseif(!empty($this->form->password)) is-valid @enderror" id="password" name="password" placeholder="Password">
                                    <button wire:click="showPassword" type="button" class="text-dark opacity-{{ $passwordInputShowButtonOpacity }} bg-transparent border-0 position-absolute" style="top: 31px; right: 7px;">
                                        <i class="fa {{ $passwordInputEyeIcon }}"></i>
                                    </button>
                                    @error('form.password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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
                                <label class="form-label" for="photo">Photo</label>
                                <input wire:model="form.photo" class="form-control form-select-sm" type="file" id="photo" name="photo">
                                <!-- Progress Bar -->
                                <div x-show="uploading" class="mt-2">
                                    <div class="progress push" style="height: 6px;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                        <div x-bind:style="`width: ${progress}%;`" class="progress-bar"></div>
                                    </div>
                                </div>
                                @if($form->photo?->temporaryUrl())
                                    <div class="options-container mt-3">
                                        <img class="img-fluid options-item" src="{{ $form->photo->temporaryUrl() }}" alt="Temporary user photo">
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

        <x-forms.buttons.default.back route="{{ route('dashboard.user-management.users.index') }}" />
        <button wire:target="create" wire:click="dispatchTrue" wire:loading.attr="disabled" type="submit" class="btn btn-alt-success border-0">
            <small>Create & Create another</small>
        </button>
        <button wire:target="create" wire:loading.attr="disabled" type="submit" class="btn btn-success border-0">
            <small>Create</small>
        </button>
    </form>
</div>
