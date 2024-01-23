<div>
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-create-consumption">{{ trans('dashboard.actions.new') }} {{ strtolower(trans('dashboard.sections.consumption')) }}</button>

    <div wire:ignore.self class="modal fade" id="modal-create-consumption" tabindex="-1" role="dialog" aria-labelledby="modal-create-consumption" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content fs-sm text-start">
                <form wire:submit.prevent="create" class="form-border-radius">
                    <div class="block block-rounded shadow-none mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title fs-sm mt-1">{{ trans('dashboard.actions.new') }} {{ strtolower(trans('dashboard.sections.consumption')) }}</h3>
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
                                    <select wire:model.blur="form.branch_id" type="text" class="form-select form-select-sm @error('form.branch_id') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->branch_id)) is-valid @enderror" id="branch_id" name="branch_id">
                                        <x-forms.selects.options.choose />
                                        @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.branch_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 pe-0 mb-4">
                                    <label class="form-label" for="amount">{{ trans('dashboard.fields.amount') }}</label>
                                    <input wire:model.blur="form.amount" type="text" class="form-control form-control-sm @error('form.amount') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->amount)) is-valid @enderror" id="amount" name="amount" placeholder="{{ trans('dashboard.fields.amount') }}">
                                    @error('form.amount')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 px-0 mb-4">
                                    <label class="form-label" for="comment">{{ trans('dashboard.fields.comment') }}</label>
                                    <textarea wire:model.blur="form.comment" class="form-control form-control-sm @error('form.comment') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->comment)) is-valid @enderror" id="comment" name="comment" placeholder="{{ trans('dashboard.fields.comment') }}"></textarea>
                                    @error('form.amount')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm d-flex align-items-center justify-content-between border-top">
                            <x-forms.buttons.modal.close />
                            <x-forms.buttons.modal.create />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
