<div>
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-create-relative-status">New relative status</button>

    <div wire:ignore.self class="modal fade" id="modal-create-relative-status" tabindex="-1" role="dialog" aria-labelledby="modal-create-relative-status" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="create" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">New relative status</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                @foreach($this->form->translations as $key => $translation)
                                    <div class="col-12 d-flex align-items-center px-0 mb-4">
                                        <label for="translation-{{ $key }}-id{{ $loop->index }}" class="form-label mb-0 me-2">{{ $key }}:</label>
                                        <input wire:model.live="form.translations.{{ $key }}" type="text" class="form-control form-control-sm w-100 @error('form.translations.' . $key) is-invalid @elseif(!is_null($this->form->translations[$key])) is-valid @enderror" name="translation-{{ $key }}-id{{ $loop->index }}" id="translation-{{ $key }}-id{{ $loop->index }}">
                                    </div>
                                @endforeach
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
