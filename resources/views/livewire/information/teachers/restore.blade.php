<div class="d-inline-block">
    <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#modal-restore-teacher-id{{ $this->teacher->id }}">
        <i class="fa fa-rotate-left"></i>
    </button>

    <div wire:ignore.self class="modal fade" id="modal-restore-teacher-id{{ $this->teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-restore-teacher-id{{ $this->teacher->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="restore" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">Restore teacher</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="fullname">Fullname</label>
                                    <input value="{{ $this->teacher->fullname }}" type="text" class="form-control form-control-sm" id="fullname" name="fullname" placeholder="Fullname" readonly disabled>
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="phone_number">Phone number</label>
                                    <input value="{{ $this->teacher->phone_number }}" type="text" class="form-control form-control-sm" id="phone_number" name="phone_number" placeholder="Phone number" readonly disabled>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                            <button wire:target="restore" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-warning">Restore</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>