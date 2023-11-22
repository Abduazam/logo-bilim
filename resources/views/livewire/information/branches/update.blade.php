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
                            <h3 class="block-title fs-sm mt-1">Update branch</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="title">Title</label>
                                    <input wire:model.live.debounce.500ms="form.title" type="text" class="form-control form-control-sm @error('form.title') is-invalid @elseif(!empty($this->form->title)) is-valid @enderror" id="title" name="title" placeholder="Title">
                                    @error('form.title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="chosen_services">Services</label>
                                    <select wire:model.live="service_id" wire:change="addService($event.target.value)" class="form-select form-select-sm @error('form.chosen_services') is-invalid @elseif(!empty($this->form->chosen_services)) is-valid @enderror" name="chosen_services" id="chosen_services">
                                        <option value="null" disabled>Choose</option>
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
                                            <div class="col-12 d-flex align-items-center @if(!$loop->first) mt-2 @endif">
                                                <label for="{{ $service['title'] }}" class="form-label mb-0 me-2">{{ $service['title'] }}:</label>
                                                <input wire:model.live="form.chosen_services.{{ $id }}.price" type="text" class="form-control form-control-sm w-100 @error('form.chosen_services.' . $id . '.price') is-invalid @elseif(!is_null($this->form->chosen_services[$id]['price']) && is_numeric($this->form->chosen_services[$id]['price'])) is-valid @enderror" name="{{ $service['title'] }}" id="{{ $service['title'] }}">
                                                <button wire:click="removeService({{ $id }})" type="button" class="bg-transparent border-0 p-0 ms-2 remove-service">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                            <button wire:target="update" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-info">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
