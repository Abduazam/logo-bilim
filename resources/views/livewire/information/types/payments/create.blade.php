<div>
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-create-payment-type">New payment type</button>

    <div wire:ignore.self class="modal fade" id="modal-create-payment-type" tabindex="-1" role="dialog" aria-labelledby="modal-create-payment-type" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="create" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">New payment type</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-12 px-0 mb-4">
                                    <label for="title" class="form-label">Title:</label>
                                    <input wire:model.blur="form.title" type="text" class="form-control form-control-sm w-100 @error('form.title') is-invalid @elseif(!is_null($this->form->title)) is-valid @enderror" name="title" id="title" placeholder="Payment type title">
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                            <button wire:target="create" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
