<div wire:ignore.self class="modal fade" id="{{ $target }}" tabindex="-1" role="dialog" aria-labelledby="{{ $target }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered {{ $size }}" role="document">
        <div class="modal-content text-start">
            <form wire:submit.prevent="{{ $action }}" class="form-border-radius">
                <div class="block block-rounded shadow-none fs-sm mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title fs-sm">{{ $title }}</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="row w-100 h-100 m-0 p-0">
                            {{ $slot }}
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                        <div class="col-6">
                            <x-forms.buttons.modal.close />
                        </div>
                        <div class="col-6 text-end">
                            @foreach($buttons as $key => $button)
                                <x-forms.buttons.modal.submit target="{{ $button['target'] }}" class="{{ $button['class'] }}" text="{{ $key }}" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
