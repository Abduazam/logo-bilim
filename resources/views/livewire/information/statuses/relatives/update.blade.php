<div class="d-inline-block">
    <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#modal-update-relative-status-id{{ $this->relativeStatus->id }}">
        <i class="fa fa-pen"></i>
    </button>

    <div wire:ignore.self class="modal fade" id="modal-update-relative-status-id{{ $this->relativeStatus->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-update-relative-status-id{{ $this->relativeStatus->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="update" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">Update relative status</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-12 px-0 mb-4">
                                    <label for="title" class="form-label mb-0 me-2">Title:</label>
                                    <input wire:model.blur="form.title" type="text" class="form-control form-control-sm w-100 @error('form.title') is-invalid @elseif(!is_null($this->form->title)) is-valid @enderror" name="title" id="title">
                                </div>
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
