<div class="d-inline-block">
    <button type="button" class="btn btn-sm btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modal-forceDelete-user-id{{ $user->id }}">
        <i class="fa fa-trash"></i>
    </button>

    <div wire:ignore.self class="modal fade" id="modal-forceDelete-user-id{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-forceDelete-user-id{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="forceDelete" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">Force Delete user</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    <input value="{{ $user->name }}" type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Name" readonly disabled>
                                </div>
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input value="{{ $user->email }}" type="text" class="form-control form-control-sm" id="email" name="email" placeholder="Email" readonly disabled>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button wire:target="forceDelete" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-danger">
                                Force Delete
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
