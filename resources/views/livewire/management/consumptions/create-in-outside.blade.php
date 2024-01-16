<div class="d-inline-block">
    <button type="button" class="btn btn-sm btn-alt-info" data-bs-toggle="offcanvas" data-bs-target="#create-consumption-outside" aria-controls="create-consumption-outside">
        <span>Add consumption</span>
        <i class="fa fa-plus ms-1"></i>
    </button>

    <form wire:submit.prevent="create" class="w-50 position-relative">
        <div wire:ignore.self class="offcanvas offcanvas-end bg-body-extra-light w-25 shadow h-100" tabindex="-1" id="create-consumption-outside" aria-labelledby="create-consumption-outsideLabel" data-bs-backdrop="false">
            <div class="offcanvas-header bg-body-light">
                <h6 class="offcanvas-title" id="create-consumption-outsideLabel">New consumption</h6>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body fs-sm text-start overflow-auto p-4">
                <div class="col-12 px-0 mb-4">
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
                <div class="col-12 px-0 mb-4">
                    <label class="form-label" for="amount">Amount</label>
                    <input wire:model.blur="form.amount" type="text" class="form-control form-control-sm @error('form.amount') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->amount)) is-valid @enderror" id="amount" name="amount" placeholder="Amount">
                    @error('form.amount')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 px-0 mb-4">
                    <label class="form-label" for="comment">Comment</label>
                    <textarea wire:model.blur="form.comment" class="form-control form-control-sm @error('form.comment') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->comment)) is-valid @enderror" id="comment" name="comment" placeholder="Comment" rows="5"></textarea>
                    @error('form.amount')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="offcanvas-footer bg-body-light p-3 w-100 text-start">
                <button data-bs-dismiss="offcanvas" type="button" class="btn btn-white border-0">
                    <small>Close</small>
                </button>
                <button wire:loading.attr="disabled" data-bs-dismiss="offcanvas" type="submit" class="btn btn-success border-0" wire:target="create">
                    <small>Create</small>
                </button>
            </div>
        </div>
    </form>
</div>
