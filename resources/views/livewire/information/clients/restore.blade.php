<div class="d-inline-block">
    <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#modal-restore-client-id{{ $this->client->id }}">
        <i class="fa fa-rotate-left"></i>
    </button>

    <div wire:ignore.self class="modal fade" id="modal-restore-client-id{{ $this->client->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-restore-client-id{{ $this->client->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="restore" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">{{ trans('dashboard.sections.client') }} {{ strtolower(trans('dashboard.actions.restore')) }}</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="first_name">{{ trans('dashboard.fields.first_name') }}</label>
                                    <input value="{{ $this->client->first_name }}" type="text" class="form-control form-control-sm" id="first_name" name="first_name" readonly disabled>
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="last_name">{{ trans('dashboard.fields.last_name') }}</label>
                                    <input value="{{ $this->client->last_name }}" type="text" class="form-control form-control-sm" id="last_name" name="last_name" readonly disabled>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                            <x-forms.buttons.modal.close />
                            <x-forms.buttons.modal.restore />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
