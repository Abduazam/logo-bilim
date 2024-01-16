<div class="d-inline-block">
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasConsultationUpdateId{{ $this->consultation->id }}" aria-controls="offcanvasConsultationUpdateId{{ $this->consultation->id }}">
        <i class="fa fa-pen"></i>
    </button>

    <form wire:submit.prevent="update" class="w-100 position-relative">
        <div wire:ignore.self class="offcanvas offcanvas-end bg-body-extra-light w-40 shadow h-100" tabindex="-1" id="offcanvasConsultationUpdateId{{ $this->consultation->id }}" aria-labelledby="offcanvasConsultationUpdateId{{ $this->consultation->id }}Label" data-bs-backdrop="false">
            <div class="offcanvas-header bg-body-light">
                <h6 class="offcanvas-title" id="offcanvasConsultationUpdateId{{ $this->consultation->id }}Label">Update consultation</h6>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body fs-sm text-start overflow-auto">
                <div class="block">
                    <div class="block-content overflow-hidden px-3 py-0">
                        <div class="row w-100 p-0 m-0">
                            <div class="col-12 px-0 mb-3 position-relative">
                                <label for="search_client" class="form-label">Search client</label>
                                <div class="d-flex w-100 h-auto">
                                    <input wire:model.live.debounce.500ms="form.search" type="text" class="form-control form-control-sm w-100" id="search_client" name="search_client" placeholder="Search client">
                                    @if(!empty($this->form->searchedClients))
                                        <div class="search-result-block w-100 bg-white h-auto position-absolute top-100 z-3">
                                            <ul class="list-group">
                                                @foreach($this->form->searchedClients as $client)
                                                    <li wire:click="setClientInfo({{ $client->id }})" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center cursor-pointer py-1 fs-sm">{{ $client->first_name }} {{ $client->last_name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 border rounded-3 p-3 mb-3 position-relative">
                                <div class="row w-100 p-0 m-0">
                                    <div class="col-md-6 mb-3 ps-0">
                                        <label for="first_name" class="form-label">First name</label>
                                        <input wire:model.blur="form.clients.info.first_name" type="text" class="form-control form-control-sm w-100 @error('form.clients.info.first_name') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->clients['info']['first_name'])) is-valid @enderror" id="first_name" name="first_name" placeholder="Client first name" @if(!is_null($this->form->clients['client_id'])) readonly @endif>
                                        @error('form.clients.info.first_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 pe-0">
                                        <label for="last_name" class="form-label">Last name</label>
                                        <input wire:model.blur="form.clients.info.last_name" type="text" class="form-control form-control-sm w-100 @error('form.clients.info.last_name') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->clients['info']['last_name'])) is-valid @enderror" id="last_name" name="last_name" placeholder="Client last name" @if(!is_null($this->form->clients['client_id'])) readonly @endif>
                                        @error('form.clients.info.last_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 ps-0">
                                        <label for="dob" class="form-label">Date of birth</label>
                                        <input wire:model.blur="form.clients.info.dob" type="date" class="form-control form-control-sm w-100 @error('form.clients.info.dob') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->clients['info']['dob'])) is-valid @enderror" id="dob" name="dob" placeholder="Client first name" @if(!is_null($this->form->clients['client_id'])) readonly @endif>
                                        @error('form.clients.info.dob')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 pe-0">
                                        <label class="form-label opacity-0 d-block">Add relative</label>
                                        <button wire:click="addRelative" wire:loading.attr="disabled" type="button" class="btn btn-sm btn-primary w-100" @if(!is_null($this->form->clients['client_id'])) disabled @endif>Add relative</button>
                                    </div>
                                </div>
                                <button wire:click="clearClientInfo" type="button" class="btn btn-alt-info position-absolute py-0 px-1" style="top: 5px; right: 5px; font-size: 12px;">
                                    <i class="fa fa-eraser"></i>
                                </button>
                                @if(!empty($this->form->clients['info']['relatives']))
                                    <hr class="mt-0">
                                    @foreach($this->form->clients['info']['relatives'] as $relativeId => $relative)
                                        <div class="row w-100 p-3 mx-0 @if(! $loop->last) mb-4 @endif bg-light rounded-2 position-relative">
                                            <div class="col-md-4 ps-0">
                                                <label class="form-label" for="fullname{{ $relativeId }}">Fullname: <span class="text-danger">*</span></label>
                                                <input wire:model.blur="form.clients.info.relatives.{{ $relativeId }}.fullname" type="text" class="form-control form-control-sm w-100 @error('form.clients.info.relatives.' . $relativeId . '.fullname') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->clients['info']['relatives'][$relativeId]['fullname'])) is-valid @enderror" id="fullname{{ $relativeId }}" name="fullname{{ $relativeId }}" placeholder="Fullname">
                                                @error('form.clients.info.relatives.' . $relativeId . '.fullname')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 px-md-2 px-0">
                                                <label class="form-label" for="phone_number{{ $relativeId }}">Phone number: <span class="text-danger">*</span></label>
                                                <input wire:model.blur="form.clients.info.relatives.{{ $relativeId }}.phone_number" type="number" class="form-control form-control-sm w-100 @error('form.clients.info.relatives.' . $relativeId . '.phone_number') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->clients['info']['relatives'][$relativeId]['phone_number'])) is-valid @enderror" id="phone_number{{ $relativeId }}" name="phone_number{{ $relativeId }}" placeholder="Phone number">
                                                @error('form.clients.info.relatives.' . $relativeId . '.phone_number')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 pe-0">
                                                <label class="form-label" for="relative_status_id{{ $relativeId }}">Relative status: <span class="text-danger">*</span></label>
                                                <select wire:model.blur="form.clients.info.relatives.{{ $relativeId }}.relative_status_id" class="form-select form-select-sm w-100 @error('form.clients.info.relatives.' . $relativeId . '.relative_status_id') is-invalid @elseif(!is_null($this->form->clients['info']['relatives'][$relativeId]['relative_status_id'])) is-valid @enderror" id="relative_status_id{{ $relativeId }}" name="relative_status_id{{ $relativeId }}">
                                                    <option value="null" disabled>Choose</option>
                                                    @foreach($relativeStatuses as $relativeStatus)
                                                        <option value="{{ $relativeStatus->id }}">{{ $relativeStatus->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('form.clients.info.relatives.' . $relativeId . '.relative_status_id')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <button wire:click="removeRelative({{ $relativeId }})" wire:loading.attr="disabled" type="button" class="btn btn-alt-danger position-absolute py-0 px-1 w-auto" style="top: 5px; right: 5px; font-size: 12px;">
                                                <i class="fa fa-times" style="font-size: 14px"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="row w-100 p-0 m-0">
                            <div class="col-md-6 mb-3 ps-0">
                                <label for="client_name" class="form-label">Client name</label>
                                <input wire:model.blur="form.payments.client_name" type="text" class="form-control form-control-sm w-100 @error('form.clients.info.first_name') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->payments['client_name'])) is-valid @enderror" id="client_name" name="client_name" placeholder="Client name" disabled>
                                @error('form.payments.client_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 pe-0">
                                <label for="payment_amount" class="form-label">Payment amount</label>
                                <input wire:model.blur="form.payments.payment_amount" type="number" class="form-control form-control-sm w-100 @error('form.clients.info.first_name') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->payments['payment_amount'])) is-valid @enderror" id="payment_amount" name="payment_amount" placeholder="Payment amount" min="1">
                                @error('form.payments.payment_amount')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 ps-0">
                                <label for="payment_type_id" class="form-label">Payment type</label>
                                <select wire:model.blur="form.payments.payment_type_id" class="form-select form-select-sm w-100 @error('form.clients.info.first_name') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->payments['payment_type_id'])) is-valid @enderror" id="payment_type_id" name="payment_type_id">
                                    <option value="null" disabled>Choose</option>
                                    @foreach($paymentTypes as $paymentType)
                                        <option value="{{ $paymentType->id }}">{{ $paymentType->title }}</option>
                                    @endforeach
                                </select>
                                @error('form.payments.payment_type_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 pe-0">
                                <label for="created_date" class="form-label">Date</label>
                                <input wire:model.blur="form.created_date" type="date" class="form-control form-control-sm w-100 @error('form.created_date') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->created_date)) is-valid @enderror" name="created_date" id="created_date" min="{{ date('Y-m-d') }}">
                                @error('form.created_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 ps-0">
                                <label for="start_time" class="form-label">Start time <small class="text-muted">({{ $this->consultation->getStartTime() }})</small></label>
                                <select wire:model.live="form.start_time" class="form-select form-select-sm w-100 @error('form.start_time') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->start_time)) is-valid @enderror" name="start_time" id="start_time" @if(is_null($this->form->created_date)) disabled @endif>
                                    <option value="null" disabled>Choose</option>
                                    @if(!empty($this->form->startTimes))
                                        @foreach($this->form->startTimes as $start_time)
                                            <option value="{{ $start_time }}">{{ $start_time }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('form.start_time')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 pe-0">
                                <label for="end_time" class="form-label">End time <small class="text-muted">({{ $this->consultation->getEndTime() }})</small></label>
                                <select wire:model.live="form.end_time" class="form-select form-select-sm w-100 @error('form.end_time') is-invalid @elseif(isNotNullAndNotEmptyString($this->form->end_time)) is-valid @enderror" name="end_time" id="end_time" @if(is_null($this->form->start_time)) disabled @endif>
                                    <option value="null" disabled>Choose</option>
                                    @if(!empty($this->form->endTimes))
                                        @foreach($this->form->endTimes as $end_time)
                                            <option value="{{ $end_time }}">{{ $end_time }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('form.end_time')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-footer bg-body-light p-3 w-100 text-start">
                <button data-bs-dismiss="offcanvas" type="button" class="btn btn-white border-0">
                    <small>Close</small>
                </button>
                <button wire:loading.attr="disabled" data-bs-dismiss="offcanvas" type="submit" class="btn btn-success border-0" @if($this->form->registrationForm) wire:target="update" @else disabled @endif>
                    <small>Update</small>
                </button>
            </div>
        </div>
    </form>
</div>
