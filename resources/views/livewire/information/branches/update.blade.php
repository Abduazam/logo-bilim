<div class="d-inline-block">
    <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#modal-update-branch-id{{ $this->branch->id }}">
        <i class="fa fa-pen"></i>
    </button>

    <div wire:ignore.self class="modal fade" id="modal-update-branch-id{{ $this->branch->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-update-branch-id{{ $this->branch->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="update" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">{{ trans('dashboard.actions.update') }} {{ strtolower(trans('dashboard.sections.branch')) }}</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="title">{{ trans('dashboard.fields.title') }}</label>
                                    <input wire:model.blur.debounce.500ms="form.title" type="text" class="form-control form-control-sm @error('form.title') is-invalid @elseif(!empty($this->form->title)) is-valid @enderror" id="title" name="title" placeholder="{{ trans('dashboard.fields.title') }}">
                                    @error('form.title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="chosen_services">{{ trans('dashboard.sections.services') }}</label>
                                    <select wire:model.blur="service_id" wire:change="addService($event.target.value)" class="form-select form-select-sm @error('form.chosen_services') is-invalid @elseif(!empty($this->form->chosen_services)) is-valid @enderror" name="chosen_services" id="chosen_services">
                                        <x-forms.selects.options.choose />
                                        @foreach($services as $id => $service)
                                            <option value="{{ $id }}">{{ $service['title'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.chosen_services')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if(!empty($this->form->chosen_services))
                                    <hr>
                                    <div class="col-12 px-0 mt-2 mb-4">
                                        @foreach($this->form->chosen_services as $id => $service)
                                            <div class="row w-100 p-3 mx-0 bg-light rounded-2 position-relative @if(!$loop->first) mt-2 @endif">
                                                <div class="col-12 d-flex align-items-center px-0">
                                                    <div class="col-4 text-wrap">
                                                        <label for="{{ $service['title'] }}" class="form-label mb-0 me-2">{{ $service['title'] }}:</label>
                                                    </div>
                                                    <div class="col-8 pe-3">
                                                        <input wire:model.blur="form.chosen_services.{{ $id }}.price" type="text" class="form-control form-control-sm w-100 @error('form.chosen_services.' . $id . '.price') is-invalid @elseif(!is_null($this->form->chosen_services[$id]['price']) && is_numeric($this->form->chosen_services[$id]['price'])) is-valid @enderror" name="{{ $service['title'] }}" id="{{ $service['title'] }}" placeholder="{{ trans('dashboard.fields.price') }}">
                                                        @error('form.chosen_services.' . $id . '.price')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button wire:click="removeService({{ $id }})" wire:loading.attr="disabled" type="button" class="btn btn-alt-danger position-absolute w-auto py-0 px-1" style="font-size: 12px; top: 5px; right: 5px;">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                            <x-forms.buttons.modal.close />
                            <x-forms.buttons.modal.update />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
