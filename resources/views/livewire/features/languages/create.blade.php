<div>
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-create-language">New language</button>

    <div wire:ignore.self class="modal fade" id="modal-create-language" tabindex="-1" role="dialog" aria-labelledby="modal-create-language" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="create" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">New language</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="slug">Slug</label>
                                    <input wire:model.live.debounce.500ms="form.slug" type="text" class="form-control form-control-sm @error('form.slug') is-invalid @elseif(!empty($this->form->slug)) is-valid @enderror" id="slug" name="slug" placeholder="Slug">
                                    @error('form.slug')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="title">Title</label>
                                    <input wire:model.live.debounce.500ms="form.title" type="text" class="form-control form-control-sm @error('form.title') is-invalid @elseif(!empty($this->form->title)) is-valid @enderror" id="title" name="title" placeholder="Title">
                                    @error('form.title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
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
