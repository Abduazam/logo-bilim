<div class="pb-4">
    <form wire:submit.prevent="create">
        <div class="row w-100 h-100 p-0 m-0">
            <div class="block block-rounded px-0">
                <div class="block-content fs-sm">
                    <div class="row w-100 h-100 p-0 m-0">
                        <div class="col-4 ps-0">
                            <div class="mb-4">
                                <label class="form-label" for="name">{{ trans('dashboard.fields.title') }} <span class="text-danger">*</span></label>
                                <input wire:model.blur="form.name" type="text" class="form-control form-control-sm @error('form.name') is-invalid @elseif(!empty($this->form->name)) is-valid @enderror" id="name" name="name" placeholder="{{ trans('dashboard.fields.title') }}">
                                @error('form.name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-8 pe-0">
                            <div class="mb-4">
                                <label class="form-label" for="role_permissions">{{ trans('dashboard.sections.permissions') }} <span class="text-danger">*</span></label>
                                <select wire:model.blur="current_permission" wire:change="addPermission($event.target.value)" class="form-select form-select-sm @error('form.role_permissions') is-invalid @elseif(!empty($this->form->role_permissions)) is-valid @enderror" name="role_permissions" id="role_permissions">
                                    <x-forms.selects.options.choose />
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
                            <p class="form-label mb-2">{{ trans('dashboard.filters.chosen') }} {{ strtolower(trans('dashboard.sections.permissions')) }}:</p>
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
        <x-forms.buttons.default.create-another />
        <x-forms.buttons.default.create />
    </form>
</div>
