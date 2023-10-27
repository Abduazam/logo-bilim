<div>
    <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#modal-update-text-id{{ $text->id }}">
        <i class="fa fa-pen"></i>
    </button>

    <!-- Update Text Modal -->
    <div wire:ignore.self class="modal fade" id="modal-update-text-id{{ $text->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-update-text-id{{ $text->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="update" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">Update text</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="key">Key</label>
                                    <input wire:model="form.key" type="text" class="form-control form-control-sm" id="key" name="key" placeholder="Slug" readonly disabled>
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="icon">Icon</label>
                                    <input wire:model.live="form.icon" type="text" class="form-control form-control-sm @error('form.icon') is-invalid @elseif(!empty($this->form->icon)) is-valid @enderror" id="icon" name="icon" placeholder="Icon">
                                    @error('form.icon')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                @foreach($form->translations as $key => $translation)
                                <div class="col-12 d-flex align-items-center px-0 mb-4">
                                    <label for="{{ $text->key . '-' . $key }}" class="form-label mb-0 me-3">{{ $key }}:</label>
                                    <input wire:model.live="form.translations.{{ $key }}" type="text" class="form-control form-control-sm" id="{{ $text->key . '-' . $key }}" name="{{ $text->key . '-' . $key }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button wire:target="update" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-info">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
