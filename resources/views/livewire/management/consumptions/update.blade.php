<div class="d-inline-block">
    <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#modal-update-consumption-id{{ $this->consumption->id }}">
        <i class="fa fa-pen"></i>
    </button>

    <div wire:ignore.self class="modal fade" id="modal-update-consumption-id{{ $this->consumption->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-update-consumption-id{{ $this->consumption->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="update" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">Update consumption</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row w-100 h-100 p-0 m-0">
                                <div class="col-6 ps-0 mb-4">
                                    <label class="form-label" for="branch_id">Branch</label>
                                    <select wire:model.blur="form.branch_id" type="text" class="form-select form-select-sm @error('form.branch_id') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->branch_id)) is-valid @enderror" id="branch_id" name="branch_id">
                                        <option value="">Choose</option>
                                        @foreach($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.branch_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="amount">Amount</label>
                                    <input wire:model.blur="form.amount" type="text" class="form-control form-control-sm @error('form.amount') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->amount)) is-valid @enderror" id="amount" name="amount" placeholder="Amount">
                                    @error('form.amount')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 px-0 mb-4">
                                    <label class="form-label" for="comment">Comment</label>
                                    <textarea wire:model.blur="form.comment" class="form-control form-control-sm @error('form.comment') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->comment)) is-valid @enderror" id="comment" name="comment" placeholder="Comment"></textarea>
                                    @error('form.amount')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                            <button wire:target="update" wire:loading.attr="disabled" type="submit" class="btn btn-sm btn-info">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
