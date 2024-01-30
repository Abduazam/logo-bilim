<div class="d-inline-block">
    <button type="button" class="btn btn-sm btn-danger text-white" data-bs-toggle="modal" data-bs-target="#modal-delete-consumption-id{{ $this->consumption->id }}">
        <i class="fa fa-trash"></i>
    </button>

    <div wire:ignore.self class="modal fade" id="modal-delete-consumption-id{{ $this->consumption->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-consumption-id{{ $this->consumption->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="delete" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">{{ trans('dashboard.sections.consumption') }} {{ strtolower(trans('dashboard.actions.delete')) }}</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="branch_id">{{ trans('dashboard.sections.branch') }}</label>
                                    <input type="text" class="form-select form-select-sm" id="branch_id" name="branch_id" value="{{ $this->consumption->branch->title }}" disabled>
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="amount">{{ trans('dashboard.fields.amount') }}</label>
                                    <input type="text" class="form-control form-control-sm" id="amount" name="amount" value="{{ $this->consumption->amount }}" disabled>
                                </div>
                                <div class="col-12 px-0 mb-4">
                                    <label class="form-label" for="comment">{{ trans('dashboard.fields.comment') }}</label>
                                    <textarea class="form-control form-control-sm" id="comment" name="comment" disabled>{{ $this->consumption->comment }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                            <x-forms.buttons.modal.close />
                            <x-forms.buttons.modal.delete />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>