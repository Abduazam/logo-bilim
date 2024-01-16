<div class="d-inline-block">
    <button type="button" class="btn btn-sm bg-pulse text-white" data-bs-toggle="modal" data-bs-target="#modal-delete-consultation-id{{ $this->consultation->id }}">
        <i class="fa fa-trash"></i>
    </button>

    <div wire:ignore.self class="modal fade" id="modal-delete-consultation-id{{ $this->consultation->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-consultation-id{{ $this->consultation->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="forceDelete" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">Delete consultation</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-md-6 ps-0 mb-4">
                                    <label for="client" class="form-label">Client</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="client" name="client" value="{{ $consultation->client->first_name }}" disabled>
                                </div>
                                <div class="col-md-6 pe-0 mb-4">
                                    <label for="created_date" class="form-label">Date</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="created_date" name="created_date" value="{{ $consultation->created_date }}" disabled>
                                </div>
                                <div class="col-md-6 ps-0 mb-4">
                                    <label for="start_time" class="form-label">Start time</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="start_time" name="start_time" value="{{ $consultation->getStartTime() }}" disabled>
                                </div>
                                <div class="col-md-6 pe-0 mb-4">
                                    <label for="end_time" class="form-label">End time</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="end_time" name="end_time" value="{{ $consultation->getEndTime() }}" disabled>
                                </div>
                                <div class="col-md-6 ps-0 mb-4">
                                    <label for="payment_amount" class="form-label">Payment amount</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="payment_amount" name="payment_amount" value="{{ $consultation->payment_amount }}" disabled>
                                </div>
                                <div class="col-md-6 pe-0 mb-4">
                                    <label for="payment_type_id" class="form-label">Payment type</label>
                                    <input type="text" class="form-control form-control-sm w-100" id="payment_type_id" name="payment_type_id" value="{{ $consultation->paymentType->title }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                            <button wire:target="forceDelete" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
