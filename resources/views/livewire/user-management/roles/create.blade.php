<div class="pb-4">
    <form wire:submit.prevent="create">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="block block-rounded px-0">
                <div class="block-content fs-sm">
                    <div class="row w-100 h-100 p-0 m-0">
                        <div class="col-4 ps-0">
                            <div class="mb-4">
                                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                <input wire:model.live="form.name" type="text" class="form-control form-control-sm @error('form.name') is-invalid @elseif(!empty($this->form->name)) is-valid @enderror" id="name" name="name" placeholder="Name">
                                @error('form.name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-8 pe-0">
                            <div class="mb-4">
                                <label class="form-label" for="role_permissions">Permissions <span class="text-danger">*</span></label>
                                <select wire:model.live="current_permission" wire:change="addPermission($event.target.value)" class="form-select form-select-sm @error('form.role_permissions') is-invalid @elseif(!empty($this->form->role_permissions)) is-valid @enderror" name="role_permissions" id="role_permissions">
                                    <option value="null" disabled>Choose</option>
                                    @foreach($permissions as $id => $values)
                                    <option value="{{ $id }}">{{ $values['name'] }} - {{ $values['translation'] }}</option>
                                    @endforeach
                                </select>
                                @error('form.role_permissions')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @if(!empty($this->form->role_permissions))
                        <div class="col-12 items-push mb-4 px-0">
                            <p class="form-label mb-2">Chosen permissions:</p>
                            @foreach($this->form->role_permissions as $id => $values)
                            <span class="btn btn-sm btn-info mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $values['translation'] }}">{{ $values['name'] }} <button wire:click="removePermission({{ $id }})" type="button" class="bg-transparent border-0 p-0 text-white ms-2 remove-permission"><i class="fa fa-times"></i></button></span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <x-forms.buttons.default.back route="{{ route('dashboard.user-management.roles.index') }}" />
        <button wire:target="create" wire:click="dispatchTrue" wire:loading.attr="disabled" type="submit" class="btn btn-alt-success border-0">
            <small>Create & Create another</small>
        </button>
        <button wire:target="create" wire:loading.attr="disabled" type="submit" class="btn btn-success border-0">
            <small>Create</small>
        </button>
    </form>
</div>
